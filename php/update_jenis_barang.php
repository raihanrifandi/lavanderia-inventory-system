<?php
include '../connection/conn.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['action'] == 'update') {
    $kodeJenis = $_POST['id_jenis'];
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

?>
