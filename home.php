<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #e9ecef;
            font-family: 'Arial', sans-serif;
        }
        .card {
            border: none;
            border-radius: 16px;
            overflow: hidden;
            position: relative;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 30px rgba(0, 0, 0, 0.2);
        }
        .card-body {
            padding: 2rem;
            color: #fff;
            position: relative;
            z-index: 1;
        }
        .card-body h5 {
            font-size: 2rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }
        .card-body p {
            font-size: 1.125rem;
        }
        .card-footer {
            background-color: #f8f9fa;
            border-top: 1px solid #dee2e6;
            border-radius: 0 0 16px 16px;
            padding: 0.75rem 1.5rem;
        }
        .card-footer a {
            font-size: 0.875rem;
            color: #007bff;
            text-decoration: none;
        }
        .card-footer a:hover {
            text-decoration: underline;
        }
        .card-footer i {
            font-size: 1.2rem;
        }
        .bg-primary-gradient {
            background: linear-gradient(135deg, #4e73df, #2e59d9);
        }
        .bg-warning-gradient {
            background: linear-gradient(135deg, #f6c23e, #e0a800);
        }
        .bg-success-gradient {
            background: linear-gradient(135deg, #1cc88a, #17a673);
        }
        .bg-danger-gradient {
            background: linear-gradient(135deg, #e74a3b, #c82333);
        }
        .breadcrumb {
            background-color: transparent;
            padding: 0;
            margin-bottom: 1.5rem;
        }
        .breadcrumb-item a {
            color: #007bff;
        }
        .breadcrumb-item.active {
            color: #6c757d;
        }
        .dashboard-header {
            margin-bottom: 2rem;
        }
        .dashboard-header h1 {
            font-size: 2.25rem;
            font-weight: 700;
            color: #343a40;
        }
        .dashboard-header p {
            font-size: 1.200rem;
            color: #6c757d;
        }
        .icon {
            font-size: 2.5rem;
            position: absolute;
            top: 1rem;
            right: 1rem;
            opacity: 0.7;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <div class="dashboard-header">
            <h1>Dashboard</h1>
            <p>"Jelajahi koleksi buku dan jurnal kami secara digital. Akses pengetahuan kapan saja, di mana saja."</p>
        </div>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
        <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card bg-primary-gradient text-white">
                    <div class="card-body">
                        <i class="fas fa-tags icon"></i>
                        <h5><?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM kategori")); ?></h5>
                        <p>Total Kategori</p>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a href="#">View Details</a>
                        <i class="fas fa-angle-right"></i>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card bg-warning-gradient text-dark">
                    <div class="card-body">
                        <i class="fas fa-book icon"></i>
                        <h5><?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM buku")); ?></h5>
                        <p>Total Buku</p>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a href="#">View Details</a>
                        <i class="fas fa-angle-right"></i>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card bg-success-gradient text-white">
                    <div class="card-body">
                        <i class="fas fa-star icon"></i>
                        <h5><?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM ulasan")); ?></h5>
                        <p>Total Ulasan</p>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a href="#">View Details</a>
                        <i class="fas fa-angle-right"></i>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card bg-danger-gradient text-white">
                    <div class="card-body">
                        <i class="fas fa-users icon"></i>
                        <h5><?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM user")); ?></h5>
                        <p>Total User</p>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a href="#">View Details</a>
                        <i class="fas fa-angle-right"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                User Information
            </div>
            <div class="card-body">
                <table class="table table-bordered mb-0">
                    <tbody>
                        <tr>
                            <td width="200">Nama</td>
                            <td><?php echo $_SESSION['user']['nama']; ?></td>
                        </tr>
                        <tr>
                            <td width="200">Level User</td>
                            <td><?php echo $_SESSION['user']['level']; ?></td>
                        </tr>
                        <tr>
                            <td width="200">Tanggal Login</td>
                            <td><?php echo date('d-m-Y'); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
</body>
</html>
