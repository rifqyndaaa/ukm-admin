@extends('layout.app')

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        {{-- HEADER --}}
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h4 class="m-0 font-weight-bold text-primary">Data Pesanan</h4>
            <a href="{{ route('pesanan.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Tambah Pesanan
            </a>
        </div>

        <div class="card-body">

            {{-- FILTER --}}
            <form method="GET" action="{{ route('pesanan.index') }}" class="mb-4">
                <div class="row">
                    <div class="col-md-3 mb-2">
                        <input type="text"
                               name="search"
                               class="form-control"
                               placeholder="Cari nomor / alamat"
                               value="{{ request('search') }}">
                    </div>

                    <div class="col-md-2 mb-2">
                        <select name="status" class="form-control">
                            <option value="">Semua Status</option>
                            <option value="pending" {{ request('status')=='pending'?'selected':'' }}>Pending</option>
                            <option value="proses" {{ request('status')=='proses'?'selected':'' }}>Proses</option>
                            <option value="selesai" {{ request('status')=='selesai'?'selected':'' }}>Selesai</option>
                            <option value="dibatalkan" {{ request('status')=='dibatalkan'?'selected':'' }}>Dibatalkan</option>
                        </select>
                    </div>

                    <div class="col-md-2 mb-2">
                        <select name="metode_bayar" class="form-control">
                            <option value="">Semua Pembayaran</option>
                            <option value="tunai" {{ request('metode_bayar')=='tunai'?'selected':'' }}>Tunai</option>
                            <option value="transfer" {{ request('metode_bayar')=='transfer'?'selected':'' }}>Transfer</option>
                            <option value="kredit" {{ request('metode_bayar')=='kredit'?'selected':'' }}>Kredit</option>
                        </select>
                    </div>

                    <div class="col-md-3 mb-2">
                        <button class="btn btn-primary">
                            <i class="fas fa-search"></i> Filter
                        </button>
                        <a href="{{ route('pesanan.index') }}" class="btn btn-secondary">
                            Reset
                        </a>
                    </div>
                </div>
            </form>

            {{-- ALERT --}}
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('success') }}
                    <button class="close" data-dismiss="alert">&times;</button>
                </div>
            @endif

            {{-- CARD VIEW --}}
            <div class="row">
                @forelse($dataPesanan as $item)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card shadow-sm border-left-primary h-100">
                        <div class="card-header d-flex justify-content-between align-items-center bg-light py-2">
                            <h6 class="m-0 font-weight-bold text-primary">
                                #{{ $item->nomor_pesanan }}
                            </h6>
                            <div>
                                @php
                                    $badge = [
                                        'pending'=>'warning',
                                        'proses'=>'info',
                                        'selesai'=>'success',
                                        'dibatalkan'=>'danger'
                                    ];
                                @endphp
                                <span class="badge badge-{{ $badge[$item->status] ?? 'secondary' }} badge-pill">
                                    {{ strtoupper($item->status) }}
                                </span>
                            </div>
                        </div>

                        <div class="card-body">
                            {{-- Informasi Warga --}}
                            <div class="mb-3">
                                <div class="d-flex align-items-center mb-2">
                                    <i class="fas fa-user text-primary mr-2"></i>
                                    <strong>Warga:</strong>
                                </div>
                                <p class="mb-0 ml-4">{{ $item->warga_id }}</p>
                            </div>

                            {{-- Informasi Alamat --}}
                            <div class="mb-3">
                                <div class="d-flex align-items-center mb-2">
                                    <i class="fas fa-map-marker-alt text-primary mr-2"></i>
                                    <strong>Alamat:</strong>
                                </div>
                                <p class="mb-0 ml-4">
                                    {{ Str::limit($item->alamat_kirim, 50) }}<br>
                                    RT/RW: {{ $item->rt }}/{{ $item->rw }}
                                </p>
                            </div>

                            {{-- Informasi Pembayaran --}}
                            <div class="mb-3">
                                <div class="d-flex align-items-center mb-2">
                                    <i class="fas fa-credit-card text-primary mr-2"></i>
                                    <strong>Pembayaran:</strong>
                                </div>
                                <p class="mb-0 ml-4">
                                    {{ ucfirst($item->metode_bayar) }}
                                    <br>
                                    <span class="font-weight-bold text-dark">
                                        Rp {{ number_format($item->total,0,',','.') }}
                                    </span>
                                </p>
                            </div>

                            {{-- Informasi Resi --}}
                            <div class="mb-3">
                                <div class="d-flex align-items-center mb-2">
                                    <i class="fas fa-receipt text-primary mr-2"></i>
                                    <strong>Status Resi:</strong>
                                </div>
                                <p class="mb-0 ml-4">
                                    @if($item->media->count())
                                        <span class="text-success">
                                            <i class="fas fa-check-circle"></i> Sudah upload resi
                                        </span>
                                    @else
                                        <span class="text-danger">
                                            <i class="fas fa-times-circle"></i> Belum upload resi
                                        </span>
                                    @endif
                                </p>
                            </div>

                            {{-- Tanggal --}}
                            <div class="mb-3">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-calendar text-primary mr-2"></i>
                                    <small class="text-muted">
                                        {{ $item->created_at->format('d/m/Y H:i') }}
                                    </small>
                                </div>
                            </div>
                        </div>

                        {{-- ACTION BUTTONS --}}
                        <div class="card-footer bg-transparent border-top-0 pt-0">
                            <div class="d-flex justify-content-between">
                                {{-- Tombol Lihat Detail Modal --}}
                                <button type="button"
                                        class="btn btn-info btn-sm"
                                        data-toggle="modal"
                                        data-target="#detailModal{{ $item->pesanan_id }}">
                                    <i class="fas fa-eye"></i> Detail
                                </button>

                                <div class="btn-group">
                                    <a href="{{ route('pesanan.edit', $item->pesanan_id) }}"
                                       class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <form action="{{ route('pesanan.destroy', $item->pesanan_id) }}"
                                          method="POST"
                                          onsubmit="return confirm('Hapus pesanan ini?')"
                                          class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12">
                    <div class="alert alert-info text-center py-5">
                        <i class="fas fa-inbox fa-3x mb-3"></i>
                        <h4>Tidak ada data pesanan</h4>
                        <p>Silahkan tambah pesanan baru untuk memulai</p>
                    </div>
                </div>
                @endforelse
            </div>

            {{-- PAGINATION --}}
            <div class="d-flex justify-content-center mt-4">
                {{ $dataPesanan->links('pagination::bootstrap-5') }}
            </div>

        </div>
    </div>
