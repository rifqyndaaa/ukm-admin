@extends('layout.app')

@section('content')
<div class="container mt-4">

    <h3 class="mb-3 d-flex justify-content-between align-items-center">
        Data User

        {{-- TOMBOL KE HALAMAN CREATE --}}
        <a href="{{ route('User.create') }}" class="btn btn-primary">
            + Tambah User
        </a>
    </h3>

    {{-- SEARCH --}}
    <form method="GET" class="mb-4 row">
        <div class="col-md-10">
            <input type="text" name="search" class="form-control"
                   placeholder="Cari user..." value="{{ request('search') }}">
        </div>
        <div class="col-md-2">
            <button class="btn btn-dark w-100">Cari</button>
        </div>
    </form>

    {{-- CARD GRID USER --}}
    <div class="row">
        @foreach($users as $u)
            @php
                $foto = $u->foto ? asset('storage/' . $u->foto->file_url) : null;
            @endphp

            <div class="col-md-3 mb-4">
                <div class="card shadow-sm h-100">

                    {{-- FOTO --}}
                    @if($foto)
                        <img src="{{ $foto }}" class="card-img-top"
                             style="height: 180px; object-fit: cover;">
                    @else
                        <div class="p-3 text-center text-muted bg-light"
                             style="height: 180px; display:flex; align-items:center; justify-content:center;">
                            Tidak ada foto
                        </div>
                    @endif

                    <div class="card-body">
                        <h5 class="card-title">{{ $u->name }}</h5>

                        <p class="mb-1">
                            <strong>Email:</strong> {{ $u->email }}
                        </p>

                        <p class="mb-2">
                            <span class="badge bg-info text-dark px-3 py-2">
                                {{ $u->role ?? '-' }}
                            </span>
                        </p>
                    </div>

                    <div class="card-footer bg-white d-flex justify-content-between">

                        {{-- DETAIL --}}
                        <button class="btn btn-info btn-sm w-50 me-1"
                                data-bs-toggle="modal"
                                data-bs-target="#modalDetailUser{{ $u->id }}">
                            Detail
                        </button>

                        {{-- EDIT --}}
                        <a href="{{ route('User.edit', $u->id) }}"
                           class="btn btn-warning btn-sm w-50 me-1">
                            Edit
                        </a>

                        {{-- HAPUS --}}
                        <form action="{{ route('User.destroy', $u->id) }}"
                              method="POST" class="w-50"
                              onsubmit="return confirm('Hapus User?')">

                            @csrf
                            @method('DELETE')

                            <button class="btn btn-danger btn-sm w-100">Hapus</button>
                        </form>

                    </div>

                </div>
            </div>

            {{-- MODAL DETAIL --}}
            <div class="modal fade" id="modalDetailUser{{ $u->id }}" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title">Detail User</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <div class="modal-body">

                            <div class="text-center mb-3">
                                @if($foto)
                                    <img src="{{ $foto }}" width="150" height="150"
                                         class="rounded-circle"
                                         style="object-fit: cover;">
                                @else
                                    <div class="text-muted">Tidak ada foto</div>
                                @endif
                            </div>

                            <table class="table">
                                <tr><th>Nama</th><td>{{ $u->name }}</td></tr>
                                <tr><th>Email</th><td>{{ $u->email }}</td></tr>
                                <tr><th>Role</th>
                                    <td><span class="badge bg-info text-dark px-3 py-2">{{ $u->role }}</span></td>
                                </tr>
                                <tr><th>Dibuat Pada</th>
                                    <td>{{ $u->created_at->format('d M Y H:i') }}</td>
                                </tr>
                            </table>

                        </div>

                        <div class="modal-footer">
                            <button class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        </div>

                    </div>
                </div>
            </div>

        @endforeach
    </div>

    {{-- PAGINATION --}}
    <div class="mt-3">
        {{ $users->links() }}
    </div>

</div>
@endsection
