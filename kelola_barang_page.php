<?php
// Connect to the database
include 'connection/conn.php';

session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

// Fetch satuan data
$satuanResult = mysqli_query($conn, "SELECT id_satuan, satuan FROM satuan_barang");
$satuanOptions = [];
while ($row = mysqli_fetch_assoc($satuanResult)) {
    $satuanOptions[] = $row;
}

// Fetch jenis data
$jenisResult = mysqli_query($conn, "SELECT id_jenis, jenis FROM jenis_barang");
$jenisOptions = [];
while ($row = mysqli_fetch_assoc($jenisResult)) {
    $jenisOptions[] = $row;
}

// Fetch lokasi data
$lokasiResult = mysqli_query($conn, "SELECT id_lokasi, nama_lokasi FROM lokasi_barang");
$lokasiOptions = [];
while ($row = mysqli_fetch_assoc($lokasiResult)) {
    $lokasiOptions[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lavanderia Inventory System - Lokasi Barang</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="icon" href="assets/logo.png">
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
            min-width: 1500px; 
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
                        <a href="dashboard_admin.php" class="sidebar-link" style="color: #2D8DFF;">
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
            <nav class="navbar navbar-expand px-3 border-bottom" style="background-color: #fff">
                <!-- Button for sidebar toggle -->
                <button class="btn" type="button" data-bs-theme="dark">
                    <span class="navbar-toggler-icon">
                        <i class="bi bi-list" style="font-size: 30px; margin-top: 0;"></i>
                    </span>
                </button>
            </nav>

            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb" style="margin-top: 32px; margin-right: 18px">
                <ol class="breadcrumb bg-transparent justify-content-end">
                    <li class="breadcrumb-item active"><a>Master Barang</a></li>
                    <li class="breadcrumb-item active" aria-current="page" style="color: #2D8DFF;">Barang</li>
                </ol>
            </nav>

            <!-- Page Title -->
            
            <!-- Tables -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="table-wrapper">
                            <div class="table-header">
                                <h3>Data Barang</h3>
                                <button id="addButton" class="btn btn-primary">Tambah Data +</button>
                            </div>
                                <table id="barangTable" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>GAMBAR</th>
                                            <th>KODE BARANG</th>
                                            <th>NAMA BARANG</th>
                                            <th>JENIS</th>
                                            <th>SATUAN</th>
                                            <th>LOKASI PENYIMPANAN</th>
                                            <th>JUMLAH</th>
                                            <th>HARGA</th>
                                            <th>ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody id="barangTableBody">
                                    </tbody>
                                    <hr>
                                </table>
                            </div>
                        </div>
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
                    <h2 class="modal-title" id="addModalLabel">Tambah Barang</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="tambahBarangForm" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="gambar">Gambar<span style="color: red;">*</span></label>
                            <input type="file" id="gambar" name="gambar" accept="image" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="nama_barang">Nama Barang<span style="color: red;">*</span></label>
                            <input type="text" id="nama_barang" name="nama_barang" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="jenis_barang">Jenis<span style="color: red;">*</span></label>
                            <select id="jenis_barang" name="jenis_barang" class="form-control" required>
                                <option value="" disabled selected>-- Pilih --</option>
                                <?php foreach ($jenisOptions as $jenis) { ?>
                                    <option value="<?php echo $jenis['id_jenis']; ?>"><?php echo $jenis['jenis']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="satuan_barang">Satuan<span style="color: red;">*</span></label>
                            <select id="satuan_barang" name="satuan_barang" class="form-control" required>
                                <option value="" disabled selected>-- Pilih --</option>
                                <?php foreach ($satuanOptions as $satuan) { ?>
                                    <option value="<?php echo $satuan['id_satuan']; ?>"><?php echo $satuan['satuan']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="lokasi_barang">Lokasi<span style="color: red;">*</span></label>
                            <select id="lokasi_barang" name="lokasi_barang" class="form-control" required>
                                <option value="" disabled selected>-- Pilih --</option>
                                <?php foreach ($lokasiOptions as $lokasi) { ?>
                                    <option value="<?php echo $lokasi['id_lokasi']; ?>"><?php echo $lokasi['nama_lokasi']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga<span style="color: red;">*</span></label>
                            <input type="text" id="harga" name="harga" class="form-control" required>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Tambah</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
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
                    <h2 class="modal-title" id="editModalLabel">Edit Barang</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editBarangForm" enctype="multipart/form-data">                            
                        <div class="form-group">
                            <label for="editGambar">Gambar<span style="color: red;">*</span></label>
                            <input type="file" id="editGambar" name="gambar" class="form-control" required>
                            <img id="editGambarPreview" src="" alt="Gambar" style="max-width: 100px; max-height: 100px;">
                        </div>
                        <div class="form-group">
                            <label for="editNamaBarang">Kode Barang<span style="color: red;">*</span></label>
                            <input id="editIdBarang" name="id_barang" readonly class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="editNamaBarang">Nama Barang<span style="color: red;">*</span></label>
                            <input type="text" id="editNamaBarang" name="nama_barang" class="form-control" placeholder="-- Pilih --" required>
                        </div>
                        <div class="form-group">
                            <label for="editJenisBarang">Jenis<span style="color: red;">*</span></label>
                            <select id="editJenisBarang" name="jenis_barang" class="form-control" required>
                                <option value="" disabled selected>-- Pilih --</option>
                                <?php foreach ($jenisOptions as $jenis) { ?>
                                    <option value="<?php echo $jenis['id_jenis']; ?>"><?php echo $jenis['jenis']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="editSatuanBarang">Satuan<span style="color: red;">*</span></label>
                            <select id="editSatuanBarang" name="satuan_barang" class="form-control" required>
                                <?php foreach ($satuanOptions as $satuan) { ?>
                                    <option value="<?php echo $satuan['id_satuan']; ?>"><?php echo $satuan['satuan']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="editLokasiBarang">Lokasi Penyimpanan<span style="color: red;">*</span></label>
                            <select id="editLokasiBarang" name="lokasi_barang" class="form-control" required>
                                <option value="" disabled selected>-- Pilih --</option>
                                <?php foreach ($lokasiOptions as $lokasi) { ?>
                                    <option value="<?php echo $lokasi['id_lokasi']; ?>"><?php echo $lokasi['nama_lokasi']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="editHarga">Harga<span style="color: red;">*</span></label>
                            <input type="text" id="editHarga" name="harga" class="form-control" placeholder="-- Pilih --" required>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        </div>
                    </form>
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


    <!-- Include jQuery and DataTables JavaScript -->
    <script>
    $(document).ready(function () {
        var table = $('#barangTable').DataTable({
        "pageLength": 5,
        "lengthMenu": [5, 10, 25, 50],
        "searching": true,
        "paging": true,
        "info": true,
        "scrollX": true,
        "ajax": {
            "url": "php/read_barang.php",
            "type": "GET",
            "dataSrc": ""
        },
        "columns": [
            { "data": null, "render": function(data, type, row, meta) {
                return meta.row + 1;
            }},
            {"data": "gambar",
                "render": function(data, type, row) {
                    return data ? '<img src="data:image/jpeg;base64,' + data + '" width="50" height="50"/>' : '';
                }
            },
            { "data": "id_barang" },
            { "data": "nama_barang" },
            { "data": "jenis_barang" },
            { "data": "satuan_barang" },
            { "data": "lokasi_barang" },
            { "data": "stok_awal"},
            { "data": "harga"},
            { "data": null, "render": function(data, type, row) {
                return `
                    <button class='btn btn-sm btn-primary editButton' data-id='${row.id_barang}' data-nama='${row.nama_barang}' data-jenis='${row.jenis_barang}' data-satuan='${row.satuan_barang}' data-lokasi='${row.lokasi_barang}' data-jumlah='${row.stok_awal}' data-harga='${row.harga}'><i class='fas fa-edit'></i></button>
                    <button class='btn btn-sm btn-danger deleteButton' data-id='${row.id_barang}'><i class='fas fa-trash'></i></button>
                `;
            }}
        ],
        "drawCallback": function(settings) {
            $('#entriesInfo').text(`Showing ${settings._iDisplayStart + 1} to ${settings._iDisplayStart + settings._iDisplayLength} of ${settings.fnRecordsDisplay()} entries`);
        },
    });

        // Search functionality
        $('#search').on('keyup', function() {
            table.search(this.value).draw();
        });

        // Change number of entries to show
        $('#entries').on('change', function() {
            table.page.len(this.value).draw();
        });

        // Show the modal for adding new entry
        $('#addButton').click(function() {
            $('#addModal').modal('show');
        });

        $('#tambahBarangForm').on('submit', function(event) {
            event.preventDefault();
            var formData = new FormData($(this)[0]); 
            $.ajax({
                url: 'php/tambah_barang.php',
                method: 'POST',
                processData: false, 
                contentType: false, 
                data: formData, 
                success: function(response) {
                    $('#addModal').modal('hide');
                    $('#tambahBarangForm')[0].reset();
                    Swal.fire({
                        title: 'Data Berhasil Disimpan',
                        icon: 'success',    
                        confirmButtonText: 'OK'
                    });
                    table.ajax.reload();
                },
                error: function(response) {
                    alert('Failed to add data.'); // Display error message
                    console.error(response); // Log error for debugging
                }
            });
        });

        // Event listener for Edit button
        $('#barangTable').on('click', '.editButton', function () {
            var id_barang = $(this).data('id');
            var nama_barang = $(this).data('nama');
            var jenis_barang = $(this).data('jenis');
            var satuan_barang = $(this).data('satuan');
            var lokasi_barang = $(this).data('lokasi');
            var harga = $(this).data('harga');
            var gambarSrc = $(this).closest('tr').find('td:eq(1) img').attr('src');

            // Populate the form fields in the modal
            $('#editIdBarang').val(id_barang);
            $('#editNamaBarang').val(nama_barang);
            $('#editJenisBarang').val(jenis_barang);
            $('#editSatuanBarang').val(satuan_barang);
            $('#editLokasiBarang').val(lokasi_barang);
            $('#editHarga').val(harga);
            $('#editGambarPreview').attr('src', gambarSrc); // Tampilkan gambar saat modal dibuka

            console.log(jenis_barang);
            // Set the selected value for dropdowns
            $('#editJenisBarang').val(jenis_barang);
            $('#editSatuanBarang').val(satuan_barang);
            $('#editLokasiBarang').val(lokasi_barang);

            // Show the modal
            $('#editModal').modal('show');
        });

        // Handle form submission for editing entry
        $('#editBarangForm').on('submit', function (event) {
            event.preventDefault();
            
            // Create a FormData object
            var formData = new FormData(this);
            
            $.ajax({
                url: 'php/update_barang.php',
                method: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    $('#editModal').modal('hide');
                    $('#editBarangForm')[0].reset();
                    Swal.fire({
                        title: 'Perubahan Berhasil Disimpan',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    });
                    table.ajax.reload();
                },
                error: function (response) {
                    alert('Failed to update data.');
                    console.error(response);
                }
            });
        });

        // DELETE OPERATION BUTTON
        let deleteId;
        $(document).on('click', '.deleteButton', function() {
            deleteId = $(this).data('id'); // Perhatikan disini ya kawan-kawanqu, 'id' ini tidak perlu diubah
            $('#deleteModal').modal('show');
            console.log('ID:', deleteId);
        });

        // DELETE OPERATION LOGIC
        $('#confirmDeleteButton').click(function() {
            $.ajax({
                url: 'php/delete_barang.php',
                type: 'POST',
                data: {
                    id_barang: deleteId
                },
                success: function(response) {
                    $('#deleteModal').modal('hide');
                    table.ajax.reload();
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
    });
</script>
</body>
</html>
