<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Buku</title>
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
        <h1 class="mt-4 mb-4 text-center text-primary">Ubah Buku</h1>
        <div class="card">
            <div class="card-header text-center">
                <h5 class="mb-0">Edit Buku</h5>
            </div>
            <div class="card-body">
                <form method="post">
                    <?php
                        $id = $_GET['id'];
                        if(isset($_POST['submit'])) {
                            $id_kategori = $_POST['id_kategori'];
                            $judul = $_POST['judul'];
                            $penulis = $_POST['penulis'];
                            $penerbit = $_POST['penerbit'];
                            $tahun_terbit = $_POST['tahun_terbit'];
                            $deskripsi = $_POST['deskripsi'];
                            $query = mysqli_query($koneksi, "UPDATE buku SET id_kategori='$id_kategori', judul='$judul', penulis='$penulis', penerbit='$penerbit', tahun_terbit='$tahun_terbit', deskripsi='$deskripsi' WHERE id_buku=$id");

                            if($query) {
                                echo '<script>alert("Ubah data buku berhasil.");</script>';
                            } else {
                                echo '<script>alert("Ubah data buku gagal.");</script>';
                            }
                        }
                        $query = mysqli_query($koneksi, "SELECT * FROM buku WHERE id_buku=$id");
                        $data = mysqli_fetch_array($query);
                    ?>
                    <div class="row mb-3">
                        <label for="id_kategori" class="col-md-2 col-form-label">Kategori</label>
                        <div class="col-md-8">
                            <select name="id_kategori" id="id_kategori" class="form-control">
                                <?php
                                    $kat = mysqli_query($koneksi, "SELECT * FROM kategori");
                                    while($kategori = mysqli_fetch_array($kat)) {
                                        ?>
                                        <option <?php if($kategori['id_kategori'] == $data['id_kategori']) echo 'selected'; ?> value="<?php echo $kategori['id_kategori']; ?>"><?php echo $kategori['kategori']; ?></option>
                                        <?php 
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="judul" class="col-md-2 col-form-label">Judul</label>
                        <div class="col-md-8">
                            <input type="text" id="judul" value="<?php echo $data['judul']; ?>" class="form-control" name="judul" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="penulis" class="col-md-2 col-form-label">Penulis</label>
                        <div class="col-md-8">
                            <input type="text" id="penulis" value="<?php echo $data['penulis']; ?>" class="form-control" name="penulis" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="penerbit" class="col-md-2 col-form-label">Penerbit</label>
                        <div class="col-md-8">
                            <input type="text" id="penerbit" value="<?php echo $data['penerbit']; ?>" class="form-control" name="penerbit" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="tahun_terbit" class="col-md-2 col-form-label">Tahun Terbit</label>
                        <div class="col-md-8">
                            <input type="number" id="tahun_terbit" value="<?php echo $data['tahun_terbit']; ?>" class="form-control" name="tahun_terbit" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="deskripsi" class="col-md-2 col-form-label">Deskripsi</label>
                        <div class="col-md-8">
                            <textarea id="deskripsi" name="deskripsi" rows="5" class="form-control"><?php echo $data['deskripsi']; ?></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8 d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary-custom" name="submit" value="submit">Simpan</button>
                            <button type="reset" class="btn btn-secondary-custom">Reset</button>
                            <a href="?page=buku" class="btn btn-danger-custom">Kembali</a>
                        </div>
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
