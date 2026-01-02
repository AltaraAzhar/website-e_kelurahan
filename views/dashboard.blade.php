@extends('layouts.app')

@section('title', 'Dashboard - Kelurahan Pabuaran Mekar')

@section('content')
<div class="min-h-screen bg-gray-50 py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Success Message -->
        @if (session('success'))
            <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <!-- Welcome Header -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-6">
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Dashboard</h1>
            <p class="text-gray-600">Selamat datang, <strong>{{ auth()->user()->name }}</strong>!</p>
        </div>

        <!-- User Information Card -->
        <div class="bg-white rounded-lg shadow-md p-6 mb-6">
            <h2 class="text-xl font-bold text-gray-900 mb-4">Informasi Akun</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <p class="text-sm text-gray-600">Nama Lengkap</p>
                    <p class="text-lg font-semibold text-gray-900">{{ auth()->user()->name }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Email</p>
                    <p class="text-lg font-semibold text-gray-900">{{ auth()->user()->email }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-600">NIK/NIP</p>
                    <p class="text-lg font-semibold text-gray-900">{{ auth()->user()->nik_or_nip ?? '-' }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-600">No. HP</p>
                    <p class="text-lg font-semibold text-gray-900">{{ auth()->user()->phone ?? '-' }}</p>
                </div>
                @if(auth()->user()->address)
                <div class="md:col-span-2">
                    <p class="text-sm text-gray-600">Alamat</p>
                    <p class="text-lg font-semibold text-gray-900">{{ auth()->user()->address }}</p>
                </div>
                @endif
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <a href="{{ route('pengajuan') }}" class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition-shadow">
                <div class="flex items-center space-x-4">
                    <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-file-alt text-blue-600 text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900">Pengajuan Surat</h3>
                        <p class="text-sm text-gray-600">Ajukan surat baru</p>
                    </div>
                </div>
            </a>

            <a href="{{ route('status') }}" class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition-shadow">
                <div class="flex items-center space-x-4">
                    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-check-circle text-green-600 text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900">Status Pengajuan</h3>
                        <p class="text-sm text-gray-600">Cek status surat</p>
                    </div>
                </div>
            </a>

            <a href="{{ route('layanan') }}" class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition-shadow">
                <div class="flex items-center space-x-4">
                    <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-list text-yellow-600 text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900">Layanan</h3>
                        <p class="text-sm text-gray-600">Lihat layanan tersedia</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection

