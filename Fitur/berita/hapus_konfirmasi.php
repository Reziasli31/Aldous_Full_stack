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

    <title>Hapus Berita</title>

</head>

<body>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <a href="hapus.php">

        <button>

            Kembali

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

    <hr>

    <b>Tanggal :</b>

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

    <hr>

    <h3>

        Yakin menghapus berita ini?

    </h3>

    <form action="../../API/CRUD/berita_hapus.php" method="POST">

        <input type="hidden" name="id_berita" value="<?= $row['id_berita']; ?>">

        <button type="submit">

            Hapus

        </button>

        <a href="hapus.php">

            <button type="button">

                Batal

            </button>

        </a>

    </form>

</body>

</html>