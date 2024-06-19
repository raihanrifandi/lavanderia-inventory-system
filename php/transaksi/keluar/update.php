<?php
include '../../../connection/conn.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_transaksi = $_POST['id_transaksi'];
    $id_barang = $_POST['id_barang'];
    $tanggal_keluar = $_POST['tanggal_keluar'];
    $jumlah_keluar = $_POST['jumlah_keluar'];
    $keterangan = $_POST['keterangan'];

    if (!empty($id_transaksi) && !empty($id_barang) && !empty($tanggal_keluar) && isset($jumlah_keluar)) {
        // Ambil stok_awal dari database berdasarkan id_barang
        $stmt_stock = $conn->prepare("SELECT stok_awal FROM barang WHERE id_barang = ?");
        $stmt_stock->bind_param("s", $id_barang);
        if ($stmt_stock->execute()) {
            $result_stock = $stmt_stock->get_result();
            $row_stock = $result_stock->fetch_assoc();
            $stok_awal = $row_stock['stok_awal'];
            $stmt_stock->close();

            // Ambil jumlah_keluar sebelumnya dari database berdasarkan id_transaksi
            $stmt_prev = $conn->prepare("SELECT jumlah_keluar FROM transaksi_barang_keluar WHERE id_transaksi = ?");
            $stmt_prev->bind_param("s", $id_transaksi);
            if ($stmt_prev->execute()) {
                $result_prev = $stmt_prev->get_result();
                $row_prev = $result_prev->fetch_assoc();
                $jumlah_keluar_sebelumnya = $row_prev['jumlah_keluar'];
                $stmt_prev->close();

                // Hitung selisih jumlah_keluar dengan jumlah_keluar_sebelumnya
                $selisih_jumlah_keluar = $jumlah_keluar - $jumlah_keluar_sebelumnya;

                // Periksa apakah jumlah barang yang keluar melebihi stok awal setelah perubahan
                if ($jumlah_keluar > $stok_awal + $selisih_jumlah_keluar) {
                    echo json_encode(["error" => "Jumlah barang keluar melebihi stok awal setelah perubahan"]);
                } else {
                    // Update data transaksi barang keluar
                    $stmt_update_trans = $conn->prepare("UPDATE transaksi_barang_keluar SET tanggal_keluar = ?, jumlah_keluar = ?, keterangan = ? WHERE id_transaksi = ?");
                    $stmt_update_trans->bind_param("siss", $tanggal_keluar, $jumlah_keluar, $keterangan, $id_transaksi);
                    if ($stmt_update_trans->execute()) {
                        // Update stok_awal barang di tabel barang
                        $new_stok_awal = $stok_awal - $selisih_jumlah_keluar;
                        $stmt_update_barang = $conn->prepare("UPDATE barang SET stok_awal = ? WHERE id_barang = ?");
                        $stmt_update_barang->bind_param("is", $new_stok_awal, $id_barang);
                        if ($stmt_update_barang->execute()) {
                            echo json_encode(["message" => "Data berhasil diupdate"]);
                        } else {
                            echo json_encode(["error" => "Gagal mengupdate stok barang"]);
                        }
                        $stmt_update_barang->close();
                    } else {
                        echo json_encode(["error" => "Gagal mengupdate data transaksi"]);
                    }
                    $stmt_update_trans->close();
                }
            } else {
                echo json_encode(["error" => "Gagal mengambil data transaksi sebelumnya"]);
            }
        } else {
            echo json_encode(["error" => "Gagal mengambil stok awal"]);
        }
    } else {
        echo json_encode(["error" => "Field tidak boleh kosong"]);
    }
}
?>