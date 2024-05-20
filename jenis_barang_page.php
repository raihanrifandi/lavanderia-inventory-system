<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jenis Barang</title>
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
        .modal {
            display: none; /* Hide modal by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.4); /* Black background with opacity */
        }

        .modal-content {
            background-color: #fefefe;
            margin: 3% auto; /* 10% from the top and centered */
            padding: 20px;
            border: 1px solid #888;
            border-radius: 15px;
            overflow: auto;
            width: 30%; /* Could be more or less, depending on screen size */
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .modal-header {
            padding: 0px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #e5e5e5;
            padding-bottom: 16px;
            text-align: left;
        }

        .modal-header h2 {
            font-size: 18px;
            margin: 0;
        }

        .modal-body {
            padding: 10px 0;
        }

        .modal-footer {
            display: flex;
            justify-content: flex-end;
            padding-top: 100px;
            border-top: 1px solid #e5e5e5;
        }

        #addButton {
            padding: 10px 20px;
            background-color: #2D8DFF;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        #addButton:hover {
            background-color: #555;
        }

        #saveButton, #updateSaveButton {
            padding: 10px 20px;
            background-color: #2D8DFF;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-right: 10px;
        }

        #saveButton, #updateSaveButton:hover {
            background-color: #0056b3;
        }

        #cancelButton, #updateCancelButton {
            padding: 10px 20px;
            background-color: #D9D9D9;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        #cancelButton, #updateCancelButton:hover {
            background-color: #5a6268;
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
    <div id="addModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Tambah Jenis</h2>
                <span class="close">&times;</span>
            </div>
            <div class="modal-body">
                <form id="tambahJenisForm">
                    <label for="jenis">Jenis <span style="color: red;">*</span></label>
                    <input type="text" id="jenis" name="jenis" required>

                    <label for="keterangan">Keterangan <span style="color: red;">*</span></label>
                    <textarea id="keterangan" name="keterangan" rows="4" required></textarea>
                </form>
            </div>
            <div class="modal-footer">
                <button id="saveButton" type="button">Simpan</button>
                <button id="cancelButton" type="button" class="close">Batal</button>
            </div>
        </div>
    </div>

    <!-- Edit Data Modal -->
    <div id="updateModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Update Jenis</h2>
                <span class="close" onclick="closeModal('updateModal')">&times;</span>
            </div>
            <div class="modal-body">
                <form id="updateJenisForm">
                    <label for="updateKodeJenis">Kode Jenis</label>
                    <input type="text" id="updateKodeJenis" name="kodeJenis" readonly style="background-color: #d3d3d3;">

                    <label for="updateJenis">Jenis <span style="color: red;">*</span></label>
                    <input type="text" id="updateJenis" name="jenis" required>

                    <label for="updateKeterangan">Keterangan <span style="color: red;">*</span></label>
                    <textarea id="updateKeterangan" name="keterangan" rows="4" required></textarea>
                </form>
            </div>
            <div class="modal-footer">
                <button id="updateSaveButton" type="button">Simpan</button>
                <button id="updateCancelButton" type="button" class="close">Batal</button>
            </div>
        </div>
    </div>

    <!-- Expand and Minimize Sidebar Menu-->
    <script>
        const toggler = document.querySelector(".btn");
        toggler.addEventListener("click",function(){
        document.querySelector("#sidebar").classList.toggle("collapsed");
        });
    </script>

    <!-- Show Entries from Database -->
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
                                    <button class='btn btn-sm btn-primary btn-update'><i class='fas fa-edit'></i></button>
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
        });
    </script>

<!-- Pop Up Tambah Data -->
<script>
    $(document).ready(function() {
        var modal = $('#addModal');

        // Open modal on button click
        $('#addButton').on('click', function() {
            modal.show();
        });

        // Close modal on close button click or cancel button click
        $('.close').on('click', function() {
            modal.hide();
        });

        // Handle save button click
        $('#saveButton').on('click', function() {
            var jenis = $('#jenis').val();
            var keterangan = $('#keterangan').val();

            // Perform AJAX request to save data
            $.ajax({
                url: 'php/kelola_jenis_barang.php',
                type: 'POST',
                data: {
                    jenis: jenis,
                    keterangan: keterangan
                },
                success: function(response) {
                    alert('Data berhasil disimpan');
                    modal.hide();
                    // Reload data or update the table
                },
                error: function(error) {
                    console.log('Error:', error);
                }
            });
        });

        // Close modal if clicked outside of it
        $(window).on('click', function(event) {
            if (event.target == modal[0]) {
                modal.hide();
            }
        });
    });
</script>

<script>
    $(document).ready(function() {
        var updateModal = $('#updateModal');

        // Open update modal on button click
        $(document).on('click', '.btn-update', function() {
            var row = $(this).closest('tr');
            var kodeJenis = row.find('.kode-jenis').text();
            var jenis = row.find('.jenis').text();
            var keterangan = row.find('.keterangan').text();

            $('#updateKodeJenis').val(kodeJenis);
            $('#updateJenis').val(jenis);
            $('#updateKeterangan').val(keterangan);

            updateModal.show();
        });

        // Close update modal on close button click or cancel button click
        $('.close').on('click', function() {
            updateModal.hide();
        });

        // Handle update save button click
        $('#updateSaveButton').on('click', function() {
            var kodeJenis = $('#updateKodeJenis').val();
            var jenis = $('#updateJenis').val();
            var keterangan = $('#updateKeterangan').val();

            // Perform AJAX request to update data
            $.ajax({
                url: 'php/kelola_jenis_barang.php',
                type: 'POST',
                data: {
                    action: 'update',
                    kodeJenis: kodeJenis,
                    jenis: jenis,
                    keterangan: keterangan
                },
                success: function(response) {
                    alert('Data berhasil diupdate');
                    updateModal.hide();
                },
                error: function(error) {
                    console.log('Error:', error);
                }
            });
        });

        // Close modal if clicked outside of it
        $(window).on('click', function(event) {
            if (event.target == updateModal[0]) {
                updateModal.hide();
            }
        });
    });
</script>
</body>
</html>