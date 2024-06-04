<?php
include '../connection/conn.php';
session_start();

$sql = "SELECT id_lokasi, nama_lokasi, keterangan FROM lokasi_barang";
$result = $conn->query($sql);

$data = [];

// READ
if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
} else {
    echo "0 results";
}

// Close connection
$conn->close();

// Return data as JSON
echo json_encode($data);

?>