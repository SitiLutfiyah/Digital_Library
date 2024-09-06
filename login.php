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
    <title>Login Ke Perpustakaan Digital</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <style>
        body {
            background: linear-gradient(135deg, #0047ab, #6fa3ef);
            color: #fff;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
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
        .btn-secondary {
            background-color: #6fa3ef;
            border-color: #6fa3ef;
            border-radius: 10px;
            padding: 0.75rem 1.25rem;
            transition: background-color 0.3s ease, border-color 0.3s ease;
        }
        .btn-secondary:hover {
            background-color: #5a8ce1;
            border-color: #5a8ce1;
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
                Login Perpustakaan Digital
            </div>
            <div class="card-body">
                <div id="alert-container"></div>
                <?php
                    if (isset($_POST['login'])) {
                        $username = $_POST['username'];
                        $password = md5($_POST['password']);

                        $data = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND password='$password'");
                        $cek = mysqli_num_rows($data);
                        if ($cek > 0) {
                            $_SESSION['user'] = mysqli_fetch_array($data);
                            echo '<script>
                                    document.getElementById("alert-container").innerHTML = \'<div class="alert alert-success alert-custom" role="alert">Selamat datang, Login Berhasil</div>\';
                                    setTimeout(function() { window.location.href = "index.php"; }, 1000);
                                  </script>';
                        } else {
                            echo '<script>
                                    document.getElementById("alert-container").innerHTML = \'<div class="alert alert-danger alert-custom" role="alert">Maaf, Username/Password salah</div>\';
                                  </script>';
                        }
                    }
                ?>
                <form method="post">
                    <div class="form-group mb-4">
                        <label class="form-label" for="inputEmail">Username</label>
                        <input class="form-control" id="inputEmail" type="text" name="username" placeholder="Enter username" required />
                    </div>
                    <div class="form-group mb-4">
                        <label class="form-label" for="inputPassword">Password</label>
                        <input class="form-control" id="inputPassword" name="password" type="password" placeholder="Password" required />
                    </div>
                    <div class="d-flex justify-content-between mt-4">
                        <button class="btn btn-primary" type="submit" name="login" value="login">Login</button>
                        <a class="btn btn-secondary" href="register.php">Register</a>
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
