<?php

include "../../Konfigurasi/koneksi.php";


$data=$koneksi->query(

"SELECT *

FROM berita

ORDER BY tanggal_buat DESC

LIMIT 1"

);



$row=$data->fetch_assoc();


echo json_encode($row);


?>