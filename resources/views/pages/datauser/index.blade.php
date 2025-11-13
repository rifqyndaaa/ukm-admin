@extends('layout.app')
@section('content')



    <!-- Enhanced UMKM Data Section -->
<div class="container mt-4">
        <div class="card shadow-lg border-0 rounded-3">
            <div class="card-header card-header-custom text-white text-center py-3">
                <div class="d-flex justify-content-between align-items-center">
                    <h2 class="mb-0"><i class="fas fa-users me-2"></i>Data User</h2>
                    <div class="view-toggle">
                        <button class="view-toggle-btn active" id="cardViewBtn">
                            <i class="fas fa-th-large me-1"></i> Card
                        </button>
                        <button class="view-toggle-btn" id="tableViewBtn">
                            <i class="fas fa-table me-1"></i> Table
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <!-- Stats Overview -->
                <div class="stats-container">
                    <div class="row text-center">
                        <div class="col-md-4 mb-3 mb-md-0">
                            <h3 class="stat-number">{{ count($users) }}</h3>
                            <p class="stat-label">Total Users</p>
                        </div>
                        <div class="col-md-4 mb-3 mb-md-0">
                            <h3 class="stat-number">{{ count($users) }}</h3>
                            <p class="stat-label">Active Users</p>
                        </div>
                        <div class="col-md-4">
                            <h3 class="stat-number">0</h3>
                            <p class="stat-label">New This Month</p>
                        </div>
                    </div>
                </div>

                <!-- Header dengan pencarian dan tombol tambah -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3 class="mb-0">
                    <a href="{{ route('User.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus-circle me-1"></i> Tambah User
                    </a>
                </div>

                <!-- Alert Success -->
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fas fa-check-circle me-2"></i>
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <!-- Search Bar -->
                <div class="search-container mb-4">
                    <div class="input-group">
                        <span class="input-group-text bg-light border-0"><i class="fas fa-search text-muted"></i></span>
                        <input type="text" class="form-control border-0 bg-light" id="searchInput" placeholder="Cari user berdasarkan nama atau email...">
                        <button class="btn btn-outline-secondary" type="button" id="clearSearch">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>

                <!-- Card View -->
                <div class="row" id="userCardsView">
                    @if(count($users) > 0)
                        @foreach($users as $user)
                        <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
                            <div class="card card-user shadow-sm h-100">
                                <div class="user-info text-center">
                                    <div class="user-avatar">
                                        {{ substr($user->name, 0, 1) }}
                                    </div>
                                    <div class="user-id">ID: {{ $user->id }}</div>
                                    <h5 class="user-name">{{ $user->name }}</h5>
                                    <p class="user-email">{{ $user->email }}</p>

                                    <div class="action-buttons">
                                        <a href="{{ route('User.edit', $user->id) }}" class="btn btn-warning btn-action btn-edit">
                                            <i class="fas fa-edit me-1"></i> Edit
                                        </a>
                                        <form action="{{ route('User.destroy', $user->id) }}" method="POST" class="d-inline">
                                            @csrf @method('DELETE')
                                            <button class="btn btn-danger btn-action btn-delete" onclick="return confirm('Hapus user ini?')">
                                                <i class="fas fa-trash me-1"></i> Hapus
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @else
                        <div class="col-12">
                            <div class="empty-state">
                                <i class="fas fa-user-slash"></i>
                                <h4>Belum Ada Data User</h4>
                                <p>Mulai dengan menambahkan user baru</p>
                                <a href="{{ route('User.create') }}" class="btn btn-primary mt-2">
                                    <i class="fas fa-plus me-1"></i> Tambah User Pertama
                                </a>
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Table View (Hidden by Default) -->
                <div id="userTableView" style="display: none;">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead class="table-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th width="180">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td><span class="badge bg-primary">{{ $user->id }}</span></td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <a href="{{ route('User.edit', $user->id) }}" class="btn btn-warning btn-sm">
                                                <i class="fas fa-edit me-1"></i> Edit
                                            </a>
                                            <form action="{{ route('User.destroy', $user->id) }}" method="POST" class="d-inline">
                                                @csrf @method('DELETE')
                                                <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus user ini?')">
                                                    <i class="fas fa-trash me-1"></i> Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>



<!-- Add this to the head section of your HTML -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>



<!-- Custom CSS for additional styling -->
<style>
    .bg-gradient-primary {
        background: linear-gradient(45deg, #3dff77, #3aff86);
    }
    .table-hover tbody tr:hover {
        background-color: rgba(0, 123, 255, 0.1);
        transform: scale(1.01);
        transition: all 0.3s ease;
    }
    .img-thumbnail:hover {
        transform: scale(1.1);
        transition: transform 0.3s ease;
    }
    .btn-group .btn {
        margin-right: 2px;
    }
    .card {
        border-radius: 15px;
        overflow: hidden;
    }
    .card-header {
        border-bottom: none;
    }
</style>

            </tbody>
        </table>
    </div>




    @endsection
