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

</head>


<body>


<h2>Daftar Berita</h2>

<hr>


<?php while($row = $data->fetch_assoc()){ ?>


<a href="detail_berita.php?id=<?= $row['id_berita']; ?>"
style="text-decoration:none;color:black;">


<table width="100%" border="1" cellpadding="10">

<tr>


<!-- GAMBAR KIRI -->

<td width="200">

<img src="assets/gambar/<?= $row['Gambar']; ?>"
width="180"
height="120">

</td>


<!-- ISI KANAN -->

<td>


<h2>

<?= $row['judul_berita']; ?>

</h2>


<p style="text-align:justify;">

<?= substr($row['isi_berita'],0,250); ?>

...

</p>


<br>


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