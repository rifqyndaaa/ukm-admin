    <div class="container-fluid bg-white sticky-top">
        <div class="container">
            {{-- py-4 agar navbar jauh lebih tinggi dan memberi ruang logo besar --}}
            <nav class="navbar navbar-expand-lg bg-white navbar-light py-4 py-lg-0">
                <a href="{{ route('home') }}" class="navbar-brand py-3">
                    {{-- PENYESUAIAN TERAKHIR: Tinggi diubah menjadi 90px agar sangat dominan dan jelas --}}
                    <img class="img-fluid" src="{{ asset('asset/img/logo.jpg') }}" alt="Logo" style="height: 90px; width: auto;">
                </a>
                <button type="button" class="navbar-toggler ms-auto me-0" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto">
                        <a href="{{ route('home') }}"
                            class="nav-item nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
                        <a href="{{ route('about') }}"
                            class="nav-item nav-link {{ request()->routeIs('about') ? 'active' : '' }}">About</a>
                        <a href="{{ route('product') }}"
                            class="nav-item nav-link {{ request()->routeIs('product') ? 'active' : '' }}">Products</a>
                        <a href="{{ route('store') }}"
                            class="nav-item nav-link {{ request()->routeIs('store') ? 'active' : '' }}">Store</a>

                        <div class="nav-item dropdown {{ request()->routeIs('feature.*', 'blog.*', 'testimonial.*', 'error.*', 'Warga.*', 'User.*', 'Umkm.*', 'produk.*') ? 'active' : '' }}">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                            <div class="dropdown-menu bg-light rounded-0 m-0">
                                <a href="{{ route('Warga.index') }}" class="dropdown-item {{ request()->routeIs('Warga.*') ? 'active' : '' }}">Warga</a>
                                <a href="{{ route('User.index') }}" class="dropdown-item {{ request()->routeIs('User.*') ? 'active' : '' }}">User</a>
                                <a href="{{ route('Umkm.index') }}" class="dropdown-item {{ request()->routeIs('Umkm.*') ? 'active' : '' }}">Umkm</a>
                                <a href="{{ route('produk.index') }}" class="dropdown-item {{ request()->routeIs('produk.*') ? 'active' : '' }}">Produk</a>
                                <a href="{{ route('pesanan.index') }}" class="dropdown-item {{ request()->routeIs('pesanan.*') ? 'active' : '' }}">Pesanan</a>
                                <a href="{{ route('detail-pesanan.index') }}" class="dropdown-item {{ request()->routeIs('detail-pesanan.*') ? 'active' : '' }}">Detail Pesanan</a>
                                <a href="{{ route('ulasan-produk.index') }}" class="dropdown-item {{ request()->routeIs('ulasan-produk.*') ? 'active' : '' }}">Ulasan Produk</a>
                            </div>
                        </div>

                        <a href="{{ route('contact') }}"
                            class="nav-item nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">Profile</a>
                    </div>

                    <div class="border-start ps-4 d-none d-lg-block">
                        <button type="button" class="btn btn-sm p-0">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>

                    {{-- LOGIN / USER SESSION --}}
                    <div class="ms-3">
                        @if(Auth::check())
                            <div class="dropdown">
                                <a href="#" class="btn btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown">
                                    {{ Auth::user()->name }}
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a>
                                    </li>
                                    <li>
                                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="dropdown-item">Logout</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                        @endif
                    </div>

                </div>
            </nav>
        </div>
    </div>
