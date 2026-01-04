@extends('layout.app')

@section('content')
<div class="container mt-4">

    {{-- HEADER SECTION --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-1">Data User</h3>
            <p class="text-muted mb-0">Kelola data pengguna sistem dengan mudah</p>
        </div>

        {{-- TOMBOL TAMBAH USER --}}
        <a href="{{ route('User.create') }}" class="btn btn-primary px-4 py-2 d-flex align-items-center">
            <i class="fas fa-plus me-2"></i>
            Tambah User
        </a>
    </div>

    {{-- SEARCH BAR --}}
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-body">
            <form method="GET" class="row g-3">
                <div class="col-md-10">
                    <div class="input-group">
                        <span class="input-group-text bg-light border-end-0">
                            <i class="fas fa-search text-muted"></i>
                        </span>
                        <input type="text" name="search" class="form-control border-start-0 ps-0"
                               placeholder="Cari user berdasarkan nama atau email..."
                               value="{{ request('search') }}">
                    </div>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-dark w-100 py-2">
                        <i class="fas fa-search me-2"></i>Cari
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- USER CARD GRID --}}
    <div class="row">
        @foreach($users as $u)
            @php
                $foto = $u->foto ? asset('storage/' . $u->foto->file_url) : null;
                $roleColors = [
                    'admin' => 'bg-danger',
                    'user' => 'bg-primary',
                    'editor' => 'bg-success',
                    'manager' => 'bg-warning',
                ];
                $roleColor = $roleColors[$u->role] ?? 'bg-info';
            @endphp

            <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
                <div class="card shadow-sm border-0 h-100 overflow-hidden">

                    {{-- CARD HEADER WITH ROLE BADGE --}}
                    <div class="card-header bg-light py-3 border-0">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="badge {{ $roleColor }} text-white px-3 py-2 rounded-pill">
                                {{ ucfirst($u->role) }}
                            </span>
                            <span class="text-muted small">
                                <i class="far fa-clock me-1"></i>
                                {{ $u->created_at->format('d M') }}
                            </span>
                        </div>
                    </div>

                    {{-- USER AVATAR --}}
                    <div class="text-center py-4 position-relative">
                        <div class="position-absolute top-0 start-50 translate-middle mt-4">
                            <div class="bg-white p-2 rounded-circle shadow-sm">
                                @if($foto)
                                    <img src="{{ $foto }}"
                                         class="rounded-circle border border-3 border-white"
                                         width="90" height="90"
                                         style="object-fit: cover;"
                                         alt="{{ $u->name }}">
                                @else
                                    <div class="rounded-circle d-flex align-items-center justify-content-center bg-light text-muted border border-3 border-white"
                                         style="width: 90px; height: 90px;">
                                        <i class="fas fa-user fa-2x"></i>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    {{-- CARD BODY --}}
                    <div class="card-body pt-5 text-center">
                        <h5 class="card-title fw-bold mb-2">{{ $u->name }}</h5>
                        <p class="text-muted mb-3">
                            <i class="fas fa-envelope me-2"></i>
                            {{ $u->email }}
                        </p>
                    </div>

                    {{-- ACTION BUTTONS --}}
                    <div class="card-footer bg-white border-0 pt-0 pb-4">
                        <div class="d-flex justify-content-center gap-2">
                            {{-- DETAIL BUTTON --}}
                            <button class="btn btn-outline-info btn-sm px-3"
                                    data-bs-toggle="modal"
                                    data-bs-target="#modalDetailUser{{ $u->id }}">
                                <i class="fas fa-eye me-1"></i>Detail
                            </button>

                            {{-- EDIT BUTTON --}}
                            <a href="{{ route('User.edit', $u->id) }}"
                               class="btn btn-outline-warning btn-sm px-3">
                                <i class="fas fa-edit me-1"></i>Edit
                            </a>

                            {{-- DELETE BUTTON --}}
                            <form action="{{ route('User.destroy', $u->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Apakah Anda yakin ingin menghapus user ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm px-3">
                                    <i class="fas fa-trash me-1"></i>Hapus
                                </button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>

            {{-- MODAL DETAIL USER --}}
            <div class="modal fade" id="modalDetailUser{{ $u->id }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content border-0 shadow-lg">

                        {{-- MODAL HEADER --}}
                        <div class="modal-header bg-light">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    @if($foto)
                                        <img src="{{ $foto }}"
                                             class="rounded-circle me-3 border border-3 border-white"
                                             width="50" height="50"
                                             style="object-fit: cover;"
                                             alt="{{ $u->name }}">
                                    @else
                                        <div class="rounded-circle bg-secondary d-flex align-items-center justify-content-center me-3"
                                             style="width: 50px; height: 50px;">
                                            <i class="fas fa-user text-white"></i>
                                        </div>
                                    @endif
                                </div>
                                <div class="flex-grow-1">
                                    <h5 class="modal-title fw-bold mb-0">{{ $u->name }}</h5>
                                    <p class="text-muted small mb-0">{{ $u->email }}</p>
                                </div>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        {{-- MODAL BODY --}}
                        <div class="modal-body">
                            <div class="row">
                                {{-- LEFT SIDE - PROFILE INFO --}}
                                <div class="col-md-6 border-end">
                                    <div class="text-center mb-4">
                                        @if($foto)
                                            <img src="{{ $foto }}"
                                                 class="rounded-circle border border-4 border-light shadow-sm"
                                                 width="120" height="120"
                                                 style="object-fit: cover;"
                                                 alt="{{ $u->name }}">
                                        @else
                                            <div class="rounded-circle bg-light d-flex align-items-center justify-content-center mx-auto mb-3"
                                                 style="width: 120px; height: 120px;">
                                                <i class="fas fa-user fa-3x text-muted"></i>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="d-grid gap-2">
                                        <a href="mailto:{{ $u->email }}" class="btn btn-outline-primary">
                                            <i class="fas fa-envelope me-2"></i>Kirim Email
                                        </a>
                                    </div>
                                </div>

                                {{-- RIGHT SIDE - DETAIL INFO --}}
                                <div class="col-md-6">
                                    <h6 class="fw-bold text-uppercase text-muted mb-3">Informasi User</h6>

                                    <div class="list-group list-group-flush">
                                        <div class="list-group-item border-0 px-0 py-2 d-flex justify-content-between">
                                            <span class="text-muted">Role</span>
                                            <span class="badge {{ $roleColor }} text-white px-3 py-1 rounded-pill">
                                                {{ ucfirst($u->role) }}
                                            </span>
                                        </div>
                                        <div class="list-group-item border-0 px-0 py-2 d-flex justify-content-between">
                                            <span class="text-muted">ID</span>
                                            <span class="fw-semibold">#{{ $u->id }}</span>
                                        </div>
                                        <div class="list-group-item border-0 px-0 py-2 d-flex justify-content-between">
                                            <span class="text-muted">Bergabung</span>
                                            <span class="fw-semibold">{{ $u->created_at->format('d M Y') }}</span>
                                        </div>
                                        <div class="list-group-item border-0 px-0 py-2 d-flex justify-content-between">
                                            <span class="text-muted">Waktu</span>
                                            <span class="fw-semibold">{{ $u->created_at->format('H:i') }}</span>
                                        </div>
                                    </div>

                                    <div class="mt-4">
                                        <h6 class="fw-bold text-uppercase text-muted mb-3">Aksi</h6>
                                        <div class="d-flex gap-2">
                                            <a href="{{ route('User.edit', $u->id) }}"
                                               class="btn btn-warning btn-sm flex-fill">
                                                <i class="fas fa-edit me-1"></i>Edit
                                            </a>
                                            <form action="{{ route('User.destroy', $u->id) }}"
                                                  method="POST"
                                                  class="flex-fill"
                                                  onsubmit="return confirm('Hapus user ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm w-100">
                                                    <i class="fas fa-trash me-1"></i>Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- MODAL FOOTER --}}
                        <div class="modal-footer border-top">
                            <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">
                                <i class="fas fa-times me-2"></i>Tutup
                            </button>
                            <a href="{{ route('User.edit', $u->id) }}" class="btn btn-primary px-4">
                                <i class="fas fa-edit me-2"></i>Edit User
                            </a>
                        </div>

                    </div>
                </div>
            </div>

        @endforeach
    </div>

    {{-- PAGINATION --}}
    @if($users->hasPages())
        <div class="card shadow-sm border-0 mt-4">
            <div class="card-body py-3">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="text-muted">
                        Menampilkan {{ $users->firstItem() }} - {{ $users->lastItem() }} dari {{ $users->total() }} user
                    </div>
                    <div>
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    @endif

</div>

{{-- ADD FONT AWESOME FOR ICONS --}}
@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
@endpush

@endsection
