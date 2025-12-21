@extends('layout.app')

@section('content')
<div class="container">
    <h3 class="mb-3">Edit Detail Pesanan</h3>

    <form action="{{ route('detail-pesanan.update', $detail->detail_id) }}"
          method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Qty</label>
            <input type="number" name="qty"
                   value="{{ $detail->qty }}"
                   class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Harga Satuan</label>
            <input type="number" name="harga_satuan"
                   value="{{ $detail->harga_satuan }}"
                   class="form-control" required>
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="{{ route('detail-pesanan.index') }}" class="btn btn-secondary">
            Kembali
        </a>
    </form>
</div>
@endsection
