<?php
include '../connection/conn.php';
session_start();

$sql = "SELECT id_satuan, satuan, keterangan FROM satuan_barang";
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

// Encode data as JSON
$json_data = json_encode($data);

echo($json_data);
?>