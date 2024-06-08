<?php
include '../../../connection/conn.php';
session_start();

$startDate = isset($_GET['startDate']) ? $_GET['startDate'] : '';
$endDate = isset($_GET['endDate']) ? $_GET['endDate'] : '';

$sql = "SELECT 
            bm.tanggal_keluar, 
            bm.id_transaksi, 
            b.id_barang, 
            b.nama_barang, 
            bm.jumlah_keluar, 
            bm.keterangan 
        FROM transaksi_barang_keluar bm 
        JOIN barang b ON bm.id_barang = b.id_barang";

if (!empty($startDate) && !empty($endDate)) {
    $sql .= " WHERE bm.tanggal_keluar BETWEEN '$startDate' AND '$endDate'";
}

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
