@extends('layout.app')

@section('content')
<div class="container-fluid px-4">

    <div class="row justify-content-center">
        <div class="col-lg-8">

            <div class="card shadow-sm border-0">

                {{-- HEADER --}}
                <div class="card-header bg-white border-bottom">
                    <h5 class="fw-semibold text-primary mb-0">
                        <i class="fas fa-receipt me-2"></i> Tambah Detail Pesanan
                    </h5>
                </div>

                {{-- BODY --}}
                <div class="card-body px-4 py-4">
                    <form action="{{ route('detail-pesanan.store') }}" method="POST">
                        @csrf

                        {{-- PESANAN --}}
                        <div class="mb-4">
                            <label class="form-label fw-semibold text-muted">
                                Pesanan
                            </label>
                            <select name="pesanan_id" class="form-select" required>
                                <option value="">Pilih Pesanan</option>
                                @foreach ($pesanan as $p)
                                    <option value="{{ $p->pesanan_id }}">
                                        Pesanan #{{ $p->pesanan_id }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- PRODUK --}}
                        <div class="mb-4">
                            <label class="form-label fw-semibold text-muted">
                                Produk
                            </label>
                            <select name="produk_id" class="form-select" required>
                                <option value="">Pilih Produk</option>
                                @foreach ($produk as $pr)
                                    <option value="{{ $pr->produk_id }}">
                                        {{ $pr->nama_produk }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- QTY & HARGA --}}
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label class="form-label fw-semibold text-muted">
                                    Jumlah (Qty)
                                </label>
                                <input type="number" name="qty" class="form-control" min="1" required>
                            </div>

                            <div class="col-md-6 mb-4">
                                <label class="form-label fw-semibold text-muted">
                                    Harga Satuan
                                </label>
                                <div class="input-group">
                                    <span class="input-group-text">Rp</span>
                                    <input type="number" name="harga_satuan" class="form-control" required>
                                </div>
                            </div>
                        </div>

                        {{-- BUTTON --}}
                        <div class="d-flex justify-content-between align-items-center pt-3 border-top">
                            <a href="{{ route('detail-pesanan.index') }}" class="btn btn-light">
                                <i class="fas fa-arrow-left me-1"></i> Kembali
                            </a>

                            <button class="btn btn-primary px-4">
                                <i class="fas fa-save me-1"></i> Simpan Data
                            </button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>

</div>
@endsection
