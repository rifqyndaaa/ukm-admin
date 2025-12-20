@extends('layout.app')

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-0 font-weight-bold text-primary">Tambah Pesanan Baru</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('pesanan.store') }}" method="POST">
                @csrf

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nomor Pesanan *</label>
                            <input type="text" name="nomor_pesanan"
                                   class="form-control @error('nomor_pesanan') is-invalid @enderror"
                                   value="{{ old('nomor_pesanan') }}" required>
                            @error('nomor_pesanan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Warga ID *</label>
                            <input type="number" name="warga_id"
                                   class="form-control @error('warga_id') is-invalid @enderror"
                                   value="{{ old('warga_id') }}" required>
                            @error('warga_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Total (Rp) *</label>
                            <input type="number" name="total" step="0.01"
                                   class="form-control @error('total') is-invalid @enderror"
                                   value="{{ old('total') }}" required>
                            @error('total')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Status *</label>
                            <select name="status" class="form-control @error('status') is-invalid @enderror" required>
                                <option value="">Pilih Status</option>
                                <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="proses" {{ old('status') == 'proses' ? 'selected' : '' }}>Proses</option>
                                <option value="selesai" {{ old('status') == 'selesai' ? 'selected' : '' }}>Selesai</option>
                                <option value="dibatalkan" {{ old('status') == 'dibatalkan' ? 'selected' : '' }}>Dibatalkan</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label>Alamat Kirim *</label>
                            <textarea name="alamat_kirim" rows="3"
                                      class="form-control @error('alamat_kirim') is-invalid @enderror"
                                      required>{{ old('alamat_kirim') }}</textarea>
                            @error('alamat_kirim')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>RT *</label>
                            <input type="text" name="rt" maxlength="5"
                                   class="form-control @error('rt') is-invalid @enderror"
                                   value="{{ old('rt') }}" required>
                            @error('rt')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>RW *</label>
                            <input type="text" name="rw" maxlength="5"
                                   class="form-control @error('rw') is-invalid @enderror"
                                   value="{{ old('rw') }}" required>
                            @error('rw')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Metode Bayar *</label>
                            <select name="metode_bayar" class="form-control @error('metode_bayar') is-invalid @enderror" required>
                                <option value="">Pilih Metode</option>
                                <option value="tunai" {{ old('metode_bayar') == 'tunai' ? 'selected' : '' }}>Tunai</option>
                                <option value="transfer" {{ old('metode_bayar') == 'transfer' ? 'selected' : '' }}>Transfer</option>
                                <option value="kredit" {{ old('metode_bayar') == 'kredit' ? 'selected' : '' }}>Kredit</option>
                            </select>
                            @error('metode_bayar')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                    <a href="{{ route('pesanan.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
