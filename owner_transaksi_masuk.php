<?php
include 'connection/conn.php';

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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lavanderia Inventory System - Transaksi Barang Masuk</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="icon" href="assets/logo.png">
    <script src="scripts/barangMasuk.js"></script>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <!-- DataTables Buttons CSS -->
    <link href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.bootstrap5.min.css" rel="stylesheet">
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <!-- Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="styles/style.css">    
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <!-- DataTables Buttons JS -->
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.colVis.min.js"></script>
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .table-wrapper {
            margin: 20px;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .table {
            width: 100%; 
            min-width: 1250px; 
        }
        .btn-primary {
            background-color: #005BA7;
            border-color: #005BA7;
        }
        .btn-primary:hover {
            background-color: #004a8b;
            border-color: #004a8b;
        }
        .table-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .table-header h3 {
            font-size: 18px;
            color: #333333;
            margin: 0;
        }

        /* Modal styles */
        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #e5e5e5;
            padding-bottom: 10px;
        }

        .modal-header h2 {
            font-size: 18px;
            margin: 0;
        }

        .modal-body {
            padding: 32px 0;
            margin: 8px 18px;
        }

        .modal-footer {
            display: flex;
            justify-content: flex-end;
            padding-top: 10px;
            border-top: 1px solid #e5e5e5;
        }

        .modal-footer button {
            margin-left: 10px;
        }
        .sidebar-link:hover {
            background-color: #2D8DFF;
            color: #ffffff !important;
        }
        @media print {
            .table thead {
                background-color: #005BA7
                color: #ffffff;
            }
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            margin: 5px 0 10px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <aside id="sidebar">
            <div class="h-100">
                <div class="sidebar-logo">
                    <img src="assets/logo-text.png" alt="Logo Image">
                </div>
                <!-- Sidebar Navigation -->
                <ul class="sidebar-nav">
                    <li class="sidebar-header">
                        MENU
                    </li>
                    <li class="sidebar-item">
                        <a href="dashboard_owner.php" class="sidebar-link">
                            <img src="assets/dash.png" style="margin-right: 5px; width: 18px;">
                            Dashboard
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#dashboard"
                            aria-expanded="false" aria-controls="dashboard">
                            <img src="assets/laporan.png" style="margin-right: 5px;">
                            Laporan
                        </a>
                        <ul id="dashboard" class="sidebar-dropdown list-unstyled" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="owner_transaksi_masuk.php" class="sidebar-link" style="background-color: #2D8DFF; color: #ffffff !important;">Barang Masuk</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="owner_transaksi_keluar.php" class="sidebar-link">Barang Keluar</a>
                            </li>
                        </ul>
                    </li>
                    <br><br><br><br>
                    <li class="sidebar-header">
                        OTHER
                    </li>
                    <li class="sidebar-item">
                        <a href="about-owner.html" class="sidebar-link">
                            <img src="assets/aboutUs.png" style="margin-right: 5px;">
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

        <!-- Main Content -->
        <div class="main" style="background-color: #F5F6F8">
            <nav class="navbar navbar-expand px-3 border-bottom" style="background-color: #fff; padding-bottom: 15px;">
                <!-- Button for sidebar toggle -->
                <button class="btn" type="button" data-bs-theme="dark">
                    <span class="navbar-toggler-icon">
                        <i class="bi bi-list" style="font-size: 30px; margin-top: 0;"></i>
                    </span>
                </button>
                <!-- Profile dropdown menu -->
                <div class="ms-auto profile-dropdown" style="margin-left: 80%;">
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

            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb" style="margin-top: 32px; margin-right: 18px; margin-left: 18px;">
                <ol class="breadcrumb bg-transparent">
                    <li style="font-weight: bold;">Barang Masuk</li>
                    <li class="breadcrumb-item active justify-content-end" style="margin-left:72%;"><a>Laporan</a></li>
                    <li class="breadcrumb-item active" aria-current="page" style="color: #2D8DFF;">Barang Masuk</li>
                </ol>
            </nav>

            <!-- Tables -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="table-wrapper">
                            <div class="table-header">
                                <h3>Data Barang Masuk</h3>
                            </div>
                            <br>
                            <div class="date-filter-container">
                                <label for="startDate" style="margin-top: 10px">Start Date:</label>
                                <input type="date" id="startDate" name="startDate">
                                <label for="endDate" style="margin-top: 10px">End Date:</label>
                                <input type="date" id="endDate" name="endDate">
                                <button id="filterButton" class="btn btn-primary">Filter</button>
                                <button id="resetButton" class="btn btn-secondary" style="margin-left: 4px">Reset</button>
                            </div>
                            <hr>
                            <table id="barangMasukTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>TANGGAL MASUK</th>
                                        <th>ID TRANSAKSI</th>
                                        <th>KODE BARANG</th>
                                        <th>NAMA BARANG</th>
                                        <th>JUMLAH MASUK</th>
                                        <th>KETERANGAN</th>
                                    </tr>
                                </thead>
                                <tbody id="barangMasukTableBody">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<!-- jQuery and DataTables Scripts -->
<script>
    $(document).ready(function() {
        var table = $('#barangMasukTable').DataTable({
            "pageLength": 5,
            "lengthMenu": [5, 10, 25, 50],
            "searching": true,
            "paging": true,
            "info": true,
            "scrollX": true,
            "ajax": {
                "url": "php/transaksi/masuk/read.php",
                "type": "GET",
                "data": function(d) {
                    d.startDate = $('#startDate').val();
                    d.endDate = $('#endDate').val();
                },
                "dataSrc": "",
                "error": function (jqXHR, textStatus, errorThrown) {
                    console.error('Error fetching data:', textStatus, errorThrown);
                    console.log('Response:', jqXHR.responseText);
                    Swal.fire({
                        title: 'Error fetching data',
                        text: textStatus + ': ' + errorThrown,
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                }
            },
            "columns": [
                { "data": null, "render": function(data, type, row, meta) {
                    return meta.row + 1;
                }},
                { "data": "tanggal_masuk" },
                { "data": "id_transaksi" },
                { "data": "id_barang" },
                { "data": "nama_barang" },
                { "data": "jumlah_masuk" },
                { "data": "keterangan" },
            ],
            "drawCallback": function(settings) {
                $('#entriesInfo').text(`Showing ${settings._iDisplayStart + 1} to ${settings._iDisplayStart + settings._iDisplayLength} of ${settings.fnRecordsDisplay()} entries`);
            },
            "dom": '<"top"Bf>rt<"bottom"lp><"clear">', 
            "buttons": [
                {
                    extend: 'pdf',
                    text: 'PDF',
                    customize: function (doc) {
                        doc.content[1].table.headerRows = 1;
                        doc.styles.tableHeader.fillColor = '#2D8DFF';
                        doc.styles.tableHeader.color = '#ffffff';
                        doc.content.splice(0, 0, {
                            margin: [0, 0, 0, 12],
                            alignment: 'center',
                            image: 'data:image/png;base64,' + getBase64Image(document.getElementById("logo")),
                            width: 150
                        });
                    }
                },
                {
                    extend: 'print',
                    text: 'Print',
                    customize: function (win) {
                        $(win.document.body).prepend(
                            '<div style="text-align: center;"><img src="assets/logo-text.png" style="width: 150px; margin: 20px;"></div>'
                        );
                    }
                }
            ]
        });

        // Function to convert image to base64
        function getBase64Image(img) {
            var canvas = document.createElement("canvas");
            canvas.width = img.width;
            canvas.height = img.height;
            var ctx = canvas.getContext("2d");
            ctx.drawImage(img, 0, 0);
            var dataURL = canvas.toDataURL("image/png");
            return dataURL.replace(/^data:image\/(png|jpg);base64,/, "");
        }

        // Add logo to the DOM
        $('body').append('<img id="logo" src="assets/logo-text.png" style="display:none;">');
        $('#filterButton').click(function() {
             table.ajax.reload();
        });
        $('#resetButton').click(function() {
            $('#startDate').val('');
            $('#endDate').val('');
            table.ajax.reload();
        });
    });
</script>
</body>
</html>