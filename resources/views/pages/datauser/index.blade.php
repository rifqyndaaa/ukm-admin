@extends('layout.app')

@section('content')
<div class="container mt-4">

    <h3 class="mb-3">Data User</h3>

    {{-- SEARCH --}}
    <form method="GET" class="mb-3 d-flex" style="gap:10px;">
        <input type="text" name="search" class="form-control" placeholder="Cari user..."
               value="{{ request('search') }}">
        <button class="btn btn-primary">Cari</button>
    </form>

    <a href="{{ route('User.create') }}" class="btn btn-success mb-3">+ Tambah User</a>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th width="80">Foto</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th> {{-- ⬅ Tambahan --}}
                <th width="180">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $u)
            <tr>
                <td>
                    @if($u->foto)
                        <img src="{{ asset('storage/' . $u->foto->file_url) }}" width="60" class="rounded">
                    @else
                        <span class="text-muted">Tidak ada</span>
                    @endif
                </td>

                <td>{{ $u->name }}</td>
                <td>{{ $u->email }}</td>

                <td>
                    <span class="badge bg-info text-dark px-3 py-2">
                        {{ $u->role ?? '-' }}
                    </span>
                </td>

                <td>
                    <a href="{{ route('User.edit', $u->id) }}"
                       class="btn btn-sm btn-warning">Edit</a>

                    <form action="{{ route('User.destroy', $u->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Hapus user?')"
                                class="btn btn-sm btn-danger">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">Tidak ada data.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    {{ $users->links() }}
</div>
@endsection
