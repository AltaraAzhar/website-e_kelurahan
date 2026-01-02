@extends('layouts.admin')

@section('title', 'Dashboard Admin - Kelurahan Pabuaran Mekar')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Header -->
    <div class="bg-green-800 text-white px-6 py-4 shadow-md">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <div class="flex items-center space-x-3">
                <i class="fas fa-th-large text-xl"></i>
                <div>
                    <h1 class="text-xl font-bold">Dashboard Admin</h1>
                    <p class="text-sm text-green-200">Kelurahan Pabuaran Mekar</p>
                </div>
            </div>
            <div class="flex items-center space-x-4">
                <span class="text-sm">Selamat datang <strong>{{ auth()->user()->name }}</strong></span>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="bg-green-700 hover:bg-green-600 px-4 py-2 rounded-lg flex items-center space-x-2">
                        <span>Keluar</span>
                        <i class="fas fa-sign-out-alt"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-6 py-6">
        <!-- Statistics Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm">Total Pengajuan</p>
                        <p class="text-3xl font-bold text-blue-600">{{ $totalPengajuan }}</p>
                    </div>
                    <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-file-alt text-blue-600 text-xl"></i>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm">Menunggu</p>
                        <p class="text-3xl font-bold text-orange-600">{{ $menunggu }}</p>
                    </div>
                    <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-clock text-orange-600 text-xl"></i>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm">Diproses</p>
                        <p class="text-3xl font-bold text-blue-600">{{ $diproses }}</p>
                    </div>
                    <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-file-alt text-blue-600 text-xl"></i>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-600 text-sm">Selesai</p>
                        <p class="text-3xl font-bold text-green-600">{{ $selesai }}</p>
                    </div>
                    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-check-circle text-green-600 text-xl"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Search and Filter -->
        <div class="bg-white rounded-lg shadow p-4 mb-6">
            <form method="GET" action="{{ route('admin.dashboard') }}" class="flex gap-4">
                <div class="flex-1">
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-search text-gray-400"></i>
                        </div>
                        <input 
                            type="text" 
                            name="search" 
                            value="{{ $search }}"
                            placeholder="Cari berdasarkan nomor, nama, atau jenis surat..." 
                            class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                        >
                    </div>
                </div>
                <div>
                    <select name="status" class="block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                        <option value="all" {{ $status === 'all' ? 'selected' : '' }}>Semua Status</option>
                        <option value="menunggu" {{ $status === 'menunggu' ? 'selected' : '' }}>Menunggu</option>
                        <option value="diproses" {{ $status === 'diproses' ? 'selected' : '' }}>Diproses</option>
                        <option value="selesai" {{ $status === 'selesai' ? 'selected' : '' }}>Selesai</option>
                    </select>
                </div>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg">
                    Cari
                </button>
            </form>
        </div>

        <!-- Letters Table Section -->
        <div class="bg-white rounded-lg shadow">
            <div class="p-6 border-b border-gray-200">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-bold text-gray-900">Daftar Pengajuan Surat</h2>
                    <div class="flex gap-2">
                        <button class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg flex items-center space-x-2">
                            <i class="fas fa-download"></i>
                            <span>Export CSV</span>
                        </button>
                        <button class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-lg flex items-center space-x-2">
                            <i class="fas fa-chart-line"></i>
                            <span>Log Aktivitas</span>
                        </button>
                    </div>
                </div>

                <!-- Tabs -->
                <div class="flex space-x-4 border-b border-gray-200">
                    <a href="{{ route('admin.dashboard', ['status' => 'dalam_proses']) }}" class="px-4 py-2 flex items-center space-x-2 {{ $status === 'dalam_proses' || $status === 'all' ? 'border-b-2 border-blue-600 text-blue-600 font-semibold' : 'text-gray-600 hover:text-gray-900' }}">
                        <i class="fas fa-clock"></i>
                        <span>Dalam Proses</span>
                        <span class="bg-blue-100 text-blue-600 text-xs font-semibold px-2 py-1 rounded-full">{{ $menunggu + $diproses }}</span>
                    </a>
                    <a href="{{ route('admin.dashboard', ['status' => 'selesai']) }}" class="px-4 py-2 flex items-center space-x-2 {{ $status === 'selesai' ? 'border-b-2 border-green-600 text-green-600 font-semibold' : 'text-gray-600 hover:text-gray-900' }}">
                        <i class="fas fa-check-circle"></i>
                        <span>Selesai</span>
                        <span class="bg-green-100 text-green-600 text-xs font-semibold px-2 py-1 rounded-full">{{ $selesai }}</span>
                    </a>
                </div>
            </div>

            <!-- Success/Error Messages -->
            @if (session('success'))
                <div class="mx-6 mt-4 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="mx-6 mt-4 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg">
                    {{ session('error') }}
                </div>
            @endif

            <!-- Table -->
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No. Pengajuan</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jenis Surat</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pemohon</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">NIK</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($letters as $letter)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $letter->no_pengajuan }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $letter->jenis_surat }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $letter->user->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $letter->nik }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $letter->tanggal->format('d M Y') }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @if($letter->status === 'menunggu')
                                    <span class="px-2 py-1 text-xs font-semibold rounded-full bg-orange-100 text-orange-800">Menunggu</span>
                                @elseif($letter->status === 'diproses')
                                    <span class="px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">Diproses</span>
                                @else
                                    <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Selesai</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <div class="flex items-center space-x-2">
                                    @if($letter->status === 'menunggu')
                                        <form method="POST" action="{{ route('admin.letters.process', $letter->id) }}" class="inline">
                                            @csrf
                                            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded text-xs flex items-center space-x-1">
                                                <i class="fas fa-check"></i>
                                                <span>Proses</span>
                                            </button>
                                        </form>
                                    @elseif($letter->status === 'diproses')
                                        <button onclick="openDocumentModal({{ $letter->id }})" class="bg-gray-600 hover:bg-gray-700 text-white px-3 py-1 rounded text-xs flex items-center space-x-1">
                                            <i class="fas fa-file"></i>
                                            <span>Dokumen</span>
                                        </button>
                                        <button onclick="completeETicket({{ $letter->id }})" class="bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded text-xs flex items-center space-x-1">
                                            <i class="fas fa-check-circle"></i>
                                            <span>Selesai</span>
                                        </button>
                                    @endif
                                    
                                    <button class="bg-gray-600 hover:bg-gray-700 text-white px-3 py-1 rounded text-xs flex items-center space-x-1">
                                        <i class="fas fa-clock"></i>
                                        <span>Riwayat</span>
                                    </button>
                                    
                                    <form method="POST" action="{{ route('admin.letters.reject', $letter->id) }}" class="inline">
                                        @csrf
                                        <button type="submit" onclick="return confirm('Apakah Anda yakin menolak pengajuan ini?')" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-xs flex items-center space-x-1">
                                            <i class="fas fa-times"></i>
                                            <span>Tolak</span>
                                        </button>
                                    </form>
                                    
                                    <form method="POST" action="{{ route('admin.letters.revise', $letter->id) }}" class="inline">
                                        @csrf
                                        <button type="submit" class="bg-orange-600 hover:bg-orange-700 text-white px-3 py-1 rounded text-xs flex items-center space-x-1">
                                            <i class="fas fa-redo"></i>
                                            <span>Revisi</span>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="px-6 py-4 text-center text-gray-500">
                                Tidak ada data pengajuan
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if($letters->hasPages())
            <div class="px-6 py-4 border-t border-gray-200">
                {{ $letters->links() }}
            </div>
            @endif
        </div>
    </div>
