@extends('layout.app')

@section('content')
<div class="container-fluid">

    <div class="card shadow mb-4">
        <div class="card-header d-flex justify-content-between">
            <h4 class="text-primary">Edit Pesanan</h4>
            <a href="{{ route('pesanan.index') }}" class="btn btn-secondary">Kembali</a>
        </div>

        <div class="card-body">

            {{-- ERROR VALIDATION --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $err)
                            <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- FORM EDIT --}}
            <form action="{{ route('pesanan.update', $pesanan->pesanan_id) }}"
                  method="POST"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">

                    {{-- NOMOR PESANAN --}}
                    <div class="col-md-6 mb-3">
                        <label>Nomor Pesanan</label>
                        <input type="text" name="nomor_pesanan"
                               class="form-control"
                               value="{{ old('nomor_pesanan', $pesanan->nomor_pesanan) }}"
                               required>
                    </div>

                    {{-- WARGA ID --}}
                    <div class="col-md-6 mb-3">
                        <label>Warga ID</label>
                        <input type="number" name="warga_id"
                               class="form-control"
                               value="{{ old('warga_id', $pesanan->warga_id) }}"
                               required>
                    </div>

                    {{-- TOTAL --}}
                    <div class="col-md-6 mb-3">
                        <label>Total</label>
                        <input type="number" name="total"
                               class="form-control"
                               value="{{ old('total', $pesanan->total) }}"
                               required>
                    </div>

                    {{-- STATUS --}}
                    <div class="col-md-6 mb-3">
                        <label>Status</label>
                        <select name="status" class="form-control" required>
                            <option value="pending" {{ $pesanan->status=='pending'?'selected':'' }}>Pending</option>
                            <option value="proses" {{ $pesanan->status=='proses'?'selected':'' }}>Proses</option>
                            <option value="selesai" {{ $pesanan->status=='selesai'?'selected':'' }}>Selesai</option>
                            <option value="dibatalkan" {{ $pesanan->status=='dibatalkan'?'selected':'' }}>Dibatalkan</option>
                        </select>
                    </div>

                    {{-- ALAMAT --}}
                    <div class="col-md-12 mb-3">
                        <label>Alamat Kirim</label>
                        <textarea name="alamat_kirim"
                                  class="form-control"
                                  required>{{ old('alamat_kirim', $pesanan->alamat_kirim) }}</textarea>
                    </div>

                    {{-- RT --}}
                    <div class="col-md-3 mb-3">
                        <label>RT</label>
                        <input type="text" name="rt"
                               class="form-control"
                               value="{{ old('rt', $pesanan->rt) }}"
                               required>
                    </div>

                    {{-- RW --}}
                    <div class="col-md-3 mb-3">
                        <label>RW</label>
                        <input type="text" name="rw"
                               class="form-control"
                               value="{{ old('rw', $pesanan->rw) }}"
                               required>
                    </div>

                    {{-- METODE BAYAR --}}
                    <div class="col-md-6 mb-3">
                        <label>Metode Bayar</label>
                        <select name="metode_bayar" class="form-control" required>
                            <option value="tunai" {{ $pesanan->metode_bayar=='tunai'?'selected':'' }}>Tunai</option>
                            <option value="transfer" {{ $pesanan->metode_bayar=='transfer'?'selected':'' }}>Transfer</option>
                            <option value="kredit" {{ $pesanan->metode_bayar=='kredit'?'selected':'' }}>Kredit</option>
                        </select>
                    </div>

                    {{-- RESI LAMA --}}
                    <div class="col-md-12 mb-3">
                        <label>Resi Saat Ini</label>
                        <div class="d-flex flex-wrap gap-2">
                            @if($pesanan->media->count())
                                @foreach($pesanan->media as $resi)
                                    <img src="{{ asset('storage/'.$resi->file_url) }}"
                                         class="img-thumbnail"
                                         style="width:80px;height:80px;"
                                         title="{{ $resi->caption }}">
                                @endforeach
                            @else
                                <span class="text-danger">Belum ada resi</span>
                            @endif
                        </div>
                    </div>

                    {{-- GANTI RESI --}}
                    <div class="col-md-6 mb-3">
                        <label>Ganti Resi (Opsional)</label>
                        <input type="file" name="resi" class="form-control" accept="image/*">
                        <small class="text-muted">JPG/PNG maksimal 2MB</small>
                    </div>

                </div>

                <button class="btn btn-primary mt-3">Simpan Perubahan</button>
            </form>

        </div>
    </div>
</div>
@endsection
