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
        // Ambil stok_awal dari database berdasarkan id_barang
        $stmt_stock = $conn->prepare("SELECT stok_awal FROM barang WHERE id_barang = ?");
        $stmt_stock->bind_param("s", $id_barang);
        if ($stmt_stock->execute()) {
            $result_stock = $stmt_stock->get_result();
            $row_stock = $result_stock->fetch_assoc();
            $stok_awal = $row_stock['stok_awal'];

            // Periksa apakah jumlah barang yang keluar melebihi stok awal
            if ($jumlah_keluar > $stok_awal) {
                echo json_encode(["error" => "Jumlah barang keluar melebihi stok awal"]);
            } else {
                // Simpan data transaksi barang keluar ke dalam database
                $stmt_insert = $conn->prepare("INSERT INTO transaksi_barang_keluar (id_transaksi, id_barang, tanggal_keluar, jumlah_keluar, keterangan) VALUES (?, ?, ?, ?, ?)");
                $stmt_insert->bind_param("sssis", $id_transaksi, $id_barang, $tanggal_keluar, $jumlah_keluar, $keterangan);

                if ($stmt_insert->execute()) {
                    echo json_encode(["message" => "Data berhasil disimpan"]);
                } else {
                    echo json_encode(["error" => "Gagal menyimpan data"]);
                }

                $stmt_insert->close();
            }
        } else {
            echo json_encode(["error" => "Gagal mengambil stok awal"]);
        }

        $stmt_stock->close();
    } else {
        echo json_encode(["error" => "Field tidak boleh kosong"]);
    }
}
?>