</div>

{{-- MODAL DETAIL --}}
@foreach($dataPesanan as $item)
<div class="modal fade" id="detailModal{{ $item->pesanan_id }}" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel{{ $item->pesanan_id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="detailModalLabel{{ $item->pesanan_id }}">
                    <i class="fas fa-info-circle"></i> Detail Pesanan #{{ $item->nomor_pesanan }}
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="font-weight-bold text-primary">Informasi Pesanan</h6>
                        <table class="table table-sm table-borderless">
                            <tr>
                                <td width="40%"><strong>Nomor Pesanan</strong></td>
                                <td>: {{ $item->nomor_pesanan }}</td>
                            </tr>
                            <tr>
                                <td><strong>Tanggal</strong></td>
                                <td>: {{ $item->created_at->format('d/m/Y H:i') }}</td>
                            </tr>
                            <tr>
                                <td><strong>Total</strong></td>
                                <td>: Rp {{ number_format($item->total,0,',','.') }}</td>
                            </tr>
                            <tr>
                                <td><strong>Status</strong></td>
                                <td>
                                    @php
                                        $badge = [
                                            'pending'=>'warning',
                                            'proses'=>'info',
                                            'selesai'=>'success',
                                            'dibatalkan'=>'danger'
                                        ];
                                    @endphp
                                    <span class="badge badge-{{ $badge[$item->status] ?? 'secondary' }}">
                                        {{ strtoupper($item->status) }}
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Metode Bayar</strong></td>
                                <td>: {{ ucfirst($item->metode_bayar) }}</td>
                            </tr>
                        </table>
                    </div>

                    <div class="col-md-6">
                        <h6 class="font-weight-bold text-primary">Informasi Pengiriman</h6>
                        <table class="table table-sm table-borderless">
                            <tr>
                                <td width="40%"><strong>Nama Warga</strong></td>
                                <td>: {{ $item->warga_id }}</td>
                            </tr>
                            <tr>
                                <td><strong>Alamat</strong></td>
                                <td>: {{ $item->alamat_kirim }}</td>
                            </tr>
                            <tr>
                                <td><strong>RT/RW</strong></td>
                                <td>: {{ $item->rt }}/{{ $item->rw }}</td>
                            </tr>
                            <tr>
                                <td><strong>Status Resi</strong></td>
                                <td>
                                    @if($item->media->count())
                                        <span class="text-success"><i class="fas fa-check-circle"></i> Sudah upload resi</span>
                                    @else
                                        <span class="text-danger"><i class="fas fa-times-circle"></i> Belum upload resi</span>
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>

                {{-- Tampilkan detail item pesanan jika ada --}}
                @if(isset($item->items) && $item->items->count())
                <div class="mt-4">
                    <h6 class="font-weight-bold text-primary">Item Pesanan</h6>
                    <div class="table-responsive">
                        <table class="table table-sm table-bordered">
                            <thead class="bg-light">
                                <tr>
                                    <th>Produk</th>
                                    <th class="text-center">Qty</th>
                                    <th class="text-right">Harga</th>
                                    <th class="text-right">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($item->items as $detail)
                                <tr>
                                    <td>{{ $detail->nama_produk ?? 'Produk' }}</td>
                                    <td class="text-center">{{ $detail->qty }}</td>
                                    <td class="text-right">Rp {{ number_format($detail->harga,0,',','.') }}</td>
                                    <td class="text-right">Rp {{ number_format($detail->subtotal,0,',','.') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot class="bg-light">
                                <tr>
                                    <td colspan="3" class="text-right"><strong>Total</strong></td>
                                    <td class="text-right font-weight-bold">Rp {{ number_format($item->total,0,',','.') }}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                @endif

                {{-- Tampilkan gambar resi jika ada --}}
                @if($item->media->count())
                <div class="mt-4">
                    <h6 class="font-weight-bold text-primary">Gambar Resi</h6>
                    <div class="row">
                        @foreach($item->media as $media)
                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <img src="{{ asset('storage/' . $media->path) }}"
                                     class="card-img-top"
                                     alt="Resi {{ $item->nomor_pesanan }}"
                                     style="height: 150px; object-fit: cover;">
                                <div class="card-body p-2">
                                    <small class="text-muted">{{ $media->created_at->format('d/m/Y') }}</small>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    <i class="fas fa-times"></i> Tutup
                </button>
                <a href="{{ route('pesanan.edit', $item->pesanan_id) }}" class="btn btn-primary">
                    <i class="fas fa-edit"></i> Edit Pesanan
                </a>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<style>
    .card {
        transition: transform 0.2s ease-in-out;
        border-radius: 10px;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }

    .card-header {
        border-radius: 10px 10px 0 0 !important;
    }

    .border-left-primary {
        border-left: 4px solid #4e73df !important;
    }

    .badge-pill {
        font-size: 0.8em;
        padding: 5px 12px;
    }
</style>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        // Animasi hover pada card
        $('.card').hover(
            function() {
                $(this).addClass('shadow-lg');
            },
            function() {
                $(this).removeClass('shadow-lg');
            }
        );
    });
</script>
@endsection
