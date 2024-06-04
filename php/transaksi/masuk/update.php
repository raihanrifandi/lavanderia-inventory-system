<?php
include '../../../connection/conn.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['action'] == 'update') {
    $id_transaksi = $_POST['id_transaksi'];
    $id_barang = $_POST['id_barang'];
    $tanggal_masuk = $_POST['tanggal_masuk'];
    $jumlah_masuk = $_POST['jumlah_masuk'];
    $keterangan = $_POST['keterangan'];

    if (!empty($id_transaksi) && !empty($id_barang) && !empty($tanggal_masuk) && !empty($jumlah_masuk)) {
        $stmt = $conn->prepare("UPDATE transaksi_barang_masuk SET id_barang = ?, tanggal_masuk = ?, jumlah_masuk = ?, keterangan = ? WHERE id_transaksi = ?");
        $stmt->bind_param("ssiss", $id_barang, $tanggal_masuk, $jumlah_masuk, $keterangan, $id_transaksi);

        if ($stmt->execute()) {
            echo json_encode(["message" => "Data berhasil disimpan"]);
        } else {
            echo json_encode(["error" => "Gagal mengupdate data"]);
        }

        $stmt->close();
    } else {
        echo json_encode(["error" => "Field tidak boleh kosong"]);
    }
} else {
    echo json_encode(["error" => "Request tidak valid"]);
}
?>
