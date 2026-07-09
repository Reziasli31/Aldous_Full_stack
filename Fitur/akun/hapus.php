<?php

require_once "../../konfigurasi/koneksi.php";

if (!isset($_GET['id'])) {
    die("ID tidak ditemukan");
}

$id = intval($_GET['id']);

$sql = "SELECT * FROM akun_registrasi
        WHERE id_registrasi='$id'";

$result = $koneksi->query($sql);

if ($result->num_rows == 0) {
    die("Data tidak ditemukan");
}

$data = $result->fetch_assoc();

?>

<!DOCTYPE html>

<html>

<head>

    <title>Konfirmasi Hapus</title>

</head>

<body>

    <h2>Konfirmasi Hapus Akun</h2>

    <hr>

    <table>

        <tr>
            <td>ID Registrasi</td>
            <td>:</td>
            <td><?= $data['id_registrasi']; ?></td>
        </tr>

        <tr>
            <td>Username</td>
            <td>:</td>
            <td><?= $data['username']; ?></td>
        </tr>

        <tr>
            <td>Nama Registrasi</td>
            <td>:</td>
            <td><?= $data['nama_registrasi']; ?></td>
        </tr>

        <tr>
            <td>Keterangan</td>
            <td>:</td>
            <td><?= $data['keterangan']; ?></td>
        </tr>

    </table>

    <br>

    <b>
        Apakah Anda yakin ingin menghapus akun ini?
    </b>

    <br><br>

    <form action="../../API/CRUD/proses_hapus.php" method="POST">

        <input type="hidden" name="id_registrasi" value="<?= $data['id_registrasi']; ?>">

        <button type="submit">

            Ya, Hapus

        </button>

        <a href="../../beranda.php">

            <button type="button">

                Batal

            </button>

        </a>

    </form>

</body>

</html>