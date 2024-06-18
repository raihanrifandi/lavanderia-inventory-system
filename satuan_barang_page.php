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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lavanderia Inventory System - Satuan Barang</title>
    <link rel="" el="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="icon" href="assets/logo.png">
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <!-- Font Awesome -->
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
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
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
            min-width: 1081px; 
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
        <!-- Sidebar Image -->
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
                        <a href="dashboard_admin.php" class="sidebar-link">
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
                        <ul id="pages" class="sidebar-dropdown list-unstyled" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="jenis_barang_page.php" class="sidebar-link">Jenis</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="satuan_barang_page.php" class="sidebar-link" style="color: white; background-color: #2D8DFF;">Satuan</a>
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
                        <a href="about.html" class="sidebar-link">
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
                    <li style="font-weight: bold;">Satuan Barang</li>
                    <li class="breadcrumb-item active justify-content-end" style="margin-left:73%;"><a>Master Barang</a></li>
                    <li class="breadcrumb-item active" aria-current="page" style="color: #2D8DFF;">Satuan</li>
                </ol>
            </nav>

            <!-- Page Title -->

            <!-- Tables -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="table-wrapper">
                            <div class="table-header">
                                <h3>Data Satuan Barang</h3>
                                <button id="addButton" class="btn btn-primary">Tambah Data +</button>
                            </div>
                            <hr>
                            <table id="satuanBarangTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>SATUAN</th>
                                        <th>KETERANGAN</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody id="satuanBarangTableBody">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        <!-- The Modal -->
        <!-- Tambah Data Pop Up -->
        <div id="addModal" class="modal fade" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title" id="addModalLabel">Tambah Satuan</h2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="tambahSatuanForm">
                            <div class="form-group">
                                <label for="satuan">Satuan <span style="color: red;">*</span></label>
                                <input type="text" class="form-control" id="satuan" name="satuan" required>
                            </div>
                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <textarea class="form-control" id="keterangan" name="keterangan" rows="4" required></textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="button" id="saveButton" class="btn btn-primary">Simpan</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Data Pop Up -->
        <div id="editModal" class="modal fade" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title" id="editModalLabel">Edit</h2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="editSatuanForm">
                            <input type="hidden" id="editIdSatuan" name="id_satuan">
                            <div class="form-group">
                                <label for="editSatuan">Satuan <span style="color: red;">*</span></label>
                                <input type="text" class="form-control" id="editSatuan" name="satuan" required>
                            </div>
                            <div class="form-group">
                                <label for="editKeterangan">Keterangan</label>
                                <textarea class="form-control" id="editKeterangan" name="keterangan" rows="4" required></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="updateButton" class="btn btn-primary">Update</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Hapus Data Pop Up -->
        <div id="deleteModal" class="modal fade" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content text-center">
                    <div class="modal-body">
                        <i class="fa fa-circle-exclamation fa-3x text-warning mb-3"></i>
                        <h4>Apakah Anda ingin menghapus <br> data ini?</h4>
                        <button type="button" id="confirmDeleteButton" class="btn btn-danger mt-3">Iya</button>
                        <button type="button" class="btn btn-secondary mt-3" data-dismiss="modal">Tidak</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery and DataTables Scripts -->
    <script>
    $(document).ready(function() {
        var table = $('#satuanBarangTable').DataTable({
            "pageLength": 5,
            "lengthMenu": [5, 10, 25, 50],
            "searching": true,
            "paging": true,
            "info": true,
            "ajax": {
                "url": "php/read_satuan_barang.php",
                "type": "GET",
                "dataSrc": ""
            },
            "columns": [
                { "data": null, "render": function(data, type, row, meta) {
                    return meta.row + 1;
                }},
                { "data": "satuan" },
                { "data": "keterangan" },
                { "data": null, "render": function(data, type, row) {
                    return `
                        <button class='btn btn-sm btn-primary editButton' data-id='${row.id_satuan}' data-satuan='${row.satuan}' data-keterangan='${row.keterangan}'><i class='fas fa-edit'></i></button>
                        <button class='btn btn-sm btn-danger deleteButton' data-id='${row.id_satuan}'><i class='fas fa-trash'></i></button>
                    `;
                }}
            ],
            "drawCallback": function(settings) {
                $('#entriesInfo').text(`Showing ${settings._iDisplayStart + 1} to ${settings._iDisplayStart + settings._iDisplayLength} of ${settings.fnRecordsDisplay()} entries`);
            }
        });

        // CREATE OPERATION BUTTON
        $('#addButton').on('click', function () {
            $('#addModal').modal('show');
        });

        // CREATE OPERATION LOGIC
        $('#saveButton').on('click', function () {
            var formData = $('#tambahSatuanForm').serialize();
            $.ajax({
                url: 'php/tambah_satuan_barang.php',
                type: 'POST',
                data: formData,
                success: function (response) {
                    $('#addModal').modal('hide');
                    $('#tambahSatuanForm')[0].reset();
                    Swal.fire({
                        title: 'Data Berhasil Disimpan',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    });
                    table.ajax.reload();
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log('Error:', textStatus, errorThrown);
                }
            });
        });

        // UPDATE OPERATION BUTTON
        $(document).on('click', '.editButton', function() {
            const idSatuan = $(this).data('id'); // $(this).data('id'); ini tidak perlu diubah ya, cukup penamaan variabelnya saja
            const satuan = $(this).data('satuan');
            const keterangan = $(this).data('keterangan');

            $('#editIdSatuan').val(idSatuan);
            $('#editSatuan').val(satuan);
            $('#editKeterangan').val(keterangan);

            $('#editModal').modal('show');
        });

        // UPDATE OPERATION LOGIC
        $('#updateButton').click(function() {
            const idSatuan = $('#editIdSatuan').val();
            const satuan = $('#editSatuan').val();
            const keterangan = $('#editKeterangan').val();

            $.ajax({
                url: 'php/update_satuan_barang.php',
                type: 'POST',
                data: {
                    action: 'update',
                    id_satuan: idSatuan,
                    satuan: satuan,
                    keterangan: keterangan
                },
                success: function(response) {
                    $('#editModal').modal('hide');
                    Swal.fire({
                        title: 'Perubahan Berhasil Disimpan',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    });
                    table.ajax.reload(null, false);
                },
                error: function(error) {
                    console.log('Error updating data', error);
                }
            });
        });

        // DELETE OPERATION BUTTON
        let deleteId;
        $(document).on('click', '.deleteButton', function() {
            deleteId = $(this).data('id'); // Perhatikan disini ya kawan-kawanqu, 'id' ini tidak perlu diubah
            $('#deleteModal').modal('show');
        });

        // DELETE OPERATION LOGIC
        $('#confirmDeleteButton').click(function() {
            $.ajax({
                url: 'php/delete_satuan_barang.php',
                type: 'POST',
                data: {
                    id_satuan: deleteId
                },
                success: function(response) {
                    $('#deleteModal').modal('hide');
                    Swal.fire({
                            title: 'Data Berhasil Dihapus',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        });
                    table.ajax.reload(null, false);
                },
                error: function(error) {
                    console.log('Error deleting data', error);
                }
            });
        });

        // CLOSE POP UP
        $('.close, .btn-secondary').click(function() {
            $('#addModal').modal('hide');
            $('#editModal').modal('hide');
            $('#deleteModal').modal('hide');
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
    });
</script>
</body>
</html>