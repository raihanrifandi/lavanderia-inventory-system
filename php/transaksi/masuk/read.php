<?php
include '../../../connection/conn.php';
session_start();

$sql = "SELECT 
            bm.tanggal_masuk, 
            bm.id_transaksi, 
            b.id_barang, 
            b.nama_barang, 
            bm.jumlah_masuk, 
            bm.keterangan 
        FROM transaksi_barang_masuk bm 
        JOIN barang b ON bm.id_barang = b.id_barang";

$result = $conn->query($sql);

if (!$result) {
    die("Query failed: " . $conn->error);
}

$data = [];

// READ
if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
} else {
    // Return empty JSON array if no results
    $data = [];
}

// Close connection
$conn->close();

// Encode data as JSON
echo json_encode($data);
?>
