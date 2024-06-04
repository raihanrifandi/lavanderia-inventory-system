<?php
include '../../../connection/conn.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_transaksi = $_POST['id_transaksi'];

    if (!empty($id_transaksi)) {
        $stmt = $conn->prepare("DELETE FROM transaksi_barang_masuk WHERE id_transaksi = ?");
        $stmt->bind_param("s", $id_transaksi);

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