<?php
include '../connection/conn.php';
session_start();

// CREATE
// Memeriksa apakah data dikirim melalui metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari form
    $satuan = $_POST['satuan'];
    $keterangan = $_POST['keterangan'];

    // Memeriksa apakah field tidak kosong
    if (!empty($satuan) && !empty($keterangan)) {
        // Menyiapkan statement SQL untuk mencegah SQL injection
        $stmt = $conn->prepare("INSERT INTO satuan_barang (satuan, keterangan) VALUES (?, ?)");
        $stmt->bind_param("ss", $satuan, $keterangan);

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

?>