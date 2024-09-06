<?php
    include "koneksi.php";  
    if(!isset($_SESSION['user'])){
        header('location:login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Perpustakaan Digital</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed"> <!-- Background keseluruhan jadi biru muda -->
    <!-- Navbar with new background color -->
    <nav class="sb-topnav navbar navbar-expand navbar-dark" style="background-color: #1976d2;"> <!-- Navbar warna biru lebih lembut -->
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.html">
            <i class="fas fa-book-open"></i> <!-- Ikon buku -->
            Digital Library
        </a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Settings</a></li>
                    <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="#!">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <!-- Sidebar with new background color -->
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion" style="background-color: #1565c0; color: #ffffff;"> <!-- Sidebar warna biru tua -->
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading" style="color: #ffffff;">Core</div> <!-- Warna teks heading -->
                        <a class="nav-link" href="?" style="color: #ffffff;"> <!-- Warna teks link -->
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading" style="background-color: #1565c0; color: #ffffff;">Navigasi</div> <!-- Warna teks heading -->
                        <?php
                                if($_SESSION['user']['level'] !='peminjam'){
                            ?>
                        <a class="nav-link" href="?page=kategori" style="background-color: #1565c0; color: #ffffff;"> <!-- Warna teks link -->
                            <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                            Kategori
                        </a>
                        <a class="nav-link" href="?page=buku" style="background-color: #1565c0; color: #ffffff;"> <!-- Warna teks link -->
                            <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                            Buku
                        </a>
                        <?php
                                }else{ 
                            ?>
                        <a class="nav-link" href="?page=peminjaman" style="background-color: #1565c0; color: #ffffff;"> <!-- Warna teks link -->
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            Peminjaman
                        </a>
                        <?php
                                }
                            ?>
                        <a class="nav-link" href="?page=ulasan" style="background-color: #1565c0; color: #ffffff;"> <!-- Warna teks link -->
                            <div class="sb-nav-link-icon"><i class="fas fa-comment"></i></div>
                            Ulasan
                        </a>
                        <?php
                                if($_SESSION['user']['level'] !='peminjam'){
                            ?>
                        <a class="nav-link" href="?page=laporan" style="background-color: #1565c0; color: #ffffff;"> <!-- Warna teks link -->
                            <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                            Laporan Peminjaman
                        </a>
                        <?php
                                }
                            ?>
                        <a class="nav-link" href="logout.php" style="background-color: #1565c0; color: #ffffff;"> <!-- Warna teks link -->
                            <div class="sb-nav-link-icon"><i class="fa fa-power-off"></i></div>
                            Logout
                        </a>
                    </div>
                </div>
                <div class="sb-sidenav-footer" style="background-color: #1976d2; color: #ffffff;"> <!-- Warna footer sidebar -->
                    <div class="small">Logged in as:</div>
                    <?php echo $_SESSION['user']['nama']; ?>
                </div>
            </nav>
        </div>
        
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4" style="background-color: #ffffff;"> <!-- Background konten utama -->
                    <?php
                            $page = isset($_GET['page']) ? $_GET['page'] : 'home';
                            if(file_exists($page . '.php')){
                                include $page . '.php';
                            }else{
                                include '404.php';
                            }
                        ?>
                </div>
            </main>
            <footer class="py-4"> <!-- Footer -->
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">SITI LUTFIYAH || XII PPLG 1</div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>
