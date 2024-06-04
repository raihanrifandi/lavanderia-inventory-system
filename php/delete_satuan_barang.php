<?php
include '../connection/conn.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_satuan = $_POST['id_satuan'];

    if (!empty($id_satuan)) {
        $stmt = $conn->prepare("DELETE FROM satuan_barang WHERE id_satuan = ?");
        $stmt->bind_param("i", $id_satuan);

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