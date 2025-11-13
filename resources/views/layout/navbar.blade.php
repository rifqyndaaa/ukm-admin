<div class="container-fluid bg-white sticky-top">
    <div class="container">
        <nav class="navbar navbar-expand-lg bg-white navbar-light py-2 py-lg-0">
            <a href="{{ route('home') }}" class="navbar-brand">
                <img class="img-fluid" src="{{ asset('asset/img/logo.png') }}" alt="Logo">
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

                    <div
                        class="nav-item dropdown {{ request()->routeIs('feature.*', 'blog.*', 'testimonial.*', 'error.*') ? 'active' : '' }}">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                        <div class="dropdown-menu bg-light rounded-0 m-0">
                            <a href="{{ route('Warga.index') }}"
                                class="dropdown-item {{ request()->routeIs('Warga.*') ? 'active' : '' }}">Warga</a>
                            <a href="{{ route('User.index') }}"
                                class="dropdown-item {{ request()->routeIs('User.*') ? 'active' : '' }}">User</a>
                            <a href="{{ route('Umkm.index') }}"
                                class="dropdown-item {{ request()->routeIs('Umkm.*') ? 'active' : '' }}">Umkm</a>
                            <a href="{{ route('produk.index') }}"
                                class="dropdown-item {{ request()->routeIs('produk.*') ? 'active' : '' }}">Produk</a>
                        </div>
                    </div>

                    <a href="{{ route('contact') }}"
                        class="nav-item nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a>
                </div>

                <div class="border-start ps-4 d-none d-lg-block">
                    <button type="button" class="btn btn-sm p-0">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
        </nav>
    </div>
</div>
