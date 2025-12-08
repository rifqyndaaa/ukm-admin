@extends('layout.app')
@section('content')

<div class="container mt-4">
    <div class="card shadow-lg border-0 rounded-3">

        <!-- Header -->
        <div class="card-header text-white text-center py-3">
            <h2 class="mb-0">
                <i class="fas fa-users me-2"></i>Data Warga
            </h2>
        </div>

        <div class="card-body">

            <!-- ====== FORM SEARCH & FILTER ====== -->
            <form method="GET" action="{{ route('warga.index') }}" class="mb-4">
                <div class="row g-3">

                    <!-- Search -->
                    <div class="col-md-4">
                        <input type="text" name="search" value="{{ request('search') }}"
                               class="form-control" placeholder="Cari nama warga...">
                    </div>

                    <!-- Jenis Kelamin -->
                    <div class="col-md-3">
                        <select name="jenis_kelamin" class="form-select">
                            <option value="">-- Semua Jenis Kelamin --</option>
                            @foreach ($listJenisKelamin as $jk)
                                <option value="{{ $jk }}" {{ request('jenis_kelamin') == $jk ? 'selected' : '' }}>
                                    {{ $jk }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Agama -->
                    <div class="col-md-3">
                        <select name="agama" class="form-select">
                            <option value="">-- Semua Agama --</option>
                            @foreach ($listAgama as $ag)
                                <option value="{{ $ag }}" {{ request('agama') == $ag ? 'selected' : '' }}>
                                    {{ $ag }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Tombol -->
                    <div class="col-md-2 d-grid">
                        <button class="btn btn-success">
                            <i class="fas fa-filter me-1"></i> Filter
                        </button>
                    </div>

                </div>
            </form>
            <!-- ====== END FILTER ====== -->

            <!-- Tambah Warga -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="mb-0"></h3>
                <a href="{{ route('warga.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-1"></i> Tambah Warga
                </a>
            </div>

            <!-- Alert Success -->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <!-- Card View -->
            <div class="row" id="warga-cards">
                @foreach($warga as $w)
                <div class="col-lg-4 col-md-6 mb-4">

                    <div class="card card-warga shadow-sm border-0 h-100">
                        <div class="card-body d-flex flex-column">

                            <!-- Header Card -->
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <h5 class="card-title mb-0">{{ $w->nama }}</h5>
                                <span class="badge bg-primary">{{ $w->no_ktp }}</span>
                            </div>

                            <!-- Detail -->
                            <div class="mb-3">
                                <div><strong>Jenis Kelamin:</strong> {{ $w->jenis_kelamin }}</div>
                                <div><strong>Agama:</strong> {{ $w->agama }}</div>
                                <div><strong>Pekerjaan:</strong> {{ $w->pekerjaan }}</div>
                            </div>

                            <!-- Buttons -->
                            <div class="mt-auto">
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">

                                    <!-- Detail -->
                                    <button class="btn btn-info btn-sm me-md-2 btn-detail"
                                            data-id="{{ $w->warga_id }}"
                                            data-nama="{{ $w->nama }}"
                                            data-ktp="{{ $w->no_ktp }}"
                                            data-jk="{{ $w->jenis_kelamin }}"
                                            data-agama="{{ $w->agama }}"
                                            data-alamat="{{ $w->alamat }}"
                                            data-pekerjaan="{{ $w->pekerjaan }}"
                                            data-telp="{{ $w->telp }}"
                                            data-email="{{ $w->email }}"
                                            data-bs-toggle="modal"
                                            data-bs-target="#detailModal">
                                        <i class="fas fa-eye me-1"></i> Detail
                                    </button>

                                    <!-- Edit -->
                                    <a href="{{ route('warga.edit', $w->warga_id) }}"
                                       class="btn btn-warning btn-sm me-md-2">
                                        <i class="fas fa-edit me-1"></i> Edit
                                    </a>

                                    <!-- Delete -->
                                    <form action="{{ route('warga.destroy', $w->warga_id) }}"
                                          method="POST" class="d-inline">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-danger btn-sm"
                                                onclick="return confirm('Yakin hapus data ini?')">
                                            <i class="fas fa-trash me-1"></i> Hapus
                                        </button>
                                    </form>

                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-4 d-flex justify-content-center">
                {{ $warga->links('pagination::bootstrap-5') }}
            </div>

        </div>
    </div>
</div>

@endsection
