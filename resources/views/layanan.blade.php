@extends('layouts.app')

@section('title', 'Informasi Layanan Surat - Kelurahan Pabuaran Mekar')

@section('content')
    <!-- Banner Section -->
    <section class="bg-slate-900 py-12 border-b border-yellow-500/20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-3">Informasi Layanan Surat</h1>
                <p class="text-gray-300 text-lg">
                    Lihat persyaratan dan informasi lengkap untuk setiap jenis surat
                </p>
            </div>
        </div>
    </section>

    <!-- Services Grid -->
    <section class="section-padding bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                @php
                    $services = [
                        [
                            'icon' => 'users',
                            'icon_color' => 'yellow',
                            'name' => 'Kartu Keluarga',
                            'desc' => 'Pengurusan Kartu Keluarga (KK) baru, pindah, hilang, atau perubahan data',
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
                            'time' => '1 hari kerja'
                        ],
                        [
                            'icon' => 'baby',
                            'icon_color' => 'yellow',
                            'name' => 'Surat Keterangan Kelahiran',
                            'desc' => 'Surat pengantar untuk pengurusan Akta Kelahiran',
                            'requirements' => [
                                'Surat Pengantar RT/RW',
                                'Fotocopy KTP orang tua',
                                'Fotocopy KTP saksi',
                                'Fotocopy Buku Nikah / Akta Perkawinan',
                                'Asli dan fotocopy surat keterangan kelahiran dari rumah sakit / bidan',
                            ],
                            'time' => '1 hari kerja'
                        ],
                        [
                            'icon' => 'file-invoice-dollar',
                            'icon_color' => 'blue',
                            'name' => 'Surat Keterangan Tidak Mampu',
                            'desc' => 'Surat keterangan tidak mampu untuk pengurusan biaya pendidikan, kesehatan, dll',
                            'requirements' => [
                                'Pengantar RT/RW',
                                'Fotokopi KTP dan KK Pemohon',
                                'Surat keterangan rawat inap (jika di pergunakan untuk UKS) - Opsional',
                                'Surat keterangan dari sekolah (jika di pergunakan untuk pengurusan keringanan biaya sekolah) - Opsional',
                                'Surat Pernyataan Keluarga Miskin diketahui RT/RW dan bermaterai cukup - Opsional',
                            ],
                            'time' => '1 hari kerja'
                        ],
                        [
                            'icon' => 'heart',
                            'icon_color' => 'pink',
                            'name' => 'Surat Pengantar Nikah',
                            'desc' => 'Surat pengantar untuk pendaftaran pernikahan ke KUA',
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
                            'time' => '1 hari kerja'
                        ],
                        [
                            'icon' => 'sign-out-alt',
                            'icon_color' => 'red',
                            'name' => 'Pindah Keluar',
                            'desc' => 'Surat pengantar untuk pindah keluar dari wilayah Kelurahan Pabuaran Mekar',
                            'requirements' => [
                                'Surat Pengantar RT/RW',
                                'Fotocopy KTP',
                                'Fotocopy Kartu Keluarga',
                                'Formulir F.I.01 yang sudah diisi dan ditandatangani',
                                'Dokumen pendukung lainnya sesuai jenis layanan (KK baru, pindah, hilang, penambahan anggota keluarga, dan lain-lain) - Opsional',
                            ],
                            'time' => '1 hari kerja'
                        ],
                        [
                            'icon' => 'sign-in-alt',
                            'icon_color' => 'red',
                            'name' => 'Pindah Datang',
                            'desc' => 'Surat pengantar untuk pindah datang ke wilayah Kelurahan Pabuaran Mekar',
                            'requirements' => [
                                'Surat Pengantar RT/RW',
                                'Fotocopy KTP',
                                'Fotocopy KK',
                                'Formulir F.I.01 yang sudah diisi dan ditandatangani',
                                'Dokumen pendukung lainnya sesuai jenis layanan (KK baru, pindah, hilang, penambahan anggota keluarga, dan lain-lain) - Opsional',
                            ],
                            'time' => '1 hari kerja'
                        ],
                        [
                            'icon' => 'monument',
                            'icon_color' => 'black',
                            'name' => 'Surat Keterangan Kematian',
                            'desc' => 'Surat pengantar untuk pengurusan akta kematian',
                            'requirements' => [
                                'Pengantar RT/RW',
                                'Fotokopi KTP almarhum/almarhumah',
                                'Fotokopi KTP dan KK Pelapor (jika Pelapor masih dalam 1 KK dengan almarhum/almarhumah)',
                                'Fotokopi KTP saksi',
                                'Surat keterangan kematian dari Puskesmas/dokter/rumah sakit',
                                'Surat Pernyataan kematian jika meninggal di rumah - Opsional',
                                'Formulir Pelaporan Kematian',
                                'Foto makam yang terpasang nisan (jika pelaporan lebih dari 1 tahun dan tidak memiliki surat kematian dari Puskesmas/dokter/rumah sakit) - Opsional',
                            ],
                            'time' => '1 hari kerja'
                        ],
                        [
                            'icon' => 'file-contract',
                            'icon_color' => 'brown',
                            'name' => 'Surat Pernyataan Waris',
                            'desc' => 'Surat pernyataan ahli waris untuk keperluan administrasi warisan',
                            'requirements' => [
                                'Pengantar RT/RW',
                                'Fotokopi Kartu Keluarga',
                                'Fotokopi KTP Para Ahli Waris',
                                'Fotokopi KTP Almarhum/Almarhumah',
                                'Fotokopi Akta Pernikahan (Buku Nikah / Akta Perceraian Almarhum/Almarhumah)',
                                'Fotokopi Akta Kelahiran Para Ahli Waris',
                                'Fotokopi SK Kematian/Buku Tabungan (jika ada)/Surat Keterangan/pernyataan (untuk penerbitan Surat Keterangan Ahli Waris dibuat)',
                                'Fotokopi Akta Kematian almarhum/almarhumah',
                            ],
                            'time' => '1 hari kerja'
                        ],
                        [
                            'icon' => 'store',
                            'icon_color' => 'blue',
                            'name' => 'Surat Keterangan Usaha',
                            'desc' => 'Surat keterangan untuk usaha mikro dan kecil',
                            'requirements' => [
                                'Pengantar RT/RW',
                                'Fotokopi KTP Pemohon',
                                'Fotokopi Kartu Keluarga',
                                'Foto Usaha',
                                'Izin Lingkungan lengkap dengan fotokopi KTP tetangga yang turut tanda tangan (apabila Usaha memiliki dampak lingkungan/kebisingan bagi lingkungan) - Opsional',
                                'Perjanjian Sewa/kwitansi (jika lokasi Usaha milik sendiri) - Opsional',
                                'Fotokopi SHM, bukti bayar PBB (jika lokasi Usaha milik sendiri) - Opsional',
                            ],
                            'time' => '1 hari kerja'
                        ],
                        [
                            'icon' => 'building',
                            'icon_color' => 'blue',
                            'name' => 'Surat Keterangan Domisili Usaha',
                            'desc' => 'Surat keterangan domisili lokasi usaha/perusahaan',
                            'requirements' => [
                                'Pengantar RT/RW',
                                'Fotokopi KTP Pemohon',
                                'Fotokopi Kartu Keluarga',
                                'Akta Pendirian Usaha dan SK MENKUMHAM (untuk CV/PT)',
                                'Izin Lingkungan lengkap dengan KTP tetangga yang turut tanda tangan (apabila Usaha memiliki dampak lingkungan/kebisingan bagi lingkungan) - Opsional',
                                'Foto Usaha - Opsional',
                                'Perjanjian Sewa/kwitansi Pembayaran Sewa (jika lokasi Usaha milik sendiri) - Opsional',
                                'Fotokopi SHM, bukti bayar PBB (jika lokasi Usaha milik sendiri) - Opsional',
                            ],
                            'time' => '1 hari kerja'
                        ],
                        [
                            'icon' => 'home',
                            'icon_color' => 'orange',
                            'name' => 'Pengantar PBB',
                            'desc' => 'Surat pengantar untuk pengurusan pajak bumi dan bangunan (PBB)',
                            'requirements' => [
                                'Surat Pengantar RT/RW',
                                'Fotocopy KTP',
                                'Fotocopy Kartu Keluarga',
                                'Fotocopy PBB',
                                'Dokumen pendukung lainnya sesuai jenis layanan PBB (penerbitan baru, mutasi sebagian/mutasi keseluruhan/perbaikan)',
                            ],
                            'time' => '1 hari kerja'
                        ],
                        [
                            'icon' => 'tree',
                            'icon_color' => 'brown',
                            'name' => 'Riwayat Tanah / Tidak Sengketa',
                            'desc' => 'Surat keterangan riwayat kepemilikan tanah dan tidak ada sengketa',
                            'requirements' => [
                                'Pengantar RT/RW',
                                'Fotokopi Kartu Keluarga',
                                'Fotokopi KTP Pemohon',
                                'Fotokopi KTP Ahli Waris (jika diwariskan) - Opsional',
                                'Fotokopi Sertifikat Tanah',
                                'Fotokopi SPPT PBB tahun berjalan dan bukti bayar',
                                'Surat Pernyataan Riwayat Tanah',
                            ],
                            'time' => '1 hari kerja'
                        ],
                    ];
                @endphp

                @foreach($services as $service)
                <div class="bg-white rounded-lg shadow-md p-6 border border-gray-100">
                    <div class="flex items-start space-x-4 mb-4">
                        @php
                            $bgColor = match($service['icon_color']) {
                                'yellow' => 'bg-yellow-100',
                                'blue' => 'bg-blue-100',
                                'pink' => 'bg-pink-100',
                                'red' => 'bg-red-100',
                                'black' => 'bg-gray-100',
                                'brown' => 'bg-amber-100',
                                'orange' => 'bg-orange-100',
                                default => 'bg-gray-100'
                            };
                            $textColor = match($service['icon_color']) {
                                'yellow' => 'text-yellow-600',
                                'blue' => 'text-blue-600',
                                'pink' => 'text-pink-600',
                                'red' => 'text-red-600',
                                'black' => 'text-gray-600',
                                'brown' => 'text-amber-600',
                                'orange' => 'text-orange-600',
                                default => 'text-gray-600'
                            };
                        @endphp
                        <div class="flex-shrink-0 w-12 h-12 {{ $bgColor }} rounded-lg flex items-center justify-center">
                            <i class="fas fa-{{ $service['icon'] }} {{ $textColor }} text-xl"></i>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $service['name'] }}</h3>
                            <p class="text-gray-600 text-sm mb-4">{{ $service['desc'] }}</p>
                        </div>
                    </div>

                    <div class="mb-4">
                        <h4 class="font-semibold text-gray-900 mb-2">Persyaratan:</h4>
                        <ul class="space-y-1 text-sm text-gray-600">
                            @foreach($service['requirements'] as $req)
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-yellow-600 mr-2 mt-1 text-xs"></i>
                                <span>{{ $req }}</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="pt-4 border-t border-gray-200">
                        <div class="flex items-center justify-between">
                            <span class="text-sm text-gray-500">Waktu Proses:</span>
                            <span class="px-3 py-1 bg-yellow-100 text-yellow-700 rounded-full text-sm font-semibold">
                                {{ $service['time'] }}
                            </span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

