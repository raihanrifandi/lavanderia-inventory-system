<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'owner') {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Lavanderia Inventory System -  Owner Dashboard</title>
    <link rel="icon" href="assets/logo.png">
    <style type="text/css">
        .sidebar-link:hover {
            background-color: #2D8DFF;
            color: #ffffff !important;
        }
    </style>
</head>
<body>
    <?php include 'php/card.php'; ?>
    <div class="wrapper">
        <!-- Sidebar -->
        <aside id="sidebar">
            <div class="h-100">
                <div class="sidebar-logo">
                    <img src="assets/logo-text.png" alt="Logo Image" >
                </div>
                <!-- Sidebar Navigation -->
                <ul class="sidebar-nav">
                    <li class="sidebar-header">
                        MENU
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link" style="color: white; background-color: #2D8DFF;">
                            <img src="assets/dash-w.png" style="margin-right: 5px; width: 18px;">
                            Dashboard
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#dashboard"
                            aria-expanded="false" aria-controls="dashboard">
                            <img src="assets/laporan.png" style="margin-right: 5px;">
                            Laporan
                        </a>
                        <ul id="dashboard" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="owner_transaksi_masuk.php" class="sidebar-link">Barang Masuk</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="owner_transaksi_keluar.php" class="sidebar-link">Barang Keluar</a>
                            </li>
                        </ul>
                    </li>
                    <br><br>
                    <li class="sidebar-header">
                        OTHER
                    </li>
                    <li class="sidebar-item">
                        <a href="about-owner.html" class="sidebar-link">
                            <img src="assets/about.png" style="margin-right: 5px;">
                            About us
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="php/logout.php" class="sidebar-link">
                            <img src="assets/logout.png" style="margin-right: 5px;">
                            Logout
                        </a>
                    </li>
                </ul>
            </div>
        </aside>
        <!-- Main Component -->
        <div class="main" style="background-color: #F5F6F8">
            <nav class="navbar navbar-expand px-3 border-bottom" style="background-color: #fff; padding-bottom: 15px;">
                <!-- Button for sidebar toggle -->
                <button class="btn" type="button" data-bs-theme="dark">
                    <span class="navbar-toggler-icon">
                        <i class="bi bi-list" style="font-size: 30px; margin-top: 0;"></i>
                    </span>
                </button>
                <!-- Profile dropdown menu -->
                <div class="ms-auto profile-dropdown">
                    <div class="dropdown">
                        <button class="btn dropdown-toggle" type="button" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="assets/pp.jpg" alt="Profile Avatar" class="rounded-circle" width="30" height="30">
                            <?php echo $_SESSION['username']; ?>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li><a class="dropdown-item" href="#">Settings</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="php/logout.php">Logout</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="row mt-5" style="margin-left: 2%; margin-right: 2%;">
                    <div class="col-md-4 stretch-card grid-margin">
                        <div class="card bg-gradient-info card-img-holder text-white">
                            <div class="card-body">
                                <img src="assets/circle.svg" class="card-img-absolute" alt="circle-image" />
                                <h4 class="font-weight-normal mb-3">Barang
                                </h4>
                                <h2 class="mb-5"><?php echo $total_barang; ?></h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 stretch-card grid-margin">
                        <div class="card bg-gradient-success card-img-holder text-white">
                            <div class="card-body">
                                <img src="assets/circle.svg" class="card-img-absolute" alt="circle-image" />
                                <h4 class="font-weight-normal mb-3">Satuan Barang
                                </h4>
                                <h2 class="mb-5"><?php echo $total_barang_masuk; ?></h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 stretch-card grid-margin">
                    <div class="card bg-gradient-danger card-img-holder text-white">
                        <div class="card-body">
                            <img src="assets/circle.svg" class="card-img-absolute" alt="circle-image" />
                            <h4 class="font-weight-normal mb-3">Lokasi Barang
                            </h4>
                            <h2 class="mb-5"><?php echo $total_barang_keluar; ?></h2>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    <script>
        const toggler = document.querySelector(".btn");
        toggler.addEventListener("click",function(){
        document.querySelector("#sidebar").classList.toggle("collapsed");
        });

        $('.sidebar-item a[href="php/logout.php"]').on('click', function(event) {
            event.preventDefault(); // Mencegah aksi default (redirect)
            Swal.fire({
                title: 'Apakah Anda yakin akan keluar?',
                text: "Anda akan keluar dari akun Anda.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya',
                cancelButtonText: 'Tidak'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'php/logout.php';
                }
            });
        });
    </script>

</body>
</html>