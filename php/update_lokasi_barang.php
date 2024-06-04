<?php
include '../connection/conn.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['action'] == 'update') {
    $id_lokasi = $_POST['id_lokasi'];
    $nama_lokasi = $_POST['nama_lokasi'];
    $keterangan = $_POST['keterangan'];

    if (!empty($nama_lokasi) && !empty($keterangan)) {
        $stmt = $conn->prepare("UPDATE lokasi_barang SET nama_lokasi = ?, keterangan = ? WHERE id_lokasi = ?");
        $stmt->bind_param("ssi", $nama_lokasi, $keterangan, $id_lokasi);

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
