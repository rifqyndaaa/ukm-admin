@extends('layout.app')
@section('content')

<div class="container mt-4">

    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4>{{ isset($user) ? 'Edit User' : 'Tambah User' }}</h4>
        </div>

        <div class="card-body">

            <form action="{{ isset($user) ? route('User.update', $user->id) : route('User.store') }}"
                  method="POST" enctype="multipart/form-data">
                @csrf
                @if(isset($user)) @method('PUT') @endif

                <div class="mb-3">
                    <label>Nama</label>
                    <input type="text" name="name" class="form-control"
                           value="{{ $user->name ?? old('name') }}" required>
                </div>

                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control"
                           value="{{ $user->email ?? old('email') }}" required>
                </div>

                <div class="mb-3">
                    <label>Password (kosongkan jika tidak ubah)</label>
                    <input type="password" name="password" class="form-control">
                </div>

                <div class="mb-3">
                    <label>Foto Profil</label><br>

                    @if(isset($user) && $user->foto)
                        <img src="{{ asset('storage/' . $user->foto->file_url) }}"
                             style="width:80px;height:80px;object-fit:cover;" class="rounded mb-2">
                    @endif

                    <input type="file" name="foto" class="form-control">
                </div>

                <button class="btn btn-primary">
                    {{ isset($user) ? 'Update' : 'Simpan' }}
                </button>

                <a href="{{ route('User.index') }}" class="btn btn-secondary">Kembali</a>

            </form>

        </div>
    </div>

</div>

@endsection
