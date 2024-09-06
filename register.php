<?php
include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Register Ke Perpustakaan Digital</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <style>
        html, body {
            height: 100%;
            margin: 0;
        }
        body {
            background: linear-gradient(135deg, #0047ab, #6fa3ef);
            color: #fff;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            overflow-x: hidden; /* Prevent horizontal scroll */
        }
        .card {
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease;
        }
        .card:hover {
            transform: scale(1.02);
        }
        .card-header {
            background: linear-gradient(135deg, #0047ab, #6fa3ef);
            color: #fff;
            padding: 2rem;
            text-align: center;
            border-bottom: none;
            font-size: 1.5rem;
            font-weight: 600;
        }
        .card-body {
            background: #ffffff;
            color: #0047ab;
            padding: 2rem;
        }
        .form-group label {
            font-weight: 600;
            color: #0047ab;
        }
        .form-control {
            border-radius: 10px;
            border: 1px solid #ddd;
            padding: 1rem;
            box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }
        .form-control:focus {
            border-color: #0047ab;
            box-shadow: 0 0 0 0.2rem rgba(0, 71, 171, 0.25);
        }
        .btn-primary {
            background-color: #0047ab;
            border-color: #0047ab;
            border-radius: 10px;
            padding: 0.75rem 1.25rem;
            transition: background-color 0.3s ease, border-color 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #00388d;
            border-color: #00388d;
        }
        .btn-danger {
            background-color: #ff4d4d;
            border-color: #ff4d4d;
            border-radius: 10px;
            padding: 0.75rem 1.25rem;
            transition: background-color 0.3s ease, border-color 0.3s ease;
        }
        .btn-danger:hover {
            background-color: #e63946;
            border-color: #e63946;
        }
        .card-footer {
            background: #ffffff;
            color: #0047ab;
            padding: 1rem;
            text-align: center;
            font-size: 0.875rem;
        }
        .card-footer .small {
            font-style: italic;
        }
    </style>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card shadow-lg border-0" style="width: 100%; max-width: 400px;">
            <div class="card-header">
                Register Perpustakaan Digital
            </div>
            <div class="card-body">
                <?php
                    if (isset($_POST['register'])) {
                        $nama = $_POST['nama'];
                        $email = $_POST['email'];
                        $alamat = $_POST['alamat'];
                        $no_telepon = $_POST['no_telepon'];
                        $username = $_POST['username'];
                        $level = $_POST['level'];
                        $password = md5($_POST['password']);

                        $insert = mysqli_query($koneksi, "INSERT INTO user(nama, email, alamat, no_telepon, username, password, level) VALUES('$nama', '$email', '$alamat', '$no_telepon', '$username', '$password', '$level')");

                        if ($insert) {
                            echo '<script>
                                    alert("Selamat, register berhasil. Silahkan Login");
                                    window.location.href = "login.php";
                                  </script>';
                        } else {
                            echo '<script>
                                    alert("Register gagal, silahkan ulangi kembali.");
                                  </script>';
                        }
                    }
                ?>
                <form method="post">
                    <div class="form-group mb-4">
                        <label class="form-label">Nama Lengkap</label>
                        <input class="form-control" type="text" required name="nama" placeholder="Masukkan Nama Lengkap" />
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label">Email</label>
                        <input class="form-control" type="email" required name="email" placeholder="Masukkan Email" />
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label">Username</label>
                        <input class="form-control" type="text" required name="username" placeholder="Masukkan Username" />
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label" for="inputPassword">Password</label>
                        <input class="form-control" id="inputPassword" required name="password" type="password" placeholder="Password" />
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label">No. Telepon</label>
                        <input class="form-control" type="text" required name="no_telepon" placeholder="Masukkan No. Telepon" />
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label">Alamat</label>
                        <textarea name="alamat" rows="5" required class="form-control" placeholder="Masukkan Alamat"></textarea>
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label">Level</label>
                        <select name="level" required class="form-select">
                            <option value="peminjam">Peminjam</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                        <button class="btn btn-primary" type="submit" name="register" value="register">Register</button>
                        <a class="btn btn-danger" href="login.php">Login</a>
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <div class="small">
                    SITI LUTFIYAH || XII PPLG 1
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/scripts.js"></script>
</body>
</html>
