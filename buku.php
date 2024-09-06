<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f5f7fa;
            font-family: 'Arial', sans-serif;
        }
        .card {
            border-radius: 1rem;
            border: 1px solid #d0d0d0;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .card-header {
            background-color: #4a90e2;
            color: white;
            padding: 1.5rem;
            text-align: center;
            font-size: 1.5rem;
            font-weight: bold;
            border-bottom: 2px solid #357abd;
        }
        .card-body {
            padding: 2rem;
        }
        .btn-primary, .btn-info, .btn-danger {
            border-radius: 0.5rem;
            font-size: 1rem;
            padding: 0.5rem 1rem;
            transition: all 0.3s ease;
        }
        .btn-primary {
            background-color: #4a90e2;
            border: none;
        }
        .btn-primary:hover {
            background-color: #357abd;
        }
        .btn-info {
            background-color: #5bc0de;
            border: none;
        }
        .btn-info:hover {
            background-color: #31b0d5;
        }
        .btn-danger {
            background-color: #dc3545;
            border: none;
        }
        .btn-danger:hover {
            background-color: #c82333;
        }
        table {
            margin-top: 1rem;
            background-color: white;
            border-radius: 0.5rem;
            overflow: hidden;
        }
        table thead {
            background-color: #4a90e2;
            color: white;
        }
        table thead th {
            padding: 1rem;
        }
        table tbody tr {
            transition: background-color 0.3s ease;
        }
        table tbody tr:hover {
            background-color: #e9f2fd;
        }
        table tbody td {
            text-align: center;
            vertical-align: middle;
            padding: 1rem;
        }
        .btn-group a {
            margin: 0 0.25rem;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                Buku
            </div>
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-md-12 text-right">
                        <a href="?page=buku_tambah" class="btn btn-primary">+ Tambah Data</a>
                    </div>
                </div>
                <table class="table table-striped table-bordered" id="dataTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kategori</th>
                            <th>Judul</th>
                            <th>Penulis</th>
                            <th>Penerbit</th>
                            <th>Tahun Terbit</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        $query = mysqli_query($koneksi, "SELECT * FROM buku LEFT JOIN kategori ON buku.id_kategori = kategori.id_kategori");
                        while ($data = mysqli_fetch_array($query)) {
                        ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo htmlspecialchars($data['kategori']); ?></td>
                                <td><?php echo htmlspecialchars($data['judul']); ?></td>
                                <td><?php echo htmlspecialchars($data['penulis']); ?></td>
                                <td><?php echo htmlspecialchars($data['penerbit']); ?></td>
                                <td><?php echo htmlspecialchars($data['tahun_terbit']); ?></td>
                                <td><?php echo htmlspecialchars($data['deskripsi']); ?></td>
                                <td>
                                    <div class="btn-group">
                                        <a href="?page=buku_ubah&&id=<?php echo $data['id_buku']; ?>" class="btn btn-info">Ubah</a>
                                        <a onclick="return confirm('Apakah Anda yakin ingin menghapus data buku ini?');" href="?page=buku_hapus&&id=<?php echo $data['id_buku']; ?>" class="btn btn-danger">Hapus</a>
                                    </div>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
