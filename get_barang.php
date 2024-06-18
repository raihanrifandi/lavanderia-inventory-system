<?php
include 'connection/conn.php'; // koneksi ke database

$query = "SELECT id_barang, nama_barang FROM barang";
$result = mysqli_query($conn, $query);

$barang = array();
while($row = mysqli_fetch_assoc($result)) {
    $barang[] = $row;
}

echo json_encode($barang);
?>
