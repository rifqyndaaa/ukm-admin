@extends('layout.app')

@section('content')
<h3>Edit User</h3>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $err)
                <li>{{ $err }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('User.update', $user->id) }}" method="POST" enctype="multipart/form-data">
    @csrf @method('PUT')

    {{-- Nama --}}
    <div class="mb-3">
        <label>Nama</label>
        <input type="text" name="name" class="form-control"
               value="{{ old('name', $user->name) }}">
    </div>

    {{-- Email --}}
    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control"
               value="{{ old('email', $user->email) }}">
    </div>

    {{-- Password --}}
    <div class="mb-3">
        <label>Password (kosongkan jika tidak diganti)</label>
        <input type="password" name="password" class="form-control">
    </div>

    {{-- ROLE (BARU) --}}
    <div class="mb-3">
        <label>Role</label>
        <select name="role" class="form-control">
            <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
            <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
        </select>
    </div>

    {{-- Foto --}}
    <div class="mb-3">
        <label>Foto</label><br>

        @if($user->foto)
            <img src="{{ asset('storage/' . $user->foto->file_url) }}" width="80" class="mb-2">
        @endif

        <input type="file" name="foto" class="form-control">
    </div>

    <button class="btn btn-primary">Update</button>
</form>
@endsection
