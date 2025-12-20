@extends('layout.app')

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h4 class="m-0 font-weight-bold text-primary">Data Pesanan</h4>
            <a href="{{ route('pesanan.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Tambah Pesanan
            </a>
        </div>

        <div class="card-body">
            <!-- FILTER FORM -->
            <form method="GET" action="{{ route('pesanan.index') }}" class="mb-4">
                <div class="row">
                    <div class="col-md-3">
                        <input type="text" name="search" class="form-control"
                               placeholder="Cari nomor/alamat..."
                               value="{{ request('search') }}">
                    </div>
                    <div class="col-md-2">
                        <select name="status" class="form-control">
                            <option value="">Semua Status</option>
                            <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="proses" {{ request('status') == 'proses' ? 'selected' : '' }}>Proses</option>
                            <option value="selesai" {{ request('status') == 'selesai' ? 'selected' : '' }}>Selesai</option>
                            <option value="dibatalkan" {{ request('status') == 'dibatalkan' ? 'selected' : '' }}>Dibatalkan</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <select name="metode_bayar" class="form-control">
                            <option value="">Semua Pembayaran</option>
                            <option value="tunai" {{ request('metode_bayar') == 'tunai' ? 'selected' : '' }}>Tunai</option>
                            <option value="transfer" {{ request('metode_bayar') == 'transfer' ? 'selected' : '' }}>Transfer</option>
                            <option value="kredit" {{ request('metode_bayar') == 'kredit' ? 'selected' : '' }}>Kredit</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-search"></i> Filter
                        </button>
                        <a href="{{ route('pesanan.index') }}" class="btn btn-secondary">
                            <i class="fas fa-sync"></i> Reset
                        </a>
                    </div>
                </div>
            </form>

            <!-- ALERT SUCCESS -->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <!-- TABLE -->
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th>No</th>
                            <th>Nomor Pesanan</th>
                            <th>Warga ID</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Alamat</th>
                            <th>RT/RW</th>
                            <th>Pembayaran</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($dataPesanan as $item)
                        <tr>
                            <td>{{ $loop->iteration + ($dataPesanan->currentPage() - 1) * $dataPesanan->perPage() }}</td>
                            <td><strong>{{ $item->nomor_pesanan }}</strong></td>
                            <td>{{ $item->warga_id }}</td>
                            <td>Rp {{ number_format($item->total, 0, ',', '.') }}</td>
                            <td>
                                @php
                                    $badgeColors = [
                                        'pending' => 'warning',
                                        'proses' => 'info',
                                        'selesai' => 'success',
                                        'dibatalkan' => 'danger'
                                    ];
                                @endphp
                                <span class="badge badge-{{ $badgeColors[$item->status] ?? 'secondary' }}">
                                    {{ strtoupper($item->status) }}
                                </span>
                            </td>
                            <td>{{ Str::limit($item->alamat_kirim, 30) }}</td>
                            <td>{{ $item->rt }}/{{ $item->rw }}</td>
                            <td>{{ ucfirst($item->metode_bayar) }}</td>
                            <td>{{ $item->created_at->format('d/m/Y') }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('pesanan.show', $item->pesanan_id) }}"
                                       class="btn btn-info btn-sm" title="Detail">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('pesanan.edit', $item->pesanan_id) }}"
                                       class="btn btn-warning btn-sm" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('pesanan.destroy', $item->pesanan_id) }}"
                                          method="POST"
                                          class="d-inline"
                                          onsubmit="return confirm('Hapus pesanan ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="10" class="text-center">
                                <div class="alert alert-info">
                                    <i class="fas fa-info-circle"></i> Tidak ada data pesanan.
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- PAGINATION -->
            <div class="d-flex justify-content-center mt-4">
                {{ $dataPesanan->links() }}
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
@endsection
