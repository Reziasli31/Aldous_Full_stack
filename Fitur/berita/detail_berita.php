<?php

include "../../Konfigurasi/koneksi.php";
include "../../Navigasi/topbar.php";


$id = $_GET['id'];



$data = $koneksi->query(
    "SELECT * FROM berita 
     WHERE id_berita='$id'"
);



$row = $data->fetch_assoc();



if (!$row) {

    die("Berita tidak ditemukan");

}


?>


<!DOCTYPE html>
<html>


<head>

    <title>
        <?= $row['judul_berita']; ?>
    </title>


</head>


<body>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <a href="../../berita.php">

        <button>
            Kembali ke Berita
        </button>

    </a>



    <h1>

        <?= $row['judul_berita']; ?>

    </h1>


    <hr>



    <img src="../../assets/gambar/<?= $row['Gambar']; ?>" width="400">



    <br><br>



    <p style="text-align:justify;">


        <?= nl2br($row['isi_berita']); ?>


    </p>



    <br>


    <hr>



    <b>Tanggal Dibuat :</b>

    <?= $row['tanggal_buat']; ?>


    <br>


    <b>Pembuat :</b>

    <?= $row['pembuat']; ?>


    <br>



    <b>Pengedit :</b>

    <?= empty($row['pengedit']) ? '-' : $row['pengedit']; ?>


    <br>



    <b>Tanggal Edit :</b>

    <?= empty($row['tanggal_edit']) ? '-' : $row['tanggal_edit']; ?>



</body>


</html>