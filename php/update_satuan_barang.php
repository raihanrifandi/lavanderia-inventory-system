<?php
include '../connection/conn.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['action'] == 'update') {
    $id_satuan = $_POST['id_satuan'];
    $satuan = $_POST['satuan'];
    $keterangan = $_POST['keterangan'];

    if (!empty($satuan) && !empty($keterangan)) {
        $stmt = $conn->prepare("UPDATE satuan_barang SET satuan = ?, keterangan = ? WHERE id_satuan = ?");
        $stmt->bind_param("ssi", $satuan, $keterangan, $id_satuan);

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

?>
