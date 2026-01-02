<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LayananController extends Controller
{
    /**
     * Display the administrative services page.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $services = [
            [
                'icon' => 'users',
                'title' => 'Kartu Keluarga',
                'description' => 'Pengurusan Kartu Keluarga (KK) baru, pindah, hilang, atau perubahan data',
                'requirements' => [
                    'Pengantar RT/RW',
                    'Fotokopi Kartu Keluarga',
                    'Fotokopi Akta Kelahiran',
                    'Fotokopi surat nikah',
                    'Fotokopi Surat Pindah dari Daerah Asal dan Surat Lapor Masuk dari Dukcapil Kabupaten',
                    'Fotokopi Akta Kematian (jika ada anggota keluarga yang meninggal) - Opsional',
                    'Fotokopi surat cerai (jika bercerai) - Opsional',
                    'Surat Pernyataan Belum Menikah (bagi yang berusia 23 tahun keatas) - Opsional',
                    'Formulir F.I.01',
                ],
                'process_time' => '1-3 hari kerja',
            ],
            [
                'icon' => 'baby',
                'title' => 'Surat Keterangan Kelahiran',
                'description' => 'Surat pengantar untuk pengurusan Akta Kelahiran',
                'requirements' => [
                    'Surat Pengantar RT/RW',
                    'Fotocopy KTP orang tua',
                    'Fotocopy KTP saksi',
                    'Fotocopy Buku Nikah / Akta Perkawinan',
                    'Asli dan fotocopy surat keterangan kelahiran dari rumah sakit / bidan',
                ],
                'process_time' => '1-3 hari kerja',
            ],
            [
                'icon' => 'file-invoice',
                'title' => 'Surat Keterangan Tidak Mampu',
                'description' => 'Surat keterangan tidak mampu untuk pengurusan biaya pendidikan, kesehatan, dll',
                'requirements' => [
                    'Pengantar RT/RW',
                    'Fotokopi KTP dan KK Pemohon',
                    'Surat keterangan rawat inap (jika di pergunakan untuk UKS) - Opsional',
                    'Surat keterangan dari sekolah (jika di pergunakan untuk pengurusan keringanan biaya sekolah) - Opsional',
                    'Surat Pernyataan Keluarga Miskin diketahui RT/RW dan bermaterai cukup - Opsional',
                ],
                'process_time' => '1-3 hari kerja',
            ],
            [
                'icon' => 'heart',
                'title' => 'Surat Pengantar Nikah',
                'description' => 'Surat pengantar untuk pendaftaran pernikahan ke KUA',
                'requirements' => [
                    'Pengantar RT/RW',
                    'Fotokopi Kartu Keluarga Calon Laki-Laki/Perempuan',
                    'Fotokopi KTP Calon Mempelai Laki-Laki dan Perempuan',
                    'KTP kedua Orang Tua Calon Laki-Laki dan Perempuan',
                    'Fotokopi Buku Nikah Orang Tua',
                    'Fotokopi Surat Pernyataan Belum Menikah (bagi Janda/Duda) - Opsional',
                    'Fotokopi Surat Keterangan Pernah Menikah (bagi Janda/Duda) - Opsional',
                    'Fotokopi N1, N2, N4, dan N5',
                    'Fotokopi Akta Kematian (jika orang tua sudah meninggal) - Opsional',
                    'Fotokopi Akta Kematian Suami/Istri (jika Calon Pengantin Cerai Mati) - Opsional',
                    'Fotokopi Akta Cerai (jika Calon Pengantin Cerai Hidup) - Opsional',
                    'Fotokopi Akta Kelahiran Calon Mempelai Laki-Laki dan Perempuan',
                ],
                'process_time' => '1-3 hari kerja',
            ],
            [
                'icon' => 'arrow-up',
                'title' => 'Pindah Keluar',
                'description' => 'Surat pengantar untuk pindah keluar dari wilayah Kelurahan Pabuaran Mekar',
                'requirements' => [
                    'Surat Pengantar RT/RW',
                    'Fotocopy KTP Pemohon',
                    'Fotocopy Kartu Keluarga Pemohon',
                    'Formulir F1.03 yang sudah diisi dan ditandatangani',
                    'Dokumen pendukung lainnya sesuai jenis layanan KK (baru, pindah, hilang, penambahan anggota keluarga, dan lain-lain) - Opsional',
                ],
                'process_time' => '1-3 hari kerja',
            ],
            [
                'icon' => 'arrow-down',
                'title' => 'Pindah Datang',
                'description' => 'Surat pengantar untuk pindah datang ke wilayah Kelurahan Pabuaran Mekar',
                'requirements' => [
                    'Surat Pengantar RT/RW',
                    'Fotocopy KTP',
                    'Fotocopy KK',
                    'Formulir F1.01 yang sudah diisi dan ditandatangani',
                    'Dokumen pendukung lainnya sesuai jenis layanan KK (baru, pindah, hilang, penambahan anggota keluarga, dan lain-lain) - Opsional',
                ],
                'process_time' => '1-3 hari kerja',
            ],
            [
                'icon' => 'dove',
                'title' => 'Surat Keterangan Kematian',
                'description' => 'Surat pengantar untuk pengurusan Akta Kematian',
                'requirements' => [
                    'Pengantar RT/RW',
                    'Fotokopi KTP dan KK Almarhum/Almarhumah',
                    'Fotokopi KTP dan KK Pelapor (jika Pelapor masih dalam 1 KK dengan alm/almh cukup Fotokopi KTP)',
                    'Surat Keterangan Kematian dari Puskesmas/Dokter/Klinik/Rumah Sakit',
                    'Surat Pernyataan Kematian Jika meninggal di rumah - Opsional',
                    'Formulir Pelaporan Kematian',
                    'Foto Makam yang terdapat nisan jika pelaporan lebih dari 1 tahun dan tidak memiliki surat kematian dari Puskesmas/Dokter/Klinik/Rumah Sakit - Opsional',
                ],
                'process_time' => '1-3 hari kerja',
            ],
            [
                'icon' => 'scroll',
                'title' => 'Surat Pernyataan Waris',
                'description' => 'Surat pernyataan ahli waris untuk keperluan administrasi warisan',
                'requirements' => [
                    'Pengantar RT/RW',
                    'Fotokopi Kartu Keluarga Para Ahli Waris',
                    'Fotokopi KTP Para Ahli Waris',
                    'Fotokopi Akta Pernikahan (Buku Nikah) / Akta Perceraian Almarhum/Almarhumah',
                    'Fotokopi Akta Kelahiran Para Ahli Waris',
                    'Fotokopi SK Pensiun/Buku Tabungan/SHM/SHGB/BPJS Ketenagakerjaan (sesuai Peruntukan Surat Keterangan Ahli Waris dibuat) - Opsional',
                    'Fotokopi Akta Kematian Almarhum/Almarhumah',
                ],
                'process_time' => '1-3 hari kerja',
            ],
            [
                'icon' => 'store',
                'title' => 'Surat Keterangan Usaha',
                'description' => 'Surat keterangan untuk usaha mikro dan kecil',
                'requirements' => [
                    'Pengantar RT/RW',
                    'Fotokopi Kartu Keluarga',
                    'Fotokopi KTP Pemohon',
                    'Foto Usaha',
                    'Izin Lingkungan Lengkap dengan Fotokopi KTP tetangga yang turut tanda tangan (apabila Usaha Memiliki dampak Kebahayaan bagi Lingkungan) - Opsional',
                    'Perjanjian Sewa/Kwitansi (jika Lokasi Usaha bukan Milik Sendiri) - Opsional',
                    'Fotokopi SHM dan Bukti Bayar PBB (jika Lokasi Usaha Milik Sendiri) - Opsional',
                ],
                'process_time' => '1-3 hari kerja',
            ],
            [
                'icon' => 'building',
                'title' => 'Surat Keterangan Domisili Usaha',
                'description' => 'Surat keterangan domisili lokasi usaha/perusahaan',
                'requirements' => [
                    'Pengantar RT/RW',
                    'Fotokopi Kartu Keluarga',
                    'Fotokopi KTP Pemohon',
                    'Akta Pendirian Usaha dan SK MENKUMHAM (untuk CV/PT)',
                    'Izin Lingkungan lengkap dengan KTP tetangga yang turut tanda tangan (apabila Usaha Memiliki Dampak Limbah/Kebahayaan bagi Lingkungan) - Opsional',
                    'Foto Usaha - Opsional',
                    'Perjanjian Sewa/Kwitansi Pembayaran Sewa (jika Lokasi Usaha bukan Milik Sendiri) - Opsional',
                    'Fotokopi SHM, Bukti Bayar PBB (jika Lokasi Usaha Milik Sendiri) - Opsional',
                ],
                'process_time' => '1-3 hari kerja',
            ],
            [
                'icon' => 'home',
                'title' => 'Pengantar PBB',
                'description' => 'Surat pengantar untuk pengurusan Pajak Bumi dan Bangunan (PBB)',
                'requirements' => [
                    'Surat Pengantar RT/RW',
                    'Fotocopy KTP Pemohon',
                    'Fotocopy Kartu Keluarga Pemohon',
                    'Fotocopy Bukti Kepemilikan (AJB/APHB/Hibah/Sertifikat)',
                    'Dokumen pendukung lainnya sesuai jenis layanan PBB (penerbitan baru / mutasi / sebagian / mutasi keseluruhan / perbaikan)',
                ],
                'process_time' => '1-3 hari kerja',
            ],
            [
                'icon' => 'clipboard',
                'title' => 'Riwayat Tanah / Tidak Sengketa',
                'description' => 'Surat keterangan riwayat kepemilikan tanah dan tidak ada sengketa',
                'requirements' => [
                    'Pengantar RT/RW',
                    'Fotokopi Kartu Keluarga',
                    'Fotokopi KTP Pemohon',
                    'Fotokopi KTP & Surat Kuasa (jika dikuasakan) - Opsional',
                    'Fotokopi Sertifikat Tanah',
                    'Fotokopi SPPT PBB Tahun Berjalan dan Bukti Bayar',
                    'Surat Pernyataan Riwayat Tanah',
                ],
                'process_time' => '1-3 hari kerja',
            ],
        ];

        return view('layanan.index', compact('services'));
    }
}

