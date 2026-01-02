@extends('layouts.app')

@section('title', 'Kontak - Kelurahan Pabuaran Mekar')

@section('content')
    <!-- Banner Section -->
    <section class="bg-white py-12 border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <span class="inline-block px-4 py-2 bg-yellow-100 text-yellow-700 rounded-full text-sm font-medium mb-4">
                    Hubungi Kami
                </span>
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-3">Informasi Kontak</h1>
                <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                    Hubungi kami untuk informasi lebih lanjut mengenai layanan surat online
                </p>
            </div>
        </div>
    </section>

    <!-- Contact Information Section -->
    <section class="section-padding bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-12">
                <div class="bg-white rounded-lg shadow-md p-6 border border-gray-100">
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0 w-14 h-14 bg-yellow-100 rounded-lg flex items-center justify-center">
                            <i class="fas fa-map-marker-alt text-yellow-600 text-2xl"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900 mb-2 text-lg">Alamat Kantor</h3>
                            <p class="text-gray-600">
                                Jl. Raya Pabuaran Mekar No. 123, Cibinong, Kabupaten Bogor, Jawa Barat 16914
                            </p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-md p-6 border border-gray-100">
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0 w-14 h-14 bg-yellow-100 rounded-lg flex items-center justify-center">
                            <i class="fas fa-phone text-yellow-600 text-2xl"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900 mb-2 text-lg">Telepon</h3>
                            <p class="text-gray-600">
                                (0251) 123-4567
                            </p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-md p-6 border border-gray-100">
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0 w-14 h-14 bg-yellow-100 rounded-lg flex items-center justify-center">
                            <i class="fas fa-envelope text-yellow-600 text-2xl"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900 mb-2 text-lg">Email</h3>
                            <p class="text-gray-600">
                                kelpabuaranmekar@bogorkab.go.id
                            </p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-md p-6 border border-gray-100">
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0 w-14 h-14 bg-yellow-100 rounded-lg flex items-center justify-center">
                            <i class="fas fa-clock text-yellow-600 text-2xl"></i>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-900 mb-2 text-lg">Jam Pelayanan</h3>
                            <p class="text-gray-600">
                                Senin - Jumat: 08:00 - 16:00 WIB<br>
                                (Istirahat 12:00 - 13:00)
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Butuh Bantuan Section -->
            <div class="bg-slate-900 rounded-lg shadow-lg p-8 text-center mb-12">
                <h2 class="text-2xl font-bold text-white mb-3">Butuh Bantuan?</h2>
                <p class="text-gray-300 mb-6">
                    Tim kami siap membantu Anda. Hubungi kami melalui WhatsApp untuk respon yang lebih cepat.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="https://wa.me/6281234567890" 
                       target="_blank"
                       class="btn-primary px-6 py-3 rounded-lg text-white font-semibold flex items-center justify-center space-x-2">
                        <i class="fab fa-whatsapp text-xl"></i>
                        <span>WhatsApp: 0812-3456-7890</span>
                    </a>
                    <a href="tel:+622511234567" 
                       class="btn-outline px-6 py-3 rounded-lg font-semibold flex items-center justify-center space-x-2">
                        <i class="fas fa-phone"></i>
                        <span>Telepon Kantor</span>
                    </a>
                </div>
            </div>

            <!-- FAQ Section -->
            <div class="max-w-4xl mx-auto">
                <h2 class="text-3xl font-bold text-gray-900 mb-8 text-center">Pertanyaan yang Sering Diajukan</h2>
                
                <div class="space-y-4">
                    @php
                        $faqs = [
                            [
                                'q' => 'Berapa lama proses pembuatan surat?',
                                'a' => 'Proses verifikasi dan pembuatan surat memakan waktu 1-3 hari kerja tergantung jenis surat yang diajukan.'
                            ],
                            [
                                'q' => 'Apakah ada biaya untuk mengajukan surat?',
                                'a' => 'Semua layanan pembuatan surat di kelurahan ini GRATIS. Tidak ada biaya yang dipungut.'
                            ],
                            [
                                'q' => 'Bagaimana cara mengambil surat yang sudah jadi?',
                                'a' => 'Surat dapat diambil di kantor kelurahan dengan membawa KTP asli dan nomor pengajuan pada jam pelayanan.'
                            ],
                        ];
                    @endphp

                    @foreach($faqs as $index => $faq)
                    <div class="bg-white rounded-lg shadow-md p-6 border border-gray-100 accordion-item">
                        <button class="accordion-button w-full text-left flex items-center justify-between focus:outline-none" 
                                onclick="toggleAccordion({{ $index }})">
                            <h3 class="text-lg font-semibold text-gray-900 flex items-center">
                                <i class="fas fa-question-circle text-yellow-600 mr-3"></i>
                                {{ $faq['q'] }}
                            </h3>
                            <i class="fas fa-chevron-down text-gray-400 transition-transform" id="icon-{{ $index }}"></i>
                        </button>
                        <div id="content-{{ $index }}" class="hidden mt-4 pl-10">
                            <p class="text-gray-600">{{ $faq['a'] }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    @push('scripts')
    <script>
        function toggleAccordion(index) {
            const content = document.getElementById('content-' + index);
            const icon = document.getElementById('icon-' + index);
            
            if (content.classList.contains('hidden')) {
                content.classList.remove('hidden');
                icon.classList.add('rotate-180');
            } else {
                content.classList.add('hidden');
                icon.classList.remove('rotate-180');
            }
        }
    </script>
    @endpush
@endsection

