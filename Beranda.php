<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: index.php");
    exit();
}

include "Konfigurasi/koneksi.php";

$data = $koneksi->query("SELECT * FROM akun_registrasi");
?>

<!DOCTYPE html>
<html>

<head>
    <title>Beranda</title>
</head>

<body>

    <h2>Selamat Datang <?php echo $_SESSION['username']; ?></h2>

    <hr>

    <a href="Fitur/buat.php">
        <button>Tambah Akun</button>
    </a>

    <a href="index.php">
        <button>Logout</button>
    </a>

    <br><br>

    <table border="1" cellpadding="8">

        <tr>

            <th>ID</th>
            <th>username</th>
            <th>Kode</th>
            <th>Nama Registrasi</th>
            <th>Urutan</th>
            <th>Keterangan</th>
            <th>Status</th>
            <th>Aksi</th>

        </tr>

        <?php while ($row = $data->fetch_assoc()) { ?>

            <tr>

                <td><?= $row['id_registrasi']; ?></td>

                <td><?= $row['username']; ?></td>

                <td><?= $row['kode_registrasi']; ?></td>

                <td><?= $row['nama_registrasi']; ?></td>

                <td><?= $row['urutan_tampil']; ?></td>

                <td><?= $row['keterangan']; ?></td>

                <td><?= $row['proses']; ?></td>

                <td>

                    <a href="Fitur/edit.php?id=<?= $row['id_registrasi'] ?>">
                        <button>Edit</button>
                    </a>
                    <a href="Fitur/hapus.php?id=<?= $row['id_registrasi'] ?>">
                        <button>Hapus</button>
                    </a>

                </td>

            </tr>

        <?php } ?>

    </table>

</body>

</html>