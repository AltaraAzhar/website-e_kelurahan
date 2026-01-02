<?php

namespace App\Http\Controllers;

use App\Models\Letter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminDashboardController extends Controller
{
    /**
     * Display admin dashboard
     */
    public function index(Request $request)
    {
        // Statistics
        $totalPengajuan = Letter::count();
        $menunggu = Letter::where('status', 'menunggu')->count();
        $diproses = Letter::where('status', 'diproses')->count();
        $selesai = Letter::where('status', 'selesai')->count();

        // Filter and search
        $status = $request->get('status', 'dalam_proses');
        $search = $request->get('search');

        $query = Letter::with('user');

        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('no_pengajuan', 'like', "%{$search}%")
                  ->orWhere('jenis_surat', 'like', "%{$search}%")
                  ->orWhere('nik', 'like', "%{$search}%")
                  ->orWhereHas('user', function($userQuery) use ($search) {
                      $userQuery->where('name', 'like', "%{$search}%");
                  });
            });
        }

        if ($status === 'dalam_proses') {
            $query->whereIn('status', ['menunggu', 'diproses']);
        } elseif ($status !== 'all') {
            $query->where('status', $status);
        }

        $letters = $query->latest()->paginate(10);

        return view('admin.dashboard', compact(
            'totalPengajuan',
            'menunggu',
            'diproses',
            'selesai',
            'letters',
            'status',
            'search'
        ));
    }

    /**
     * Process letter (change status to diproses)
     */
    public function process($id)
    {
        $letter = Letter::findOrFail($id);
        $letter->update(['status' => 'diproses']);

        return back()->with('success', 'Pengajuan berhasil diproses.');
    }

    /**
     * Complete letter with document upload (Manual Print)
     */
    public function completeWithDocument(Request $request, $id)
    {
        $request->validate([
            'nomor_surat' => 'required|string|max:255',
            'file_surat' => 'required|file|mimes:pdf,doc,docx|max:10240', // 10MB max
        ]);

        $letter = Letter::findOrFail($id);

        // Upload file
        $file = $request->file('file_surat');
        $filename = 'surat_' . $letter->no_pengajuan . '_' . time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('surat', $filename, 'public');

        $letter->update([
            'status' => 'selesai',
            'nomor_surat' => $request->nomor_surat,
            'file_surat' => $filename,
        ]);

        return back()->with('success', 'Surat berhasil diunggah dan pengajuan diselesaikan.');
    }

    /**
     * Complete letter with e-ticket generation
     */
    public function completeWithETicket($id)
    {
        $letter = Letter::findOrFail($id);

        // Generate e-ticket code: ETK-YYYY-XXXX
        $year = date('Y');
        $randomNumber = str_pad(rand(1, 9999), 4, '0', STR_PAD_LEFT);
        $tiketCode = 'ETK-' . $year . '-' . $randomNumber;

        // Ensure uniqueness
        while (Letter::where('tiket_code', $tiketCode)->exists()) {
            $randomNumber = str_pad(rand(1, 9999), 4, '0', STR_PAD_LEFT);
            $tiketCode = 'ETK-' . $year . '-' . $randomNumber;
        }

        $letter->update([
            'status' => 'selesai',
            'tiket_code' => $tiketCode,
        ]);

        return back()->with('success', 'E-Tiket berhasil dibuat: ' . $tiketCode);
    }

    /**
     * Reject letter
     */
    public function reject($id)
    {
        $letter = Letter::findOrFail($id);
        $letter->update(['status' => 'menunggu']);

        return back()->with('success', 'Pengajuan telah ditolak.');
    }

    /**
     * Request revision
     */
    public function revise($id)
    {
        $letter = Letter::findOrFail($id);
        $letter->update(['status' => 'menunggu']);

        return back()->with('success', 'Pengajuan dikembalikan untuk revisi.');
    }
}

