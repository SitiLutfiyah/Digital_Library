<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.2.0/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f5f5f5;
        }
        .card {
            border-radius: 12px;
            border: 1px solid #ddd;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
        }
        .card-header {
            background-color: #3498db;
            color: #ffffff;
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
        }
        .btn-primary-custom {
            background-color: #3498db;
            border-color: #3498db;
            color: #ffffff;
            border-radius: 8px;
        }
        .btn-primary-custom:hover {
            background-color: #2980b9;
            border-color: #2980b9;
        }
        .btn-secondary-custom {
            background-color: #e67e22;
            border-color: #e67e22;
            color: #ffffff;
            border-radius: 8px;
        }
        .btn-secondary-custom:hover {
            background-color: #d35400;
            border-color: #d35400;
        }
        .btn-danger-custom {
            background-color: #e74c3c;
            border-color: #e74c3c;
            color: #ffffff;
            border-radius: 8px;
        }
        .btn-danger-custom:hover {
            background-color: #c0392b;
            border-color: #c0392b;
        }
        .form-control {
            border-radius: 8px;
            box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
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
        <h1 class="mt-4 mb-4 text-center text-primary">Buku</h1>
        <div class="card">
            <div class="card-header text-center">
                <h5 class="mb-0">Tambah Buku</h5>
            </div>
            <div class="card-body">
                <form method="post">
                    <?php
                        if(isset($_POST['submit'])) {
                            $id_kategori = $_POST['id_kategori'];
                            $judul = $_POST['judul'];
                            $penulis = $_POST['penulis'];
                            $penerbit = $_POST['penerbit'];
                            $tahun_terbit = $_POST['tahun_terbit'];
                            $deskripsi = $_POST['deskripsi'];
                            $query = mysqli_query($koneksi, "INSERT INTO buku(id_kategori,judul,penulis,penerbit,tahun_terbit,deskripsi) values('$id_kategori','$judul','$penulis','$penerbit','$tahun_terbit','$deskripsi')");

                            if($query) {
                                echo '<script>alert("Tambah data buku berhasil.");</script>';
                            } else {
                                echo '<script>alert("Tambah data buku gagal.");</script>';
                            }
                        }
                    ?>
                    <div class="mb-3">
                        <label for="id_kategori" class="form-label">Kategori</label>
                        <select name="id_kategori" id="id_kategori" class="form-control" required>
                            <?php
                                $kat = mysqli_query($koneksi, "SELECT * FROM kategori");
                                while($kategori = mysqli_fetch_array($kat)) {
                                    echo '<option value="'.$kategori['id_kategori'].'">'.$kategori['kategori'].'</option>';
                                }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul</label>
                        <input type="text" id="judul" class="form-control" name="judul" required>
                    </div>
                    <div class="mb-3">
                        <label for="penulis" class="form-label">Penulis</label>
                        <input type="text" id="penulis" class="form-control" name="penulis" required>
                    </div>
                    <div class="mb-3">
                        <label for="penerbit" class="form-label">Penerbit</label>
                        <input type="text" id="penerbit" class="form-control" name="penerbit" required>
                    </div>
                    <div class="mb-3">
                        <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
                        <input type="number" id="tahun_terbit" class="form-control" name="tahun_terbit" required>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" rows="5" class="form-control" required></textarea>
                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary-custom" name="submit" value="submit">Simpan</button>
                        <button type="reset" class="btn btn-secondary-custom">Reset</button>
                        <a href="?page=buku" class="btn btn-danger-custom">Kembali</a>
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
