
<aside class="col-md-3 col-lg-2 sidebar">

    {{-- BRAND APLIKASI --}}
    <a class="brand d-block mb-4"
       href="{{ route('admin.dashboard') }}">
        🍲 Keysha Kuliner
    </a>

    {{-- JUDUL NAVIGASI --}}
    <div class="small text-uppercase text-white-50 mb-2">
        Menu Utama
    </div>

    {{-- DAFTAR MENU --}}
    <nav class="nav flex-column">

        {{-- DASHBOARD --}}
        <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
           href="{{ route('admin.dashboard') }}">
            🏠 Dashboard
        </a>

        {{-- DATA MENU --}}
        <a class="nav-link {{ request()->routeIs('menu.*') ? 'active' : '' }}"
           href="{{ route('menu.index') }}">
            🍜 Data Menu
        </a>

        {{-- DATA PELANGGAN --}}
        <a class="nav-link {{ request()->routeIs('pelanggan.*') ? 'active' : '' }}"
           href="{{ route('pelanggan.index') }}">
            👥 Data Pelanggan
        </a>

        {{-- DATA RESERVASI --}}
        <a class="nav-link {{ request()->routeIs('reservasi.*') ? 'active' : '' }}"
           href="{{ route('reservasi.index') }}">
            📅 Data Reservasi
        </a>

        {{-- DATA USER --}}
        <a class="nav-link {{ request()->routeIs('user.*') ? 'active' : '' }}"
           href="{{ route('user.index') }}">
            👤 Data User
        </a>

        {{-- WEBSITE PENGUNJUNG --}}
        <a class="nav-link"
           href="{{ url('/guest') }}"
           target="_blank"
           rel="noopener noreferrer">
            🌐 Website Pengunjung
        </a>

    </nav>

    {{-- INFORMASI APLIKASI --}}
    <div class="mt-5 small text-white-50">
        Sistem Informasi Kuliner
        <br>
        CRUD • Laravel
    </div>

</aside>
