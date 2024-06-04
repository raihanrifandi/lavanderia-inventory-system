<?php
include '../connection/conn.php';

$id_barang = $_POST['id_barang'];
$nama_barang = $_POST['nama_barang'];
$jenis_barang = $_POST['jenis_barang'];
$satuan_barang = $_POST['satuan_barang'];
$lokasi_barang = $_POST['lokasi_barang'];
$harga = $_POST['harga'];

// Start building the SQL query
$sql = "UPDATE barang SET 
            nama_barang='$nama_barang', 
            id_jenis='$jenis_barang', 
            id_satuan='$satuan_barang', 
            id_lokasi='$lokasi_barang', 
            harga='$harga'";

// Check if an image file is uploaded
if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
    // Get the image content
    $gambar = addslashes(file_get_contents($_FILES['gambar']['tmp_name']));
    $sql .= ", gambar='$gambar'";
}

$sql .= " WHERE id_barang='$id_barang'";

// Execute the query and check for success
if (mysqli_query($conn, $sql)) {
    echo "Data berhasil diupdate!";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>
