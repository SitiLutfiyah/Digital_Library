<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ulasan Buku</title>
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
        <h1 class="mt-4 mb-4 text-center text-primary">Ulasan Buku</h1>
        <div class="card">
            <div class="card-header text-center">
                <h5 class="mb-0">Edit Ulasan Buku</h5>
            </div>
            <div class="card-body">
                <form method="post">
                    <?php
                        $id = $_GET['id'];
                        if(isset($_POST['submit'])) {
                            $id_buku = $_POST['id_buku'];
                            $id_user = $_SESSION['user']['id_user']; 
                            $ulasan = $_POST['ulasan'];
                            $rating = $_POST['rating'];
                            $query = mysqli_query($koneksi, "UPDATE ulasan SET id_buku='$id_buku', ulasan='$ulasan', rating='$rating' WHERE id_ulasan=$id");

                            if($query) {
                                echo '<script>alert("Ubah data berhasil.");</script>';
                            } else {
                                echo '<script>alert("Ubah data gagal.");</script>';
                            }
                        }
                        $query = mysqli_query($koneksi, "SELECT * FROM ulasan WHERE id_ulasan=$id");
                        $data = mysqli_fetch_array($query);
                    ?>
                    <div class="row mb-3">
                        <label for="id_buku" class="col-md-2 col-form-label">Buku</label>
                        <div class="col-md-8">
                            <select name="id_buku" id="id_buku" class="form-control">
                                <?php
                                    $buk = mysqli_query($koneksi, "SELECT * FROM buku");
                                    while($buku = mysqli_fetch_array($buk)) {
                                        ?>
                                        <option <?php if($data['id_buku'] == $buku['id_buku']) echo 'selected'; ?> value="<?php echo $buku['id_buku']; ?>"><?php echo $buku['judul']; ?></option>
                                        <?php 
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="ulasan" class="col-md-2 col-form-label">Ulasan</label>
                        <div class="col-md-8">
                            <textarea name="ulasan" id="ulasan" rows="5" class="form-control"><?php echo $data['ulasan']; ?></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="rating" class="col-md-2 col-form-label">Rating</label>
                        <div class="col-md-8">
                            <select name="rating" id="rating" class="form-control">
                                <?php
                                    for($i = 1; $i <= 10; $i++) {
                                        ?>
                                        <option <?php if($data['rating'] == $i) echo 'selected'; ?>><?php echo $i; ?></option>
                                        <?php
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8 d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary-custom" name="submit" value="submit">Simpan</button>
                            <button type="reset" class="btn btn-secondary-custom">Reset</button>
                            <a href="?page=ulasan" class="btn btn-danger-custom">Kembali</a>
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
 