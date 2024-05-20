<?php
include '../connection/conn.php';
session_start();

$sql = "SELECT id_jenis, jenis, keterangan FROM jenis_barang";
$result = $conn->query($sql);

// Initialize an array to store the data
$data = [];

// CREATE
// Memeriksa apakah data dikirim melalui metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari form
    $jenis = $_POST['jenis'];
    $keterangan = $_POST['keterangan'];

    // Memeriksa apakah field tidak kosong
    if (!empty($jenis) && !empty($keterangan)) {
        // Menyiapkan statement SQL untuk mencegah SQL injection
        $stmt = $conn->prepare("INSERT INTO jenis_barang (jenis, keterangan) VALUES (?, ?)");
        $stmt->bind_param("ss", $jenis, $keterangan);

        // Menjalankan query
        if ($stmt->execute()) {
            echo json_encode(["message" => "Data berhasil disimpan"]);
        } else {
            echo json_encode(["error" => "Gagal menyimpan data"]);
        }

        // Menutup query
        $stmt->close();
    } else {
        echo json_encode(["error" => "Field tidak boleh kosong"]);
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['action'] == 'update') {
    $kodeJenis = $_POST['idJenis'];
    $jenis = $_POST['jenis'];
    $keterangan = $_POST['keterangan'];

    if (!empty($jenis) && !empty($keterangan)) {
        $stmt = $conn->prepare("UPDATE jenis_barang SET jenis = ?, keterangan = ? WHERE id_jenis = ?");
        $stmt->bind_param("ssi", $jenis, $keterangan, $kodeJenis);

        if ($stmt->execute()) {
            echo json_encode(["message" => "Data berhasil diupdate"]);
        } else {
            echo json_encode(["error" => "Gagal mengupdate data"]);
        }
        $stmt->close();
    } else {
        echo json_encode(["error" => "Field tidak boleh kosong"]);
    }
}

// READ
if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
} else {
    echo "0 results";
}

// UPDATE


// DELETE



// Close connection
$conn->close();

// Return data as JSON
echo json_encode($data);

?>