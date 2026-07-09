<?php

include "Konfigurasi/koneksi.php";


$data = $koneksi->query(

"SELECT * FROM berita
ORDER BY tanggal_buat DESC"

);

?>


<!DOCTYPE html>
<html>

<head>

<title>Berita</title>

<link rel="stylesheet" href="assets/css/style.css">

</head>


<body>


<table class="topbar" width="100%" cellpadding="8">

<tr>


<td class="menu">


<a href="pengunjung.php">
Beranda
</a>


|

<a href="berita_pengunjung.php">
Berita
</a>


</td>


<td width="120" align="center">


<a href="index.php">

<button>
Login
</button>

</a>


</td>


</tr>

</table>



<h2>

Daftar Berita

</h2>


<hr>



<?php while($row=$data->fetch_assoc()){ ?>



<a href="Fitur/berita/detail_pengunjung.php?id=<?= $row['id_berita']; ?>">



<table width="100%" border="1" cellpadding="10">


<tr>


<td width="200">


<img src="assets/gambar/<?= $row['Gambar']; ?>"
width="180"
height="120">


</td>


<td>


<h2>

<?= $row['judul_berita']; ?>

</h2>


<p style="text-align:justify;">

<?= substr($row['isi_berita'],0,250); ?>

...

</p>


<b>

Tanggal:

</b>

<?= $row['tanggal_buat']; ?>


<br>


<b>

Pembuat:

</b>

<?= $row['pembuat']; ?>


</td>


</tr>


</table>


</a>


<br>



<?php } ?>


</body>

</html>