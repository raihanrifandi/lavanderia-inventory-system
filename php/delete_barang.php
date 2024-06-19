<?php
include '../connection/conn.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_barang = $_POST['id_barang'];

    if (!empty($id_barang)) {
        // Pengecekan relasi di tabel transaksi_barang_keluar
        $stmt = $conn->prepare("SELECT COUNT(*) as count FROM transaksi_barang_keluar WHERE id_barang = ?");
        $stmt->bind_param("s", $id_barang);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $count_keluar = $row['count'];
        $stmt->close();

        // Pengecekan relasi di tabel transaksi_barang_masuk
        $stmt = $conn->prepare("SELECT COUNT(*) as count FROM transaksi_barang_masuk WHERE id_barang = ?");
        $stmt->bind_param("s", $id_barang);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $count_masuk = $row['count'];
        $stmt->close();

        // Jika ada data yang terkait di salah satu tabel, kembalikan pesan error
        if ($count_keluar > 0 || $count_masuk > 0) {
            echo json_encode(["error" => "Data tidak dapat dihapus karena memiliki riwayat transaksi barang keluar atau masuk"]);
        } else {
            // Jika tidak ada data yang terkait, lakukan penghapusan
            $stmt = $conn->prepare("DELETE FROM barang WHERE id_barang = ?");
            $stmt->bind_param("s", $id_barang);

            if ($stmt->execute()) {
                echo json_encode(["message" => "Data berhasil dihapus"]);
            } else {
                echo json_encode(["error" => "Gagal menghapus data"]);
            }
            $stmt->close();
        }
    } else {
        echo json_encode(["error" => "ID tidak boleh kosong"]);
    }
}
?>
