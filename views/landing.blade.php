<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Layanan Surat Online - Kelurahan Pabuaran Mekar</title>

  @vite(['resources/css/app.css', 'resources/js/app.js'])

  <!-- Font Awesome -->
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
  />

  <style>
    html { scroll-behavior: smooth; }

    .hero-overlay {
      background: linear-gradient(
        135deg,
        rgba(30, 41, 59, 0.85) 0%,
        rgba(15, 23, 42, 0.9) 100%
      );
    }

    /* .logo-shield {
      width: 48px;
      height: 48px;
      background: linear-gradient(135deg, #ffd700 0%, #ffa500 100%);
      border-radius: 8px 8px 0 0;
      position: relative;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .logo-shield::after {
      content: "";
      position: absolute;
      bottom: -12px;
      left: 50%;
      transform: translateX(-50%);
      border-left: 24px solid transparent;
      border-right: 24px solid transparent;
      border-top: 12px solid #ffd700;
    }

    .logo-shield-inner {
      width: 32px;
      height: 32px;
      background: #4caf50;
      clip-path: polygon(50% 0%, 0% 100%, 100% 100%);
      display: flex;
      align-items: center;
      justify-content: center;
    } */
  </style>
</head>

<body class="bg-white text-gray-900 font-sans">

<!-- ================= NAVBAR ================= -->
<nav id="navbar"
  class="fixed top-0 left-0 right-0 bg-white z-50 border-b border-gray-200 shadow-sm">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between items-center h-20">

      <!-- Logo -->
      <div class="flex items-center space-x-3">
        <div class="logo-shield">
          <div class="logo-shield-inner">
            <i class="fas fa-building text-white text-sm"></i>
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
        <a href="#beranda" class="text-gray-800 hover:text-yellow-500 font-medium">Beranda</a>
        <a href="#layanan" class="text-gray-800 hover:text-yellow-500 font-medium">Layanan</a>
        <a href="#pengajuan" class="text-gray-800 hover:text-yellow-500 font-medium">Pengajuan Surat</a>
        <a href="#status" class="text-gray-800 hover:text-yellow-500 font-medium">Status Pengajuan</a>
        <a href="#kontak" class="text-gray-800 hover:text-yellow-500 font-medium">Kontak</a>

        <a href="{{ route('login') }}"
          class="border border-yellow-500 text-yellow-600 px-4 py-2 rounded-lg hover:bg-yellow-500 hover:text-white transition">
          Masuk
        </a>

        <a href="{{ route('register') }}"
          class="bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-600 transition">
          Daftar
        </a>
      </div>

      <!-- Mobile Button -->
      <button id="mobile-menu-button"
        class="md:hidden text-gray-800 p-2 focus:outline-none">
        <i id="menu-icon" class="fas fa-bars text-2xl"></i>
      </button>

    </div>
  </div>

  <!-- Mobile Menu -->
  <div id="mobile-menu"
    class="hidden md:hidden bg-white border-t border-gray-200">
    <div class="px-4 py-4 space-y-2">
      <a href="#beranda" class="block px-4 py-3 text-gray-800 hover:bg-gray-100 rounded">Beranda</a>
      <a href="#layanan" class="block px-4 py-3 text-gray-800 hover:bg-gray-100 rounded">Layanan</a>
      <a href="#pengajuan" class="block px-4 py-3 text-gray-800 hover:bg-gray-100 rounded">Pengajuan Surat</a>
      <a href="#status" class="block px-4 py-3 text-gray-800 hover:bg-gray-100 rounded">Status Pengajuan</a>
      <a href="#kontak" class="block px-4 py-3 text-gray-800 hover:bg-gray-100 rounded">Kontak</a>

      <a href="{{ route('login') }}"
        class="block text-center bg-yellow-500 text-white py-3 rounded-lg">
        Masuk
      </a>
      <a href="{{ route('register') }}"
        class="block text-center bg-yellow-500 text-white py-3 rounded-lg">
        Daftar
      </a>
    </div>
  </div>
</nav>

    <!-- ================ HERO SECTION (tetap) ================ -->
    <section id="beranda"
      class="relative pt-28 pb-32 bg-cover bg-center"
      style="background-image:url('https://images.unsplash.com/photo-1564013799919-ab600027ffc6?w=1920&q=80');">
      <div class="hero-overlay absolute inset-0"></div>
      <div class="relative z-10 max-w-7xl mx-auto text-center px-4">
        <h1 class="text-5xl font-bold text-white mb-4">Layanan Surat Online</h1>
        <p class="text-gray-200 max-w-2xl mx-auto">
          Pelayanan administrasi kelurahan cepat, mudah, dan transparan
        </p>
      </div>
    </section>

    <!-- ================= JS ================= -->
    <script>
      const btn = document.getElementById("mobile-menu-button");
      const menu = document.getElementById("mobile-menu");
      const icon = document.getElementById("menu-icon");

      btn.addEventListener("click", () => {
        menu.classList.toggle("hidden");
        icon.classList.toggle("fa-bars");
        icon.classList.toggle("fa-times");
      });

      window.addEventListener("scroll", () => {
        const nav = document.getElementById("navbar");
        nav.classList.toggle("shadow-md", window.scrollY > 10);
      });
    </script>

</body>
</html>
