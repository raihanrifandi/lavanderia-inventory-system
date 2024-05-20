<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lavanderia Inventory System - Jenis Barang</title>
     <!-- Bootstrap JS and dependencies -->
     <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles/style.css">
    <style>
        .table-wrapper {
            margin: 20px;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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
                    <li class="sidebar-header">MENU</li>
                    <li class="sidebar-item">
                        <a href="dashboard_admin.php" class="sidebar-link">
                            <i class="fa-solid fa-list pe-2"></i> Dashboard
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#pages" aria-expanded="false" aria-controls="pages">
                            <i class="fa-regular fa-file-lines pe-2"></i> Master Barang
                        </a>
                        <ul id="pages" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item"><a href="#" class="sidebar-link">Jenis</a></li>
                            <li class="sidebar-item"><a href="#" class="sidebar-link">Satuan</a></li>
                            <li class="sidebar-item"><a href="#" class="sidebar-link">Lokasi</a></li>
                            <li class="sidebar-item"><a href="#" class="sidebar-link">Barang</a></li>
                        </ul>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#dashboard" aria-expanded="false" aria-controls="dashboard">
                            <i class="fa-solid fa-sliders pe-2"></i> Transaksi
                        </a>
                        <ul id="dashboard" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item"><a href="#" class="sidebar-link">Barang Masuk</a></li>
                            <li class="sidebar-item"><a href="#" class="sidebar-link">Barang Keluar</a></li>
                        </ul>
                    </li>
                    <br><br><br><br>
                    <li class="sidebar-header">OTHER</li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link">
                            <i class="fa-solid fa-list pe-2"></i> Settings
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link">
                            <i class="fa-solid fa-list pe-2"></i> Logout
                        </a>
                    </li>
                </ul>
            </div>
        </aside>
        <!-- Main Content -->
        <div class="main">
            <nav class="navbar navbar-expand px-3 border-bottom">
                <!-- Button for sidebar toggle -->
                <button class="btn" type="button" data-bs-theme="dark">
                    tombol expand
                    <span class="navbar-toggler-icon"></span>
                </button>
            </nav>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="table-wrapper">
                            <div class="table-header">
                                <h3>Data Jenis Barang</h3>
                                <button id="addButton" class="btn btn-primary">Tambah Data +</button>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between mb-3">
                                <div>
                                    <label>Show 
                                        <select name="entries" id="entries" class="custom-select custom-select-sm form-control form-control-sm">
                                            <option value="5">5</option>
                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                        </select> 
                                        entries
                                    </label>
                                </div>
                                <div>
                                    <input type="text" id="search" class="form-control" placeholder="Search:">
                                </div>
                            </div>
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>JENIS</th>
                                        <th>KETERANGAN</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody id="jenisBarangTableBody">
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-between">
                                <div id="entriesInfo">Showing 1 to 3 of 3 entries</div>
                                <div>
                                    <nav>
                                        <ul class="pagination pagination-sm">
                                            <li class="page-item disabled">
                                                <a class="page-link" href="#" tabindex="-1">Previous</a>
                                            </li>
                                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">Next</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
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
                    <h2 class="modal-title" id="addModalLabel">Tambah Jenis</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="tambahJenisForm">
                        <div class="form-group">
                            <label for="jenis">Jenis <span style="color: red;">*</span></label>
                            <input type="text" class="form-control" id="jenis" name="jenis" required>
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan <span style="color: red;">*</span></label>
                            <textarea class="form-control" id="keterangan" name="keterangan" rows="4" required></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" id="saveButton" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Data Pop Up -->
    <div id="editModal" class="modal fade" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title" id="editModalLabel">Edit Jenis</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editJenisForm">
                        <input type="hidden" id="editIdJenis" name="id_jenis">
                        <div class="form-group">
                            <label for="editJenis">Jenis <span style="color: red;">*</span></label>
                            <input type="text" class="form-control" id="editJenis" name="jenis" required>
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

    <!-- jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    <script>

    <script>
        const toggler = document.querySelector(".btn");
        toggler.addEventListener("click",function(){
        document.querySelector("#sidebar").classList.toggle("collapsed");
        });
    </script>    

    <script>
        $(document).ready(function() {
            // Fetch data from kelola_jenis_barang.php
            $.ajax({
                url: 'php/kelola_jenis_barang.php',
                type: 'GET',
                success: function(response) {
                    // Parse JSON data
                    const data = JSON.parse(response);
                    // Populate table body
                    const tbody = $('#jenisBarangTableBody');
                    data.forEach((item, index) => {
                        tbody.append(`
                            <tr>
                                <td>${index + 1}</td>
                                <td>${item.jenis}</td>
                                <td>${item.keterangan}</td>
                                <td>
                                    <button class='btn btn-sm btn-primary editButton' data-id='${item.id_jenis}' data-jenis='${item.jenis}' data-keterangan='${item.keterangan}'><i class='fas fa-edit'></i></button>
                                    <button class='btn btn-sm btn-danger'><i class='fas fa-trash'></i></button>
                                </td>
                            </tr>
                        `);
                    });
                    // Update entries info
                    $('#entriesInfo').text(`Showing 1 to ${data.length} of ${data.length} entries`);
                },
                error: function(error) {
                    console.log('Error fetching data', error);
                }
            });

            // Show the modal for adding new entry
            $('#addButton').click(function() {
                $('#addModal').modal('show');
            });

            // Save new entry
            $('#saveButton').click(function() {
                const jenis = $('#jenis').val();
                const keterangan = $('#keterangan').val();

                $.ajax({
                    url: 'php/kelola_jenis_barang.php',
                    type: 'POST',
                    data: {
                        jenis: jenis,
                        keterangan: keterangan
                    },
                    success: function(response) {
                        // Reload the page or fetch the data again to show the new entry
                        location.reload();
                    },
                    error: function(error) {
                        console.log('Error adding data', error);
                    }
                });
            });

            // Show the modal for editing entry
            $(document).on('click', '.editButton', function() {
                const idJenis = $(this).data('id');
                const jenis = $(this).data('jenis');
                const keterangan = $(this).data('keterangan');

                $('#editIdJenis').val(idJenis);
                $('#editJenis').val(jenis);
                $('#editKeterangan').val(keterangan);

                $('#editModal').modal('show');
            });

            // Update entry
            $('#updateButton').click(function() {
                const idJenis = $('#editIdJenis').val();
                const jenis = $('#editJenis').val();
                const keterangan = $('#editKeterangan').val();

                $.ajax({
                    url: 'php/kelola_jenis_barang.php',
                    type: 'POST',
                    data: {
                        id_jenis: idJenis,
                        jenis: jenis,
                        keterangan: keterangan
                    },
                    success: function(response) {
                        // Reload the page or fetch the data again to show the updated entry
                        location.reload();
                    },
                    error: function(error) {
                        console.log('Error updating data', error);
                    }
                });
            });

            $('.close, .btn-secondary').click(function() {
                $('#addModal').modal('hide');
                $('#editModal').modal('hide');
             });
        });
    </script>
</body>
</html>