</div>

<!-- Document Upload Modal -->
<div id="documentModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-bold text-gray-900">Upload Dokumen Surat</h3>
            <button onclick="closeDocumentModal()" class="text-gray-400 hover:text-gray-600">
                <i class="fas fa-times"></i>
            </button>
        </div>
        
        <form id="documentForm" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">Nomor Surat</label>
                <input type="text" name="nomor_surat" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
            </div>
            
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">File Surat (PDF/DOC/DOCX, max 10MB)</label>
                <input type="file" name="file_surat" accept=".pdf,.doc,.docx" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
            </div>
            
            <div class="flex justify-end space-x-2">
                <button type="button" onclick="closeDocumentModal()" class="px-4 py-2 bg-gray-300 hover:bg-gray-400 text-gray-800 rounded-lg">
                    Batal
                </button>
                <button type="submit" class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg">
                    Upload
                </button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
    function openDocumentModal(letterId) {
        document.getElementById('documentForm').action = '/admin/letters/' + letterId + '/complete-document';
        document.getElementById('documentModal').classList.remove('hidden');
    }

    function closeDocumentModal() {
        document.getElementById('documentModal').classList.add('hidden');
        document.getElementById('documentForm').reset();
    }

    function completeETicket(letterId) {
        if (confirm('Apakah Anda yakin menyelesaikan pengajuan ini dengan E-Tiket?')) {
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = '/admin/letters/' + letterId + '/complete-eticket';
            
            const csrfToken = document.createElement('input');
            csrfToken.type = 'hidden';
            csrfToken.name = '_token';
            csrfToken.value = '{{ csrf_token() }}';
            form.appendChild(csrfToken);
            
            document.body.appendChild(form);
            form.submit();
        }
    }
</script>
@endpush
@endsection

