<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class Letter extends Model
{
    use HasFactory;

    protected $connection = 'mongodb';
    protected $collection = 'letters';

    protected $fillable = [
        'no_pengajuan',
        'jenis_surat',
        'pemohon',
        'nik',
        'tanggal',
        'status',
        'nomor_surat',
        'file_surat',
        'tiket_code',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    /**
     * Get the user that owns the letter.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'pemohon');
    }
}

