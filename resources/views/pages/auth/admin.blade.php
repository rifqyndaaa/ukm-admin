
<!-- resources/views/umkm/index.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data UMKM</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container mt-5">
        <h1 class="mb-4 text-center text-primary">📊 Daftar UMKM</h1>

        <div class="card shadow-lg border-0">
            <div class="card-body">
                <table class="table table-striped table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Usaha</th>
                            <th scope="col">Pemilik</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Kategori</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($umkms as $index => $umkm)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $umkm['nama_usaha'] }}</td>
                                <td>{{ $umkm['pemilik'] }}</td>
                                <td>{{ $umkm['alamat'] }}</td>
                                <td>
                                    <span class="badge bg-info text-dark">
                                        {{ $umkm['kategori'] }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
```
