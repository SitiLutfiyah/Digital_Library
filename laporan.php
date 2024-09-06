<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Peminjaman Buku</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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
        .btn-primary {
            border-radius: 0.5rem;
            font-size: 1rem;
            padding: 0.5rem 1rem;
            transition: all 0.3s ease;
            background-color: #4a90e2;
            border: none;
        }
        .btn-primary:hover {
            background-color: #357abd;
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
                Laporan Peminjaman Buku
            </div>
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-md-12 text-right">
                        <a href="cetak.php" target="_blank" class="btn btn-primary"><i class="fa fa-print"></i> Cetak Data</a>
                    </div>
                </div>
                <table class="table table-striped table-bordered" id="dataTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>User</th>
                            <th>Buku</th>
                            <th>Tanggal Peminjaman</th>
                            <th>Tanggal Pengembalian</th>
                            <th>Status Peminjaman</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        $query = mysqli_query($koneksi, "SELECT * FROM peminjaman 
                                                        LEFT JOIN user ON user.id_user = peminjaman.id_user 
                                                        LEFT JOIN buku ON buku.id_buku = peminjaman.id_buku");
                        while ($data = mysqli_fetch_array($query)) {
                        ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo htmlspecialchars($data['nama']); ?></td>
                                <td><?php echo htmlspecialchars($data['judul']); ?></td>
                                <td><?php echo htmlspecialchars($data['tanggal_peminjaman']); ?></td>
                                <td><?php echo htmlspecialchars($data['tanggal_pengembalian']); ?></td>
                                <td><?php echo htmlspecialchars($data['status_peminjaman']); ?></td>
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
