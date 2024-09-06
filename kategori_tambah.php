<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori Buku</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.2.0/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f0f8ff;
        }
        .card {
            border-radius: 12px;
            border: 1px solid #e3e3e3;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            background-color: #ffffff;
        }
        .card-header {
            background-color: #4a90e2;
            color: #ffffff;
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
        }
        .btn-primary-custom {
            background-color: #4a90e2;
            border-color: #4a90e2;
            color: #ffffff;
            border-radius: 8px;
        }
        .btn-primary-custom:hover {
            background-color: #357abd;
            border-color: #357abd;
        }
        .btn-secondary-custom {
            background-color: #f5a623;
            border-color: #f5a623;
            color: #ffffff;
            border-radius: 8px;
        }
        .btn-secondary-custom:hover {
            background-color: #d99122;
            border-color: #d99122;
        }
        .btn-danger-custom {
            background-color: #e94e77;
            border-color: #e94e77;
            color: #ffffff;
            border-radius: 8px;
        }
        .btn-danger-custom:hover {
            background-color: #c94461;
            border-color: #c94461;
        }
        .form-control {
            border-radius: 8px;
            box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .form-group label {
            font-weight: 600;
            color: #333;
        }
        .container {
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mt-4 mb-4 text-center text-primary">Kategori Buku</h1>
        <div class="card">
            <div class="card-header text-center">
                <h5 class="mb-0">Tambah Kategori</h5>
            </div>
            <div class="card-body">
                <form method="post">
                    <?php
                        if(isset($_POST['submit'])) {
                            $kategori = $_POST['kategori'];
                            $query = mysqli_query($koneksi, "INSERT INTO kategori(kategori) values('$kategori')");

                            if($query) {
                                echo '<script>alert("Tambah Data Kategori Berhasil")</script>';
                            } else {
                                echo '<script>alert("Tambah Data Kategori Gagal")</script>';
                            }
                        }
                    ?>
                    <div class="mb-3">
                        <label for="kategori" class="form-label">Nama Kategori</label>
                        <input type="text" id="kategori" class="form-control" name="kategori" required>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary-custom" name="submit" value="submit">Simpan</button>
                        <button type="reset" class="btn btn-secondary-custom">Reset</button>
                        <a href="?page=kategori" class="btn btn-danger-custom">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.2.0/js/bootstrap.min.js"></script>
</body>
</html>
