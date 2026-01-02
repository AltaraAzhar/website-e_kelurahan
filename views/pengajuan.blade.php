@extends('layouts.app')

@section('title', 'Pengajuan Surat - Kelurahan Pabuaran Mekar')

@section('content')
    <section class="min-h-screen flex items-center justify-center bg-gray-50 py-20">
        <div class="max-w-md w-full mx-auto px-4">
            <div class="bg-white rounded-lg shadow-lg p-8 text-center">
                <!-- Lock Icon -->
                <div class="mb-6">
                    <div class="w-20 h-20 mx-auto bg-blue-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-lock text-blue-500 text-4xl"></i>
                    </div>
                </div>

                <!-- Title -->
                <h1 class="text-3xl font-bold text-gray-900 mb-4">Login Diperlukan</h1>

                <!-- Description -->
                <p class="text-gray-600 mb-8">
                    Silakan login terlebih dahulu untuk mengajukan permohonan surat
                </p>

                <!-- CTA Button -->
                <a   
                href="{{ route('login') }}"
                class="inline-flex items-center justify-center space-x-2 px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg transition-colors duration-200"
              >
                <span>Masuk Sekarang</span>
                <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </section>
@endsection

