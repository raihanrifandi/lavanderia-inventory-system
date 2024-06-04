<?php
session_start();
if (!isset($_SESSION['username'])) {
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
    <title>Lavanderia Inventory System -  Admin Dashboard</title>
    <link rel="icon" href="assets/logo.png">
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
                        <a href="#" class="sidebar-link" style="color: #2D8DFF;">
                            <img src="assets/dash.png" style="margin-right: 5px; ">
                            Dashboard
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#pages"
                            aria-expanded="false" aria-controls="pages">
                            <img src="assets/master.png" style="margin-right: 5px;">
                            Master Barang
                        </a>
                        <ul id="pages" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="jenis_barang_page.php" class="sidebar-link">Jenis</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="satuan_barang_page.php" class="sidebar-link">Satuan</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="lokasi_barang_page.php" class="sidebar-link">Lokasi</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="kelola_barang_page.php" class="sidebar-link">Barang</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#dashboard"
                            aria-expanded="false" aria-controls="dashboard">
                            <img src="assets/transaksi.png" style="margin-right: 5px;">
                            Transaksi
                        </a>
                        <ul id="dashboard" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="transaksi_masuk.php" class="sidebar-link">Barang Masuk</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="transaksi_keluar.php" class="sidebar-link">Barang Keluar</a>
                            </li>
                        </ul>
                    </li>
                    <br><br><br><br>
                    <li class="sidebar-header">
                        OTHER
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link">
                            <img src="assets/setting.png" style="margin-right: 5px;">
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
            <nav class="navbar navbar-expand px-3 border-bottom" style="background-color: #fff">
                <!-- Button for sidebar toggle -->
                <button class="btn" type="button" data-bs-theme="dark">
                    <span class="navbar-toggler-icon">
                        <i class="bi bi-list" style="font-size: 30px; margin-top: 0;"></i>
                    </span>
                </button>
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
                                <h4 class="font-weight-normal mb-3">Barang Masuk
                                </h4>
                                <h2 class="mb-5"><?php echo $total_barang_masuk; ?></h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 stretch-card grid-margin">
                    <div class="card bg-gradient-danger card-img-holder text-white">
                        <div class="card-body">
                            <img src="assets/circle.svg" class="card-img-absolute" alt="circle-image" />
                            <h4 class="font-weight-normal mb-3">Barang Keluar
                            </h4>
                            <h2 class="mb-5"><?php echo $total_barang_keluar; ?></h2>
                        </div>
                    </div>
                    </div>
                    <div class="col-md-4 stretch-card grid-margin">
                        <div class="card bg-gradient-info card-img-holder text-white">
                            <div class="card-body">
                                <img src="assets/circle.svg" class="card-img-absolute" alt="circle-image" />
                                <h4 class="font-weight-normal mb-3">Jenis Barang
                                </h4>
                                <h2 class="mb-5"><?php echo $total_jenis_barang; ?></h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 stretch-card grid-margin">
                        <div class="card bg-gradient-info card-img-holder text-white">
                            <div class="card-body">
                                <img src="assets/circle.svg" class="card-img-absolute" alt="circle-image" />
                                <h4 class="font-weight-normal mb-3">Satuan Barang
                                </h4>
                                <h2 class="mb-5"><?php echo $total_satuan_barang; ?></h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 stretch-card grid-margin">
                        <div class="card bg-gradient-info card-img-holder text-white">
                            <div class="card-body">
                                <img src="assets/circle.svg" class="card-img-absolute" alt="circle-image" />
                                <h4 class="font-weight-normal mb-3">Lokasi Barang
                                </h4>
                                <h2 class="mb-5"><?php echo $total_lokasi_barang; ?></h2>
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
    </script>
</body>
</html>