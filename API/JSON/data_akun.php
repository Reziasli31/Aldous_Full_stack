<?php

include "koneksi.php";

header("Content-Type: application/json");

$sql = "SELECT 
            id_registrasi,
            kode_registrasi,
            nama_registrasi,
            Username,
            urutan_tampil,
            keterangan,
            proses,
            created_at
        FROM akun_registrasi";

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