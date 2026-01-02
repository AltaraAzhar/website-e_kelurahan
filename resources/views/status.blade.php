@extends('layouts.app')

@section('title', 'Cek Status Pengajuan - Kelurahan Pabuaran Mekar')

@section('content')
    <!-- Banner Section -->
    <section class="bg-white py-12 border-b border-gray-200">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-3 text-center">Cek Status Pengajuan</h1>
            <p class="text-gray-600 text-center text-lg">
                Masukkan nomor pengajuan Anda untuk melihat status permohonan surat
            </p>
        </div>
    </section>

    <!-- Status Check Section -->
    <section class="section-padding bg-gray-50">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Search Form -->
            <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                <form id="statusForm" class="flex flex-col sm:flex-row gap-4">
                    <div class="flex-1">
                        <input 
                            type="text" 
                            id="nomorPengajuan"
                            name="nomor_pengajuan"
                            placeholder="Masukkan nomor pengajuan (contoh: SKD-2025-001)"
                            class="form-input w-full px-4 py-3 rounded-lg border-2 border-gray-200 focus:border-yellow-500 focus:ring-2 focus:ring-yellow-500/20 outline-none transition-all"
                        >
                    </div>
                    <button 
                        type="submit"
                        class="btn-primary px-6 py-3 rounded-lg text-white font-semibold flex items-center justify-center space-x-2 whitespace-nowrap">
                        <i class="fas fa-search"></i>
                        <span>Cek Status</span>
                    </button>
                </form>
                <p class="text-sm text-gray-500 mt-3">
                    <i class="fas fa-info-circle mr-1"></i>
                    Nomor pengajuan dapat ditemukan di Email konfirmasi yang Anda terima
                </p>
            </div>

            <!-- Status Result Card -->
            <div id="statusResult" class="bg-white rounded-lg shadow-md p-12 text-center hidden">
                <!-- Status will be displayed here via JavaScript -->
            </div>

            <!-- Empty State -->
            <div id="emptyState" class="bg-white rounded-lg shadow-md p-12 text-center">
                <div class="w-24 h-24 mx-auto mb-6 bg-gray-100 rounded-full flex items-center justify-center">
                    <i class="fas fa-search text-gray-400 text-4xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">Belum ada pencarian</h3>
                <p class="text-gray-600">
                    Masukkan nomor pengajuan Anda untuk melihat status
                </p>
            </div>
        </div>
    </section>

    @push('scripts')
    <script>
        document.getElementById('statusForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const nomorPengajuan = document.getElementById('nomorPengajuan').value.trim();
            const emptyState = document.getElementById('emptyState');
            const statusResult = document.getElementById('statusResult');
            
            if (!nomorPengajuan) {
                alert('Mohon masukkan nomor pengajuan');
                return;
            }
            
            // Hide empty state
            emptyState.classList.add('hidden');
            
            // Show loading state
            statusResult.classList.remove('hidden');
            statusResult.innerHTML = `
                <div class="animate-pulse">
                    <div class="w-16 h-16 mx-auto mb-4 bg-gray-200 rounded-full"></div>
                    <div class="h-4 bg-gray-200 rounded w-48 mx-auto mb-2"></div>
                    <div class="h-4 bg-gray-200 rounded w-32 mx-auto"></div>
                </div>
            `;
            
            // Simulate API call (replace with actual API call)
            setTimeout(() => {
                // Example status data (replace with actual data from backend)
                const statusData = {
                    nomor: nomorPengajuan,
                    jenis: 'Surat Keterangan Tidak Mampu',
                    tanggal: '15 Januari 2025',
                    status: 'sedang_diproses', // 'belum_diproses', 'sedang_diproses', 'selesai'
                    catatan: 'Dokumen sedang dalam proses verifikasi oleh petugas kelurahan.'
                };
                
                let statusBadge = '';
                let statusText = '';
                let statusIcon = '';
                let statusBgClass = '';
                let statusBorderClass = '';
                let statusTextClass = '';
                
                switch(statusData.status) {
                    case 'belum_diproses':
                        statusBadge = 'status-pending';
                        statusText = 'Belum Diproses';
                        statusIcon = 'clock';
                        statusBgClass = 'bg-yellow-50';
                        statusBorderClass = 'border-yellow-200';
                        statusTextClass = 'text-yellow-800';
                        break;
                    case 'sedang_diproses':
                        statusBadge = 'status-processing';
                        statusText = 'Sedang Diproses';
                        statusIcon = 'spinner fa-spin';
                        statusBgClass = 'bg-blue-50';
                        statusBorderClass = 'border-blue-200';
                        statusTextClass = 'text-blue-800';
                        break;
                    case 'selesai':
                        statusBadge = 'status-completed';
                        statusText = 'Selesai';
                        statusIcon = 'check-circle';
                        statusBgClass = 'bg-green-50';
                        statusBorderClass = 'border-green-200';
                        statusTextClass = 'text-green-800';
                        break;
                }
                
                statusResult.innerHTML = `
                    <div class="max-w-2xl mx-auto">
                        <div class="mb-6">
                            <div class="status-badge ${statusBadge} mx-auto mb-4">
                                <i class="fas fa-${statusIcon} mr-2"></i>
                                ${statusText}
                            </div>
                        </div>
                        
                        <div class="bg-gray-50 rounded-lg p-6 mb-6 text-left">
                            <h3 class="font-semibold text-gray-900 mb-4">Detail Pengajuan</h3>
                            <div class="space-y-3">
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Nomor Pengajuan:</span>
                                    <span class="font-semibold text-gray-900">${statusData.nomor}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Jenis Surat:</span>
                                    <span class="font-semibold text-gray-900">${statusData.jenis}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Tanggal Pengajuan:</span>
                                    <span class="font-semibold text-gray-900">${statusData.tanggal}</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="rounded-lg p-4 border ${statusBgClass} ${statusBorderClass}">
                            <p class="text-sm ${statusTextClass}">
                                <i class="fas fa-info-circle mr-2"></i>
                                ${statusData.catatan}
                            </p>
                        </div>
                    </div>
                `;
            }, 1000);
        });
    </script>
    @endpush
@endsection

