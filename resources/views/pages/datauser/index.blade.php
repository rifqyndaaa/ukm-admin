@extends('layout.app')
@section('content')

<div class="container mt-4">
    <div class="card shadow-lg border-0 rounded-3">
        <div class="card-header bg-primary text-white text-center py-3">
            <h2 class="mb-0"><i class="fas fa-users me-2"></i> Data User</h2>
        </div>

        <div class="card-body">

            <!-- Tombol Tambah -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <a href="{{ route('User.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus-circle me-1"></i> Tambah User
                </a>
            </div>

            <!-- Alert -->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('success') }}
                    <button class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <!-- Search -->
            <form action="{{ route('User.index') }}" method="GET">
                <div class="input-group mb-4">
                    <span class="input-group-text bg-light border-0">
                        <i class="fas fa-search text-muted"></i>
                    </span>

                    <input type="text"
                           name="search"
                           value="{{ $search }}"
                           class="form-control border-0 bg-light"
                           placeholder="Cari user berdasarkan nama / email...">

                    @if($search)
                    <a href="{{ route('User.index') }}" class="btn btn-outline-secondary">
                        <i class="fas fa-times"></i> Reset
                    </a>
                    @endif

                    <button class="btn btn-primary">
                        <i class="fas fa-search"></i> Cari
                    </button>
                </div>
            </form>

            <!-- Card View -->
            <div class="row">
                @forelse($users as $user)
                <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
                    <div class="card shadow-sm h-100 p-3 text-center">
                        <div class="user-avatar bg-secondary text-white rounded-circle mx-auto mb-3"
                             style="width:60px;height:60px;display:flex;align-items:center;justify-content:center;font-size:24px;">
                            {{ strtoupper(substr($user->name, 0, 1)) }}
                        </div>

                        <h5>{{ $user->name }}</h5>
                        <p class="text-muted">{{ $user->email }}</p>

                        <a href="{{ route('User.edit', $user->id) }}" class="btn btn-warning btn-sm mb-1">
                            <i class="fas fa-edit"></i> Edit
                        </a>

                        <form action="{{ route('User.destroy', $user->id) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus user ini?')">
                                <i class="fas fa-trash"></i> Hapus
                            </button>
                        </form>
                    </div>
                </div>
                @empty
                <div class="col-12 text-center">
                    <h4 class="text-muted">Tidak ada data</h4>
                </div>
                @endforelse
            </div>

            <!-- Pagination Bootstrap 5 -->
            <div class="mt-4 d-flex justify-content-center">
                {{ $users->links('pagination::bootstrap-5') }}
            </div>

        </div>
    </div>
</div>

@endsection
