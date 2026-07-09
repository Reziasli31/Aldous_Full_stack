<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");


include "../../Konfigurasi/koneksi.php";


$data = $koneksi->query(

"SELECT 
nama_registrasi,
username,
urutan_tampil,
created_at

FROM akun_registrasi

ORDER BY created_at DESC

LIMIT 3"

);


$result=[];


while($row=$data->fetch_assoc()){

    $result[]=$row;

}


echo json_encode($result);


?>