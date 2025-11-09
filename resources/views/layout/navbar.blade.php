<!-- Navbar Start -->
    <div class="container-fluid bg-white sticky-top">
        <div class="container">
            <nav class="navbar navbar-expand-lg bg-white navbar-light py-2 py-lg-0">
                <a href="index.html" class="navbar-brand">
                </a>
                <button type="button" class="navbar-toggler ms-auto me-0" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto">
                        <a href="{{ route('umkm.index') }}" class="nav-item nav-link active">data umkm</a>
                        <a href="{{ route('about') }}" class="nav-item nav-link">About</a>
                        <a href="{{ route('product') }}"class="nav-item nav-link">Products</a>
                        <a href="{{ route('store') }}"class="nav-item nav-link">Store</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">menu lainya</a>
                            <div class="dropdown-menu bg-light rounded-0 m-0">
                                <a href="datamasyarakat" class="dropdown-item">Data Masyarakat</a>
                                <a href="datauser" class="dropdown-item">Data Users</a>
                            </div>
                        </div>
                        <a href="{{ route('create') }}" class="nav-item nav-link">tambah umkm</a>
                        <a href="" class="nav-item nav-link">profile</a>
                    </div>
                    <div class="border-start ps-4 d-none d-lg-block">
                        <button type="button" class="btn btn-sm p-0"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->
