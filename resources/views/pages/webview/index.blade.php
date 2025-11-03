@extends('layout.app')
@section('content')
   <div class="container mt-4">
        <h2>Data UMKM</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Enhanced UMKM Data Section -->
        <div class="container mt-4">
            <div class="card shadow-lg border-0 rounded-3">
                <div class="card-header bg-gradient-primary text-white text-center py-3">
                    <h2 class="mb-0"><i class="fas fa-store me-2"></i>Data UMKM</h2>
                </div>
                <div class="card-body">



                    <a href="{{ route('create') }}" class="btn btn-primary mb-4 rounded-pill px-4 py-2 shadow-sm">
                        <i class="fas fa-plus-circle me-2"></i>Tambah UMKM
                    </a>

                    <div class="table-responsive">
                        <table id="umkmTable" class="table table-hover table-striped align-middle">
                            <thead class="table-dark">
                                <tr>
                                    <th>NO</th>
                                    <th>Nama Usaha</th>
                                    <th>Pemilik</th>
                                    <th>Alamat</th>
                                    <th>RT</th>
                                    <th>RW</th>
                                    <th>Kategori</th>
                                    <th>Kontak</th>
                                    <th>Deskripsi</th>
                                    <th>Foto Usaha</th>
                                    <th>Dokumen Izin</th>
                                    <th>Banner Promosi</th>
                                    <th>Tanggal Terbuat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dataUmkm as $item)
                                    <tr>
                                        <td>{{ $item->umkm_id }}</td>
                                        <td><strong class="text-primary">{{ $item->nama_usaha }}</strong></td>
                                        <td>{{ $item->pemilik_warga_id }}</td>
                                        <td>{{ $item->alamat }}</td>
                                        <td>{{ $item->rt }}</td>
                                        <td>{{ $item->rw }}</td>
                                        <td><span class="badge bg-info">{{ $item->kategori }}</span></td>
                                        <td>{{ $item->kontak }}</td>
                                        <td>{{ Str::limit($item->deskripsi, 50) }}</td>
                                        <td>
                                            @if ($item->foto_usaha)
                                                <img src="{{ asset('storage/' . $item->foto_usaha) }}" alt="Foto Usaha"
                                                    width="80" class="img-thumbnail rounded shadow-sm"
                                                    data-bs-toggle="modal" data-bs-target="#imageModal"
                                                    data-src="{{ asset('storage/' . $item->foto_usaha) }}"
                                                    style="cursor: pointer;">
                                            @else
                                                <span class="text-muted"><i class="fas fa-image"></i> Tidak ada</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($item->dokumen_izin)
                                                <a href="{{ asset('storage/' . $item->dokumen_izin) }}" target="_blank"
                                                    class="btn btn-sm btn-outline-info rounded-pill">
                                                    <i class="fas fa-file-alt me-1"></i>Lihat
                                                </a>
                                            @else
                                                <span class="text-muted"><i class="fas fa-file"></i> Tidak ada</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($item->banner_promosi)
                                                <img src="{{ asset('storage/' . $item->banner_promosi) }}"
                                                    alt="Banner" width="80"
                                                    class="img-thumbnail rounded shadow-sm" data-bs-toggle="modal"
                                                    data-bs-target="#imageModal"
                                                    data-src="{{ asset('storage/' . $item->banner_promosi) }}"
                                                    style="cursor: pointer;">
                                            @else
                                                <span class="text-muted"><i class="fas fa-image"></i> Tidak ada</span>
                                            @endif
                                        </td>
                                        <td>{{ $item->created_at->format('d-m-Y') }}</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('umkm.edit', $item) }}"
                                                    class="btn btn-sm btn-warning rounded-pill me-1"
                                                    data-bs-toggle="tooltip" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('umkm.destroy', $item) }}" method="POST"
                                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')"
                                                    style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-danger rounded-pill"
                                                        data-bs-toggle="tooltip" title="Hapus">
                                                        <i class="fas fa-trash"></i>
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
            </div>
        </div>























































        @endsection
