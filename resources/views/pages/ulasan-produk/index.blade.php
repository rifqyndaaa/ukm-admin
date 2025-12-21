@extends('layout.app')

@section('content')
<div class="container">
    <h3 class="mb-3">Data Ulasan Produk</h3>

    <a href="{{ route('ulasan-produk.create') }}" class="btn btn-primary mb-3">
        + Tambah Ulasan
    </a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Filter & Search -->
    <form method="GET" class="row mb-3">
        <div class="col-md-4 mb-2">
            <select name="produk_id" class="form-select" onchange="this.form.submit()">
                <option value="">-- Semua Produk --</option>
                @foreach($produk as $p)
                    <option value="{{ $p->produk_id }}" {{ request('produk_id') == $p->produk_id ? 'selected' : '' }}>
                        {{ $p->nama_produk }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-4 mb-2">
            <input type="text" name="search" class="form-control" placeholder="Cari komentar atau pelanggan" value="{{ request('search') }}">
        </div>
        <div class="col-md-2 mb-2">
            <button class="btn btn-secondary w-100">Filter</button>
        </div>
        <div class="col-md-2 mb-2">
            <a href="{{ route('ulasan-produk.index') }}" class="btn btn-outline-danger w-100">Reset</a>
        </div>
    </form>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Produk</th>
                <th>Pelanggan</th>
                <th>Rating</th>
                <th>Komentar</th>
                <th width="160">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($ulasan as $item)
            <tr>
                <td>{{ $loop->iteration + ($ulasan->currentPage()-1) * $ulasan->perPage() }}</td>
                <td>{{ $item->produk->nama_produk }}</td>
                <td>{{ $item->warga->nama ?? '-' }}</td>
                <td><span class="badge bg-success">{{ $item->rating }} / 5</span></td>
                <td>{{ $item->komentar ?? '-' }}</td>
                <td>
                    <a href="{{ route('ulasan-produk.edit',$item->ulasan_id) }}" class="btn btn-warning btn-sm mb-1">Edit</a>

                    <form action="{{ route('ulasan-produk.destroy',$item->ulasan_id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Yakin hapus data ini?')" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center">Data belum ada</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Pagination -->
    <div class="d-flex justify-content-end mt-3">
        {{ $ulasan->withQueryString()->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection
