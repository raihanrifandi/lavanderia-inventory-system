<?php

include 'connection/conn.php';  

session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

$barangResult = mysqli_query($conn, "SELECT b.id_barang, b.nama_barang, s.satuan, jb.jenis, l.nama_lokasi
    FROM barang b
    JOIN satuan_barang s ON b.id_satuan = s.id_satuan
    JOIN jenis_barang jb ON b.id_jenis = jb.id_jenis
    JOIN lokasi_barang l ON b.id_lokasi = l.id_lokasi");
$barangOptions = [];
while ($row = mysqli_fetch_assoc($barangResult)) {
    $barangOptions[] = $row;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lavanderia Inventory System - Transaksi Barang Keluar</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="icon" href="assets/logo.png">
    <script src="scripts/barangKeluar.js"></script>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet">
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
                        <ul id="dashboard" class="sidebar-dropdown list-unstyled" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="transaksi_masuk.php" class="sidebar-link">Barang Masuk</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="transaksi_keluar.php" class="sidebar-link" style="color: white; background-color: #2D8DFF;">Barang Keluar</a>
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
                    <li style="font-weight: bold;">Barang Keluar</li>
                    <li class="breadcrumb-item active justify-content-end" style="margin-left:72%;"><a>Transaksi</a></li>
                    <li class="breadcrumb-item active" aria-current="page" style="color: #2D8DFF;">Barang Keluar</li>
                </ol>
            </nav>
            <!-- Tables -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="table-wrapper">
                            <div class="table-header">
                                <h3>Data Barang Keluar</h3>
                                <button id="addButton" class="btn btn-primary">Tambah Data +</button>
                            </div>
                            <hr>
                            <table id="barangKeluarTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>TANGGAL KELUAR</th>
                                        <th>ID TRANSAKSI</th>
                                        <th>KODE BARANG</th>
                                        <th>NAMA BARANG</th>
                                        <th>JUMLAH KELUAR</th>
                                        <th>KETERANGAN</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody id="barangKeluarTableBody">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- The Modal -->
        <!-- Tambah Data Pop Up -->
        <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="tambahBarangKeluarModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="editModalLabel">Tambah Barang Keluar</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <div class="row">
                <!-- Layout kiri -->
                <div class="col-md-6">
                    <form>
                    <div class="mb-3">
                        <label for="idTransaksi" class="form-label">ID Transaksi<span style="color: red;">*</span></label>
                        <input type="text" readonly class="form-control" id="idTransaksi">
                    </div>
                    <div class="mb-3">
                        <label for="tanggalKeluar" class="form-label">Tanggal Keluar<span style="color: red;">*</span></label>
                        <input type="date" class="form-control" id="tanggalKeluar">
                    </div>
                    <div class="mb-3">
                        <label for="jumlahKeluar" class="form-label">Jumlah Keluar<span style="color: red;">*</span></label>
                        <input type="number" class="form-control" id="jumlahKeluar" min="1">
                    </div>
                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <textarea class="form-control" id="keterangan" rows="3"></textarea>
                    </div>
                    </form>
                </div>
                <!-- Layout kanan -->
                <div class="col-md-6">
                    <form>
                    <div class="mb-1 form-group">
                        <label for="kodeBarang" class="form-label">Kode Barang<span style="color: red;">*</span></label><br>
                        <select id="kodeBarang" class="form-control" required>
                            <option value="">-- Pilih --</option>
                            <?php foreach ($barangOptions as $barang) { ?>
                                <option value="<?php echo $barang['id_barang']; ?>"     
                                        data-nama-barang="<?php echo $barang['nama_barang']; ?>" 
                                        data-satuan="<?php echo $barang['satuan']; ?>"
                                        data-jenis="<?php echo $barang['jenis']; ?>"
                                        data-lokasi="<?php echo $barang['nama_lokasi']; ?>">
                                    <?php echo $barang['id_barang'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-1">
                        <label for="namaBarang" class="form-label">Nama Barang</label>
                        <input type="text" readonly class="form-control" id="namaBarang">
                    </div>
                    <div class="mb-1">
                        <label for="satuanBarang" class="form-label">Satuan</label>
                        <input type="text" readonly class="form-control" id="satuanBarang">
                    </div>
                    <div class="mb-1">
                        <label for="jenisBarang" class="form-label">Jenis</label>
                        <input type="text" readonly class="form-control" id="jenisBarang">
                    </div>
                    <div class="mb-1">
                        <label for="lokasiBarang" readonly class="form-label">Lokasi</label>
                        <input type="text" readonly class="form-control" id="lokasiBarang">
                    </div>
                    </form>
                </div>
                </div>
            </div>
            <div class="modal-footer">
                        <button type="button" id="saveButton" class="btn btn-primary">Tambah</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
        </div>

        <!-- Edit Data Pop Up -->
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editBarangKeluarModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="editModalLabel">Edit Barang Keluar</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>
            <div class="modal-body">
                <div class="row">
                <!-- Layout kiri -->
                <div class="col-md-6">
                    <form>
                    <div class="mb-3">
                        <label for="idTransaksi" class="form-label">ID Transaksi<span style="color: red;">*</span></label>
                        <input type="text" readonly class="form-control" id="editIdTransaksi">
                    </div>
                    <div class="mb-3">
                        <label for="tanggalKeluar" class="form-label">Tanggal Keluar<span style="color: red;">*</span></label>
                        <input type="date" class="form-control" id="editTanggalKeluar">
                    </div>
                    <div class="mb-3">
                        <label for="jumlahKeluar" class="form-label">Jumlah Keluar<span style="color: red;">*</span></label>
                        <input type="number" class="form-control" id="editJumlahKeluar" min="1">
                    </div>
                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <textarea class="form-control" id="editKeterangan" rows="3"></textarea>
                    </div>
                    </form>
                </div>
                <!-- Layout kanan -->
                <div class="col-md-6">
                    <form>
                    <div class="mb-1 form-group">
                        <label for="editKodeBarang" class="form-label">Kode Barang<span style="color: red;">*</span></label>
                        <select class="form-control" id="editIdBarang" name="id_barang" required>
                            <?php foreach ($barangOptions as $barang) { ?>
                                <option value="<?php echo $barang['id_barang']; ?>"><?php echo $barang['id_barang']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="mb-1">
                        <label for="editNamaBarang" class="form-label">Nama Barang</label>
                        <input type="text" readonly class="form-control" id="editNamaBarang">
                    </div>
                    <div class="mb-1">
                        <label for="editSatuanBarang" class="form-label">Satuan</label>
                        <input type="text" readonly class="form-control" id="editSatuanBarang">
                    </div>
                    <div class="mb-1">
                        <label for="editJenisBarang" class="form-label">Jenis</label>
                        <input type="text" readonly class="form-control" id="editJenisBarang">
                    </div>
                    <div class="mb-1">
                        <label for="editLokasiBarang" readonly class="form-label">Lokasi</label>
                        <input type="text" readonly class="form-control" id="editLokasiBarang">
                    </div>
                    </form>
                </div>
                </div>
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
    var table = $('#barangKeluarTable').DataTable({
        "pageLength": 5,
        "lengthMenu": [5, 10, 25, 50],
        "searching": true,
        "paging": true,
        "info": true,
        "scrollX": true,
        "ajax": {
            "url": "php/transaksi/keluar/read.php",
            "type": "GET",
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
            { "data": "tanggal_keluar" },
            { "data": "id_transaksi" },
            { "data": "id_barang" },
            { "data": "nama_barang" },
            { "data": "jumlah_keluar" },
            { "data": "keterangan" },
            { "data": null, "render": function(data, type, row) {
                return `
                    <button class='btn btn-sm btn-primary editButton' data-tanggal='${row.tanggal_keluar}' data-id='${row.id_transaksi}' data-id_barang='${row.id_barang}' data-nama_barang='${row.nama_barang}' data-jumlah_keluar='${row.jumlah_keluar}' data-keterangan='${row.keterangan}'><i class='fas fa-edit'></i></button>
                    <button class='btn btn-sm btn-danger deleteButton' data-id='${row.id_transaksi}'><i class='fas fa-trash'></i></button>
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
            const generatedID = generateID();
            $('#idTransaksi').val(generatedID);
    });

    $('#kodeBarang').on('change', function() {
            // Ambil data dari opsi yang dipilih
            var selectedOption = $(this).find('option:selected');
            var namaBarang = selectedOption.data('nama-barang');
            var satuan = selectedOption.data('satuan');
            var jenis = selectedOption.data('jenis');
            var lokasi = selectedOption.data('lokasi');
            console.log(namaBarang);
            
            // Setel nilai pada nama barang, jenis barang, satuan barang, dan lokasi barang.
            $('#namaBarang').val(namaBarang);
            $('#jenisBarang').val(jenis);
            $('#satuanBarang').val(satuan);
            $('#lokasiBarang').val(lokasi);
        });

    // CREATE OPERATION LOGIC
    $('#saveButton').on('click', function() {
        var formData = {
            tanggal_keluar: $('#tanggalKeluar').val(),
            id_transaksi: $('#idTransaksi').val(),
            id_barang: $('#kodeBarang').val(),
            jumlah_keluar: $('#jumlahKeluar').val(),
            keterangan: $('#keterangan').val()
        };
        $.ajax({
            url: 'php/transaksi/keluar/create.php', // Endpoint untuk operasi CREATE
            type: 'POST',
            data: formData,
            success: function(response) {
            var data = JSON.parse(response);
            if (data.error) {
                Swal.fire({
                title: 'Error',
                text: data.error,
                icon: 'error',
                confirmButtonText: 'OK'
            });
            } else {
                $('#addModal').modal('hide');
                Swal.fire({
                title: 'Data Berhasil Disimpan',
                icon: 'success',
                confirmButtonText: 'OK'
                });
                    $('#barangKeluarTable').DataTable().ajax.reload();
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error('Error:', textStatus, errorThrown);
                    Swal.fire({
                        title: 'Error',
                        text: textStatus + ': ' + errorThrown,
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                }
        });
    });
    
    // Edit
   // Fetch data from the row
    const idBarang = $(this).data('id_barang');
    const idTransaksi = $(this).data('id');
    const tanggal = $(this).data('tanggal');
    const jumlah = $(this).data('jumlah_keluar');
    const keterangan = $(this).data('keterangan');

    // Set values in the edit form
    $('#editIdTransaksi').val(idTransaksi);
    $('#editTanggalKeluar').val(tanggal);
    $('#editJumlahKeluar').val(jumlah);
    $('#editKeterangan').val(keterangan);

    // Populate ID barang dropdown
    $('#editIdBarang').val('');
    $('#editIdBarang option').filter(function() {
        return $(this).val() == idBarang;
    }).prop('selected', true);

    $('#kodeBarang').on('change', function() {
        var idBarang = $(this).val(); 
        $.ajax({
            url: 'php/transaksi/keluar/fetch_barang.php', 
            type: 'GET',
            data: {
                id_barang: idBarang
            },
            success: function(response) {
                var data = JSON.parse(response);
                $('#namaBarang').val(data.nama_barang);
                $('#satuanBarang').val(data.satuan);
                $('#jenisBarang').val(data.jenis);
                $('#lokasiBarang').val(data.lokasi);
            },
            error: function(error) {
                console.log('Error fetching barang data', error);
            }
        });
    });

    $(document).on('click', '.editButton', function() {
        const idTransaksi = $(this).data('id');
        const tanggal = $(this).data('tanggal');
        const jumlah = $(this).data('jumlah_keluar');
        const keterangan = $(this).data('keterangan');
        
        // Set nilai kolom-kolom pada modal edit
        $('#editIdTransaksi').val(idTransaksi);
        $('#editTanggalKeluar').val(tanggal);
        $('#editJumlahKeluar').val(jumlah);
        $('#editKeterangan').val(keterangan);
        
        // Atur opsi dropdown id barang sebagai selected value
        const idBarang = $(this).data('id_barang');
        $('#editIdBarang').val(idBarang); // Ubah properti 'selected' opsi dropdown id barang
        $('#editModal').modal('show');
    });

    // UPDATE OPERATION LOGIC
    $('#updateButton').click(function() {
        var idTransaksi = $('#editIdTransaksi').val();
        var tanggalKeluar = $('#editTanggalKeluar').val();
        var idBarang = $('#editIdBarang').val(); // Ubah pemanggilan idBarang agar sesuai dengan id dropdown edit
        var jumlahKeluar = $('#editJumlahKeluar').val();
        var keterangan = $('#editKeterangan').val();
        $.ajax({
            url: 'php/transaksi/keluar/update.php',
            type: 'POST',
            data: {
                action: 'update',
                id_transaksi: idTransaksi,
                id_barang: idBarang, // Perbaiki parameter yang dikirimkan agar sesuai dengan id dropdown edit
                tanggal_keluar: tanggalKeluar,
                jumlah_keluar: jumlahKeluar,
                keterangan: keterangan
            },
            success: function(response) {
            var data = JSON.parse(response);
            if (data.error) {
                Swal.fire({
                title: 'Error',
                text: data.error,
                icon: 'error',
                confirmButtonText: 'OK'
            });
            } else {
                $('#editModal').modal('hide');
                Swal.fire({
                title: 'Data Berhasil Disimpan',
                icon: 'success',
                confirmButtonText: 'OK'
                });
                    $('#barangKeluarTable').DataTable().ajax.reload();
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error('Error:', textStatus, errorThrown);
                    Swal.fire({
                        title: 'Error',
                        text: textStatus + ': ' + errorThrown,
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
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
            url: 'php/transaksi/keluar/delete.php',
            type: 'POST',
            data: {
                id_transaksi: deleteId
            },
                success: function(response) {
                    $('#deleteModal').modal('hide');
                    console.log(deleteId);
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
