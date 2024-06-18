<?php
include '../../../connection/conn.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['action'] == 'update') {
    $id_transaksi = $_POST['id_transaksi'];
    $id_barang = $_POST['id_barang'];
    $tanggal_masuk = $_POST['tanggal_masuk'];
    $jumlah_masuk = $_POST['jumlah_masuk'];
    $keterangan = $_POST['keterangan'];

    if (!empty($id_transaksi) && !empty($id_barang) && !empty($tanggal_masuk) && isset($jumlah_masuk)) {
        // Ambil stok_awal dari database berdasarkan id_barang
        $stmt_stock = $conn->prepare("SELECT stok_awal FROM barang WHERE id_barang = ?");
        $stmt_stock->bind_param("s", $id_barang);
        if ($stmt_stock->execute()) {
            $result_stock = $stmt_stock->get_result();
            $row_stock = $result_stock->fetch_assoc();
            $stok_awal = $row_stock['stok_awal'];
            $stmt_stock->close();

            // Ambil jumlah_masuk sebelumnya dari database berdasarkan id_transaksi
            $stmt_prev = $conn->prepare("SELECT jumlah_masuk FROM transaksi_barang_masuk WHERE id_transaksi = ?");
            $stmt_prev->bind_param("s", $id_transaksi);
            if ($stmt_prev->execute()) {
                $result_prev = $stmt_prev->get_result();
                $row_prev = $result_prev->fetch_assoc();
                $jumlah_masuk_sebelumnya = $row_prev['jumlah_masuk'];
                $stmt_prev->close();

                // Hitung selisih jumlah_masuk dengan jumlah_masuk_sebelumnya
                $selisih_jumlah_masuk = $jumlah_masuk - $jumlah_masuk_sebelumnya ;

                // Periksa apakah stok akan menjadi negatif setelah pengurangan jumlah_masuk
                if ($stok_awal + $selisih_jumlah_masuk < 0) {
                    echo json_encode(["error" => "Stok tidak boleh menjadi negatif"]);
                } else {
                    // Update data transaksi barang masuk
                    $stmt_update_trans = $conn->prepare("UPDATE transaksi_barang_masuk SET id_barang = ?, tanggal_masuk = ?, jumlah_masuk = ?, keterangan = ? WHERE id_transaksi = ?");
                    $stmt_update_trans->bind_param("ssiss", $id_barang, $tanggal_masuk, $jumlah_masuk, $keterangan, $id_transaksi);
                    if ($stmt_update_trans->execute()) {
                        // Update stok_awal barang di tabel barang
                        $new_stok_awal = $stok_awal + $selisih_jumlah_masuk;
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
} else {
    echo json_encode(["error" => "Request tidak valid"]);
}
?>
