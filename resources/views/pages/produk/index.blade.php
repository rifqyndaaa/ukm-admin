@extends('layout.app')

@section('content')
<div class="container">
    <h2>Daftar Produk</h2>
    <a href="{{ route('produk.create') }}" class="btn btn-primary mb-3">Tambah Produk</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

   <div class="row">
    @forelse ($produks as $produk)
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <h5 class="card-title">{{ $produk->nama_produk }}</h5>
 
                    <p class="card-text mb-1">
                        <strong>UMKM:</strong> {{ $produk->umkm->nama_usaha ?? '-' }}
                    </p>
                    <p class="card-text mb-1">
                        <strong>Harga:</strong> Rp {{ number_format($produk->harga, 0, ',', '.') }}
                    </p>
                    <p class="card-text mb-1">
                        <strong>Stok:</strong> {{ $produk->stok }}
                    </p>
                    <p class="card-text mb-1">
                        <strong>Status:</strong>
                        <span class="badge
                            {{ $produk->status == 'aktif' ? 'bg-success' : 'bg-secondary' }}">
                            {{ ucfirst($produk->status) }}
                        </span>
                    </p>

                    <div class="mt-3 d-flex justify-content-between">
                        <a href="{{ route('produk.edit', $produk->produk_id) }}"
                           class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ route('produk.destroy', $produk->produk_id) }}"
                              method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin hapus?')">Hapus</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    @empty
        <p class="text-center">Belum ada produk.</p>
    @endforelse
</div>

@endsection
