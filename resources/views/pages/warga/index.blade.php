@extends('layout.app')
@section('content')

<div class="container mt-4">
    <div class="card shadow-lg border-0 rounded-3">
        <div class="card-header bg-primary text-white text-center py-3">
            <h2 class="mb-0"><i class="fas fa-users me-2"></i>Data Warga</h2>
        </div>

        <div class="card-body">

            {{-- TOMBOL TAMBAH --}}
            <div class="d-flex justify-content-end mb-3">
                <a href="{{ route('Warga.create') }}" class="btn btn-success">
                    <i class="fas fa-plus me-1"></i> Tambah Warga
                </a>
            </div>

            {{-- ALERT --}}
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            {{-- ================= FILTER & SEARCH ================= --}}
            <form method="GET" action="{{ route('Warga.index') }}" class="row g-2 mb-4">

                <div class="col-md-4">
                    <input type="text"
                        name="search"
                        class="form-control"
                        placeholder="Cari nama warga..."
                        value="{{ request('search') }}">
                </div>

                <div class="col-md-3">
                    <select name="jenis_kelamin" class="form-select">
                        <option value="">-- Jenis Kelamin --</option>
                        @foreach($listJenisKelamin as $jk)
                            <option value="{{ $jk }}" {{ request('jenis_kelamin') == $jk ? 'selected' : '' }}>
                                {{ $jk }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-3">
                    <select name="agama" class="form-select">
                        <option value="">-- Agama --</option>
                        @foreach($listAgama as $agama)
                            <option value="{{ $agama }}" {{ request('agama') == $agama ? 'selected' : '' }}>
                                {{ $agama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-2 d-grid">
                    <button class="btn btn-primary">
                        <i class="fas fa-search"></i> Filter
                    </button>
                </div>

            </form>
            {{-- =================================================== --}}

            {{-- ================= CARD WARGA ================= --}}
            <div class="row">

                @forelse($warga as $w)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card shadow-sm h-100 border-0">
                        <div class="card-body d-flex flex-column">

                            <div class="d-flex justify-content-between mb-2">
                                <h5 class="mb-0">{{ $w->nama }}</h5>
                                <span class="badge bg-primary">{{ $w->no_ktp }}</span>
                            </div>

                            <p class="mb-1"><strong>JK:</strong> {{ $w->jenis_kelamin }}</p>
                            <p class="mb-1"><strong>Agama:</strong> {{ $w->agama }}</p>
                            <p class="mb-3"><strong>Pekerjaan:</strong> {{ $w->pekerjaan }}</p>

                            <div class="mt-auto d-flex justify-content-end gap-2">

                                <button
                                    class="btn btn-info btn-sm btn-detail"
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
                                    <i class="fas fa-eye"></i>
                                </button>

                                <a href="{{ route('Warga.edit', $w->warga_id) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <form action="{{ route('Warga.destroy', $w->warga_id) }}" method="POST">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin hapus data ini?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>

                            </div>

                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12">
                    <div class="alert alert-warning text-center">
                        Data warga tidak ditemukan
                    </div>
                </div>
                @endforelse

            </div>

            {{-- ================= PAGINATION ================= --}}
            <div class="d-flex justify-content-center mt-4">
                {{ $warga->links('pagination::bootstrap-5') }}
            </div>

        </div>
    </div>
</div>

{{-- ================= MODAL DETAIL ================= --}}
<div class="modal fade" id="detailModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Detail Warga</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <table class="table table-bordered">
                    <tr><th>Nama</th><td id="d_nama"></td></tr>
                    <tr><th>No KTP</th><td id="d_ktp"></td></tr>
                    <tr><th>Jenis Kelamin</th><td id="d_jk"></td></tr>
                    <tr><th>Agama</th><td id="d_agama"></td></tr>
                    <tr><th>Alamat</th><td id="d_alamat"></td></tr>
                    <tr><th>Pekerjaan</th><td id="d_pekerjaan"></td></tr>
                    <tr><th>No Telp</th><td id="d_telp"></td></tr>
                    <tr><th>Email</th><td id="d_email"></td></tr>
                </table>
            </div>

        </div>
    </div>
</div>

{{-- SCRIPT MODAL --}}
<script>
document.querySelectorAll('.btn-detail').forEach(btn => {
    btn.addEventListener('click', function () {
        d_nama.textContent = this.dataset.nama;
        d_ktp.textContent = this.dataset.ktp;
        d_jk.textContent = this.dataset.jk;
        d_agama.textContent = this.dataset.agama;
        d_alamat.textContent = this.dataset.alamat;
        d_pekerjaan.textContent = this.dataset.pekerjaan;
        d_telp.textContent = this.dataset.telp;
        d_email.textContent = this.dataset.email;
    });
});
</script>

@endsection
