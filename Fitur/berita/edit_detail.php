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

    <title><?= $row['judul_berita']; ?></title>

</head>

<body>

    <a href="edit.php">

        <button>
            Kembali
        </button>

    </a>

    <form action="../../API/CRUD/berita_edit.php" method="POST" enctype="multipart/form-data">

        <input type="hidden" name="id_berita" value="<?= $row['id_berita']; ?>">

        <input type="hidden" name="gambar_lama" value="<?= $row['Gambar']; ?>">

        <b>Judul Berita</b>

        <br>

        <input type="text" name="judul_berita" value="<?= htmlspecialchars($row['judul_berita']); ?>"
            style="width:100%;">

        <br><br>

        <b>Gambar Saat Ini</b>

        <br>

        <img src="../../assets/gambar/<?= $row['Gambar']; ?>" width="400">

        <br><br>

        <b>Ganti Gambar</b>

        <br>

        <input type="file" name="gambar">

        <br><br>

        <b>Isi Berita</b>

        <br>

        <textarea name="isi_berita" rows="15" style="width:100%;"><?= $row['isi_berita']; ?></textarea>

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

        <br><br>

        <button type="submit">
            Simpan Perubahan

        </button>
        <a href="edit.php">
            <button type="button">
                Batal
            </button>
        </a>

    </form>

</body>

</html>