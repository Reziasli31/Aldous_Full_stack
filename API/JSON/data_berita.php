<?php

include "../../Konfigurasi/koneksi.php";

header("Content-Type: application/json");

$sql = "SELECT 
            id_berita,
            judul_berita,
            isi_berita,
            Gambar,
            Pembuat,
            Pengedit,
            tanggal_buat,
            tanggal_edit
        FROM berita";

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