<?php
include '../connection/conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_barang = $_POST['nama_barang'];
    $jenis_barang = $_POST['jenis_barang'];
    $satuan_barang = $_POST['satuan_barang'];
    $lokasi_barang = $_POST['lokasi_barang'];
    $harga = $_POST['harga'];

    // Memeriksa apakah ada gambar yang diunggah
    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
        // Mendapatkan informasi file gambar
        $fileTmpPath = $_FILES['gambar']['tmp_name'];
        $fileName = $_FILES['gambar']['name'];
        $fileSize = $_FILES['gambar']['size'];
        $fileType = $_FILES['gambar']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        // Membatasi jenis file yang diperbolehkan
        $allowedfileExtensions = array('jpg', 'jpeg', 'png');
        if (in_array($fileExtension, $allowedfileExtensions)) {
            // Membaca konten file dan menyimpannya ke variabel
            $gambar = file_get_contents($fileTmpPath);
        } else {
            echo "Hanya file dengan ekstensi JPG, JPEG, dan PNG yang diperbolehkan.";
            exit;
        }
    } else {
        $gambar = null;
        echo "gambar tidak ada";
    }

    // Prepare and execute query
    $query = "INSERT INTO barang (nama_barang, id_jenis, id_satuan, id_lokasi, harga, gambar) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    if ($stmt === false) {
        echo "Error preparing statement: " . $conn->error;
        exit;
    }

    // Mengatur parameter
    $stmt->bind_param("siiiib", $nama_barang, $jenis_barang, $satuan_barang, $lokasi_barang, $harga, $null);
    
    // Menggunakan send_long_data untuk gambar
    $stmt->send_long_data(5, $gambar);

    if ($stmt->execute()) {
        // Pesan sukses atau redirect
        echo "Barang berhasil ditambahkan.";

        // Create a link to open the image in a new tab
        echo '<br><a href="data:image/jpeg;base64,' . base64_encode($gambar) . '" target="_blank">Lihat Gambar</a>';
    } else {
        echo "Error executing statement: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
