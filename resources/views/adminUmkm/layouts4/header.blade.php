<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
    <a href="/" class="navbar-brand d-flex align-items-center text-center py-0 px-4 px-lg-5">
        <h1 class="m-0 text-primary">Tea House</h1>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="{{ route('umkm.index') }}" class="nav-item nav-link">Data UMKM</a>
            <a href="{{ route('datamasyarakat.index') }}" class="nav-item nav-link">Data Masyarakat</a>
            <a href="{{ route('datauser.index') }}" class="nav-item nav-link">Data Users</a>
        </div>
    </div>
</nav>
<!-- Navbar End -->
