<?php
include '../connection/conn.php';
session_start();

// Query untuk mendapatkan data dengan join
$sql = "SELECT 
            b.id_barang, 
            b.nama_barang, 
            b.stok_awal as stok_awal,
            b.harga as harga,
            s.satuan as satuan_barang,
            j.jenis as jenis_barang, 
            l.nama_lokasi as lokasi_barang,
            b.gambar as gambar
        FROM 
            barang b
        JOIN 
            satuan_barang s ON b.id_satuan = s.id_satuan
        JOIN 
            jenis_barang j ON b.id_jenis = j.id_jenis
        JOIN 
            lokasi_barang l ON b.id_lokasi = l.id_lokasi";

$result = $conn->query($sql);

$data = array();
while ($row = $result->fetch_assoc()) {
    // Encode data gambar dalam format base64 jika ada
    if (!empty($row['gambar'])) {
        $row['gambar'] = base64_encode($row['gambar']);
    }
    $data[] = $row;
}

$conn->close();

// Mengatur header konten sebagai JSON dan mengeluarkan data
header('Content-Type: application/json');
echo json_encode($data, JSON_UNESCAPED_UNICODE);
?>
