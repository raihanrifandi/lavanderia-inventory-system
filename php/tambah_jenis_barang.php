<?php
include '../connection/conn.php';
session_start();

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

?>