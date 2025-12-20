@extends('layout.app')

@section('content')
<div class="container">
    <h3>Edit Pesanan</h3>

    <form action="{{ route('pesanan.update', $pesanan->pesanan_id) }}" method="POST">
        @csrf
        @method('PUT')

        <input type="text" name="nomor_pesanan" value="{{ $pesanan->nomor_pesanan }}" class="form-control mb-2" readonly>
        <input type="text" name="warga_id" value="{{ $pesanan->warga_id }}" class="form-control mb-2">
        <input type="number" name="total" value="{{ $pesanan->total }}" class="form-control mb-2">
        <input type="text" name="status" value="{{ $pesanan->status }}" class="form-control mb-2">
        <input type="text" name="alamat_kirim" value="{{ $pesanan->alamat_kirim }}" class="form-control mb-2">
        <input type="text" name="rt" value="{{ $pesanan->rt }}" class="form-control mb-2">
        <input type="text" name="rw" value="{{ $pesanan->rw }}" class="form-control mb-2">
        <input type="text" name="metode_bayar" value="{{ $pesanan->metode_bayar }}" class="form-control mb-2">

        <button class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
