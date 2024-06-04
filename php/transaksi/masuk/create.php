<?php
include '../../../connection/conn.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_transaksi = $_POST['id_transaksi'];
    $id_barang = $_POST['id_barang'];
    $tanggal_masuk = $_POST['tanggal_masuk'];
    $jumlah_masuk = $_POST['jumlah_masuk'];
    $keterangan = $_POST['keterangan'];

    if (!empty($id_transaksi) && !empty($id_barang) && !empty($tanggal_masuk) && !empty($jumlah_masuk)) {
        $stmt = $conn->prepare("INSERT INTO transaksi_barang_masuk (id_transaksi, id_barang, tanggal_masuk, jumlah_masuk, keterangan) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssis", $id_transaksi, $id_barang, $tanggal_masuk, $jumlah_masuk, $keterangan);

        if ($stmt->execute()) {
            echo json_encode(["message" => "Data berhasil disimpan"]);
        } else {
            echo json_encode(["error" => "Gagal menyimpan data"]);
        }

        $stmt->close();
    } else {
        echo json_encode(["error" => "Field tidak boleh kosong"]);
    }
}
?>
