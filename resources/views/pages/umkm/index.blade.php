@extends('layout.app')
@section('content')

<div class="container mt-4">

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-lg border-0 rounded-3">
        <div class="card-header bg-gradient-primary text-white text-center py-3">
            <h2 class="mb-0"><i class="fas fa-store me-2"></i>Data UMKM</h2>
        </div>

        <div class="card-body">

            <!-- Tombol Tambah -->
            <a href="{{ route('Umkm.create') }}" class="btn btn-primary mb-4 rounded-pill px-4 py-2 shadow-sm">
                <i class="fas fa-plus-circle me-2"></i>Tambah UMKM
            </a>

            <!-- 🔍 FILTER & SEARCH -->
            <form method="GET" class="mb-4">
                <div class="row g-2">

                    <div class="col-md-4">
                        <input
                            type="text"
                            name="search"
                            value="{{ request('search') }}"
                            class="form-control rounded-pill"
                            placeholder="Cari nama usaha / alamat...">
                    </div>

                    <div class="col-md-2">
                        <input
                            type="text"
                            name="rt"
                            value="{{ request('rt') }}"
                            class="form-control rounded-pill"
                            placeholder="RT">
                    </div>

                    <div class="col-md-2">
                        <input
                            type="text"
                            name="rw"
                            value="{{ request('rw') }}"
                            class="form-control rounded-pill"
                            placeholder="RW">
                    </div>

                    <div class="col-md-2">
                        <button class="btn btn-primary w-100 rounded-pill">
                            <i class="fas fa-search me-1"></i>Filter
                        </button>
                    </div>

                    <div class="col-md-2">
                        <a href="{{ route('Umkm.index') }}" class="btn btn-secondary w-100 rounded-pill">
                            Reset
                        </a>
                    </div>

                </div>
            </form>

            <!-- CARD VIEW -->
            <div class="row" id="cardView">
                @forelse ($dataUmkm as $item)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card card-umkm shadow-sm border-0 h-100">

                        <!-- Foto usaha -->
                        @if ($item->foto_usaha)
                            <img src="{{ asset('storage/' . $item->foto_usaha) }}" class="card-img-top umkm-image">
                        @else
                            <div class="card-img-top umkm-image bg-light d-flex align-items-center justify-content-center">
                                <i class="fas fa-store fa-3x text-muted"></i>
                            </div>
                        @endif

                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-primary">{{ $item->nama_usaha }}</h5>

                            <p class="card-text mb-1">
                                <small class="text-muted">
                                    <i class="fas fa-map-marker-alt me-1"></i>{{ $item->alamat }}
                                </small>
                            </p>

                            <p class="card-text mb-2">{{ $item->deskripsi }}</p>

                            <div class="mt-auto d-flex justify-content-between align-items-center">
                                <small class="text-muted">
                                    <i class="fas fa-calendar me-1"></i>
                                    {{ $item->created_at->format('d-m-Y') }}
                                </small>

                                <div class="btn-group">
                                    <a href="{{ route('Umkm.edit', $item) }}" class="btn btn-sm btn-warning rounded-pill">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <form action="{{ route('Umkm.destroy', $item) }}" method="POST"
                                          onsubmit="return confirm('Hapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger rounded-pill">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <h4 class="text-muted">Belum ada data UMKM</h4>
                    </div>
                @endforelse
            </div>

            <!-- PAGINATION -->
            <div class="mt-3 d-flex justify-content-center">
                {{ $dataUmkm->links('pagination::bootstrap-5') }}
            </div>

        </div>
    </div>
</div>

@endsection
