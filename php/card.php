<?php
include 'connection/conn.php';

// Fetch total barang yang tersedia dari tabel barang
$sql_barang = "SELECT COUNT(*) as total FROM barang";
$result_barang = $conn->query($sql_barang);
$row_barang = $result_barang->fetch_assoc();
$total_barang = $row_barang['total'];

// Fetch total barang yang masuk dari tabel barang_masuk
$sql_barang_masuk = "SELECT COUNT(*) as total FROM satuan_barang";
$result_barang_masuk = $conn->query($sql_barang_masuk);
$row_barang_masuk = $result_barang_masuk->fetch_assoc();
$total_barang_masuk = $row_barang_masuk['total'];

// Fetch total barang yang keluar dari tabel barang_keluar
$sql_barang_keluar = "SELECT COUNT(*) as total FROM lokasi_barang";
$result_barang_keluar = $conn->query($sql_barang_keluar);
$row_barang_keluar = $result_barang_keluar->fetch_assoc();
$total_barang_keluar = $row_barang_keluar['total'];

$conn->close();
?>
