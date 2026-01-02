<nav class="fixed top-0 left-0 right-0 bg-white z-50 border-b border-gray-200 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">

            <!-- Logo -->
            <div class="flex items-center space-x-3">
                <div class="logo-shield">
                    <div class="logo-shield-inner">
                        <img 
                            src="{{ asset('images/Lambang_Kabupaten_Bogor.svg') }}"
                            alt="Lambang Kabupaten Bogor"
                            class="h-10 w-auto"
                        />
                    </div>
                </div>
                <div>
                    <div class="text-gray-900 font-bold text-lg">
                        Kelurahan Pabuaran Mekar
                    </div>
                    <div class="text-gray-600 text-xs">
                        Kec. Cibinong, Kab. Bogor
                    </div>
                </div>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center space-x-6">
                <a href="{{ route('landing') }}" class="text-gray-800 hover:text-yellow-500 font-medium">Beranda</a>
                <a href="{{ route('layanan') }}" class="text-gray-800 hover:text-yellow-500 font-medium">Layanan</a>
                <a href="{{ route('pengajuan') }}" class="text-gray-800 hover:text-yellow-500 font-medium">Pengajuan Surat</a>
                <a href="{{ route('status') }}" class="text-gray-800 hover:text-yellow-500 font-medium">Status</a>
                <a href="{{ route('kontak') }}" class="text-gray-800 hover:text-yellow-500 font-medium">Kontak</a>

                <a href="{{ route('login') }}" class="bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-600">Masuk</a>
                <a href="{{ route('register') }}" class="bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-600">Daftar</a>
            </div>

            <!-- Mobile Button -->
            <button id="mobile-menu-button" class="md:hidden text-gray-800">
                <i class="fas fa-bars text-2xl"></i>
            </button>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-gray-200">
        <div class="px-4 py-4 space-y-2">
            <a href="{{ route('landing') }}" class="block px-4 py-3 text-gray-800 hover:bg-gray-100 rounded-lg">Beranda</a>
            <a href="{{ route('layanan') }}" class="block px-4 py-3 text-gray-800 hover:bg-gray-100 rounded-lg">Layanan</a>
            <a href="{{ route('pengajuan') }}" class="block px-4 py-3 text-gray-800 hover:bg-gray-100 rounded-lg">Pengajuan Surat</a>
            <a href="{{ route('status') }}" class="block px-4 py-3 text-gray-800 hover:bg-gray-100 rounded-lg">Status</a>
            <a href="{{ route('kontak') }}" class="block px-4 py-3 text-gray-800 hover:bg-gray-100 rounded-lg">Kontak</a>

            <a href="{{ route('login') }}" class="block bg-yellow-500 text-white text-center py-3 rounded-lg">Masuk</a>
            <a href="{{ route('register') }}" class="block bg-yellow-500 text-white text-center py-3 rounded-lg">Daftar</a>
        </div>
    </div>
</nav>

