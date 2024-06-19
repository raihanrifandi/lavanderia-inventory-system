<?php
include '../../../connection/conn.php';
session_start();

if (isset($_GET['id_barang'])) {
    $idBarang = $_GET['id_barang'];

    // Query untuk mengambil detail barang beserta nama satuan, jenis, dan lokasi
    $query = "SELECT barang.nama_barang, satuan.satuan, jenis.jenis, lokasi.nama_lokasi 
              FROM barang 
              JOIN satuan ON barang.id_satuan = satuan.id_satuan 
              JOIN jenis ON barang.id_jenis = jenis.id_jenis 
              JOIN lokasi ON barang.id_lokasi = lokasi.id_lokasi 
              WHERE barang.id_barang = :id_barang";
    
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id_barang', $idBarang, PDO::PARAM_INT);
    $stmt->execute();

    // Ambil hasil query
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        // Kembalikan hasil dalam format JSON
        echo json_encode($result);
    } else {
        echo json_encode(['error' => 'Barang tidak ditemukan']);
    }
} else {
    echo json_encode(['error' => 'ID barang tidak diberikan']);
}
?>