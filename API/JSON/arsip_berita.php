<?php

include "../../Konfigurasi/koneksi.php";

header("Content-Type: application/json");

$sql = "SELECT 
            arsip_id_berita,
            id_berita,
            judul_berita,
            isi_berita,
            Gambar,
            Pembuat,
            Pengedit,
            tanggal_buat,
            tanggal_edit,
            aksi,
            pelaku,
            tanggal_aksi
        FROM arsip_berita";

$result = $koneksi->query($sql);

$akun = [];

while($row = $result->fetch_assoc()){
    $akun[] = $row;
}

echo json_encode([
    "status" => "success",
    "jumlah_data" => count($akun),
    "data" => $akun
]);

?>