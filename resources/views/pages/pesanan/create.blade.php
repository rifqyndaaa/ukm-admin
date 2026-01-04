@extends('layout.app')

@section('content')
<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header d-flex justify-content-between">
            <h4 class="text-primary">Tambah Pesanan</h4>
            <a href="{{ route('pesanan.index') }}" class="btn btn-secondary">Kembali</a>
        </div>

        <div class="card-body">

            {{-- ERROR --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $err)
                            <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- FORM --}}
            <form action="{{ route('pesanan.store') }}"
                  method="POST"
                  enctype="multipart/form-data">
                @csrf

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label>Nomor Pesanan</label>
                        <input type="text" name="nomor_pesanan"
                               class="form-control"
                               value="{{ old('nomor_pesanan') }}"
                               required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Warga ID</label>
                        <input type="number" name="warga_id"
                               class="form-control"
                               value="{{ old('warga_id') }}"
                               required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Total</label>
                        <input type="number" name="total"
                               class="form-control"
                               value="{{ old('total') }}"
                               required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Status</label>
                        <select name="status" class="form-control" required>
                            <option value="pending">Pending</option>
                            <option value="proses">Proses</option>
                            <option value="selesai">Selesai</option>
                            <option value="dibatalkan">Dibatalkan</option>
                        </select>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label>Alamat Kirim</label>
                        <textarea name="alamat_kirim"
                                  class="form-control"
                                  required>{{ old('alamat_kirim') }}</textarea>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label>RT</label>
                        <input type="text" name="rt"
                               class="form-control"
                               value="{{ old('rt') }}"
                               required>
                    </div>

                    <div class="col-md-3 mb-3">
                        <label>RW</label>
                        <input type="text" name="rw"
                               class="form-control"
                               value="{{ old('rw') }}"
                               required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Metode Bayar</label>
                        <select name="metode_bayar"
                                class="form-control"
                                required>
                            <option value="tunai">Tunai</option>
                            <option value="transfer">Transfer</option>
                            <option value="kredit">Kredit</option>
                        </select>
                    </div>

                    {{-- 🔥 RESI FOTO --}}
                    <div class="col-md-6 mb-3">
                        <label>Bukti Pembayaran (Foto)</label>
                        <input type="file"
                               name="resi"
                               class="form-control"
                               accept="image/*">
                        <small class="text-muted">
                            JPG / PNG (maks 2MB)
                        </small>
                    </div>

                </div>

                <button class="btn btn-primary mt-3">
                    Simpan Pesanan
                </button>
            </form>

        </div>
    </div>
</div>
@endsection
