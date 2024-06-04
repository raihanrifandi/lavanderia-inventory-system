<?php
include '../connection/conn.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_lokasi = $_POST['id_lokasi'];

    if (!empty($id_lokasi)) {
        $stmt = $conn->prepare("DELETE FROM lokasi_barang WHERE id_lokasi = ?");
        $stmt->bind_param("i", $id_lokasi);

        if ($stmt->execute()) {
            echo json_encode(["message" => "Data berhasil dihapus"]);
        } else {
            echo json_encode(["error" => "Gagal menghapus data"]);
        }
        $stmt->close();
    } else {
        echo json_encode(["error" => "ID tidak boleh kosong"]);
    }
}
?>