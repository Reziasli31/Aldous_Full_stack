<?php

include "../../Konfigurasi/koneksi.php";


$id = $_GET['id'];



$data = $koneksi->query(

    "SELECT * FROM berita
     WHERE id_berita='$id'"

);



$row = $data->fetch_assoc();



if(!$row){

    die("Berita tidak ditemukan");

}


?>


<!DOCTYPE html>
<html>


<head>

<title>
<?= $row['judul_berita']; ?>
</title>


<link rel="stylesheet" href="../../assets/css/style.css">


</head>



<body>


<a href="../../berita_pengunjung.php">

<button>

Kembali ke Berita

</button>

</a>



<h1>

<?= $row['judul_berita']; ?>

</h1>


<hr>



<img src="../../assets/gambar/<?= $row['Gambar']; ?>"
width="400">



<br><br>



<p style="text-align:justify;">

<?= nl2br($row['isi_berita']); ?>

</p>



<hr>



<b>Tanggal Dibuat :</b>

<?= $row['tanggal_buat']; ?>


<br>


<b>Pembuat :</b>

<?= $row['pembuat']; ?>


<br>


</body>


</html>