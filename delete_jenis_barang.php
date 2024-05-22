<?php
include '../connection/conn.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_jenis = $_POST['id_jenis'];

    if (!empty($id_jenis)) {
        $stmt = $conn->prepare("DELETE FROM jenis_barang WHERE id_jenis = ?");
        $stmt->bind_param("i", $id_jenis);

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