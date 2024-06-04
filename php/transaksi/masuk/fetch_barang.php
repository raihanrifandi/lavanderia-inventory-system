<?php
include '../../../connection/conn.php';
session_start();

$id_barang = isset($_GET['id_barang']) ? $_GET['id_barang'] : die();

$query = "SELECT barang.nama_barang, jenis.jenis, satuan.satuan, lokasi.nama_lokasi 
              FROM barang 
              INNER JOIN jenis ON barang.id_jenis = jenis.id_jenis
              INNER JOIN satuan ON barang.id_satuan = satuan.id_satuan
              INNER JOIN lokasi ON barang.id_lokasi = lokasi.id_lokasi
              WHERE barang.id_barang = :id_barang";
$stmt = $conn->prepare($query);
$stmt->bindParam(':id_barang', $id_barang);
$stmt->execute();

$barang = $stmt->fetch(PDO::FETCH_ASSOC);

echo json_encode($barang);
?>