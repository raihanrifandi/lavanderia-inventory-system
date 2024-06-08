<?php
include '../../../connection/conn.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_transaksi = $_POST['id_transaksi'];
    $id_barang = $_POST['id_barang'];
    $tanggal_keluar = $_POST['tanggal_keluar'];
    $jumlah_keluar = $_POST['jumlah_keluar'];
    $keterangan = $_POST['keterangan'];

    if (!empty($id_transaksi) && !empty($id_barang) && !empty($tanggal_keluar) && !empty($jumlah_keluar)) {
        // Ambil jumlah_keluar sebelumnya dari database berdasarkan id_transaksi
        $stmt_prev = $conn->prepare("SELECT jumlah_keluar FROM transaksi_barang_keluar WHERE id_transaksi = ?");
        $stmt_prev->bind_param("s", $id_transaksi);
        if ($stmt_prev->execute()) {
            $result_prev = $stmt_prev->get_result();
            $row_prev = $result_prev->fetch_assoc();
            $jumlah_keluar_sebelumnya = $row_prev['jumlah_keluar'];
            $stmt_prev->close();

            // Update data transaksi barang keluar
            $stmt_update_trans = $conn->prepare("UPDATE transaksi_barang_keluar SET tanggal_keluar = ?, jumlah_keluar = ?, keterangan = ? WHERE id_transaksi = ?");
            $stmt_update_trans->bind_param("siss", $tanggal_keluar, $jumlah_keluar, $keterangan, $id_transaksi);
            if ($stmt_update_trans->execute()) {
                echo json_encode(["message" => "Data berhasil diupdate"]);
            } else {
                echo json_encode(["error" => "Gagal mengupdate data transaksi"]);
            }
            $stmt_update_trans->close();
        } else {
            echo json_encode(["error" => "Gagal mengambil data transaksi sebelumnya"]);
        }
    } else {
        echo json_encode(["error" => "Field tidak boleh kosong"]);
    }
}
?>
