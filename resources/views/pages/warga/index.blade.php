@extends('layout.app')
@section('content')

<div class="container mt-4">
    <div class="card shadow-lg border-0 rounded-3">
        <div class="card-header text-white text-center py-3">
            <h2 class="mb-0"><i class="fas fa-users me-2"></i>Data Warga</h2>
        </div>
        <div class="card-body">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="mb-0"></h3>
                <a href="{{ route('Warga.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus me-1"></i> Tambah Warga
                </a>
            </div>

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

                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <h5 class="card-title mb-0">{{ $w->nama }}</h5>
                                <span class="badge bg-primary">{{ $w->no_ktp }}</span>
                            </div>

                            <div class="mb-3">
                                <div class="d-flex"><span class="info-label me-2">Jenis Kelamin:</span><span>{{ $w->jenis_kelamin }}</span></div>
                                <div class="d-flex"><span class="info-label me-2">Agama:</span><span>{{ $w->agama }}</span></div>
                                <div class="d-flex"><span class="info-label me-2">Pekerjaan:</span><span>{{ $w->pekerjaan }}</span></div>
                            </div>

                            <div class="action-buttons mt-auto">
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">

                                    <!-- TOMBOL DETAIL -->
                                    <button
                                        class="btn btn-info btn-sm me-md-2 btn-detail"
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
                                        data-bs-target="#detailModal"
                                    >
                                        <i class="fas fa-eye me-1"></i> Detail
                                    </button>

                                    <a href="{{ route('Warga.edit', $w->warga_id) }}" class="btn btn-warning btn-sm me-md-2">
                                        <i class="fas fa-edit me-1"></i> Edit
                                    </a>

                                    <form action="{{ route('Warga.destroy', $w->warga_id) }}" method="POST" class="d-inline">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus data ini?')">
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

        </div>
    </div>
</div>

<!-- ====================================== -->
<!--   MODAL DETAIL WARGA (WAJIB ADA)       -->
<!-- ====================================== -->
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

<!-- SCRIPT UNTUK ISI DATA MODAL -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    const buttons = document.querySelectorAll('.btn-detail');

    buttons.forEach(btn => {
        btn.addEventListener('click', function () {

            document.getElementById('d_nama').textContent = this.dataset.nama;
            document.getElementById('d_ktp').textContent = this.dataset.ktp;
            document.getElementById('d_jk').textContent = this.dataset.jk;
            document.getElementById('d_agama').textContent = this.dataset.agama;
            document.getElementById('d_alamat').textContent = this.dataset.alamat;
            document.getElementById('d_pekerjaan').textContent = this.dataset.pekerjaan;
            document.getElementById('d_telp').textContent = this.dataset.telp;
            document.getElementById('d_email').textContent = this.dataset.email;

        });
    });
});
</script>

@endsection
