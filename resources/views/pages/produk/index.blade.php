@extends('layout.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-3">Daftar Produk</h2>

    <a href="{{ route('produk.create') }}" class="btn btn-primary mb-3 rounded-pill px-4">
        + Tambah Produk
    </a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- 🔍 SEARCH & FILTER -->
    <form method="GET" class="card card-body mb-4 shadow-sm">
        <div class="row g-3">

            <div class="col-md-4">
                <input type="text"
                    name="search"
                    value="{{ request('search') }}"
                    class="form-control rounded-pill"
                    placeholder="Cari nama produk...">
            </div>

            <div class="col-md-3">
                <select name="umkm_id" class="form-control rounded-pill">
                    <option value="">Filter UMKM</option>
                    @foreach($umkms as $u)
                        <option value="{{ $u->umkm_id }}"
                            {{ request('umkm_id') == $u->umkm_id ? 'selected' : '' }}>
                            {{ $u->nama_usaha }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-2">
                <select name="status" class="form-control rounded-pill">
                    <option value="">Status</option>
                    <option value="aktif" {{ request('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                    <option value="nonaktif" {{ request('status') == 'nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                </select>
            </div>

            <div class="col-md-2">
                <button class="btn btn-primary w-100 rounded-pill">
                    <i class="fas fa-search"></i> Filter
                </button>
            </div>

            <div class="col-md-1">
                <a href="{{ route('produk.index') }}"
                   class="btn btn-secondary w-100 rounded-pill">Reset</a>
            </div>

        </div>
    </form>

    <!-- CARD LIST -->
    <div class="row">
        @forelse ($produks as $produk)
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm h-100">
                <div class="card-body">

                    <h5 class="card-title">{{ $produk->nama_produk }}</h5>

                    <p class="mb-1"><strong>UMKM:</strong> {{ $produk->umkm->nama_usaha ?? '-' }}</p>
                    <p class="mb-1"><strong>Harga:</strong> Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>
                    <p class="mb-1"><strong>Stok:</strong> {{ $produk->stok }}</p>
                    <p class="mb-2">
                        <strong>Status:</strong>
                        <span class="badge {{ $produk->status == 'aktif' ? 'bg-success' : 'bg-secondary' }}">
                            {{ ucfirst($produk->status) }}
                        </span>
                    </p>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('produk.edit', $produk->produk_id) }}"
                           class="btn btn-warning btn-sm rounded-pill">Edit</a>

                        <form action="{{ route('produk.destroy', $produk->produk_id) }}"
                              method="POST"
                              onsubmit="return confirm('Yakin hapus?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm rounded-pill">Hapus</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        @empty
            <p class="text-center">Belum ada produk.</p>
        @endforelse
    </div>

    <!-- PAGINATION -->
    <div class="mt-3 d-flex justify-content-center">
        {{ $produks->links('pagination::bootstrap-5') }}
    </div>

</div>
@endsection
