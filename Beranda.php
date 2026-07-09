<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: index.php");
    exit();
}

include "Konfigurasi/koneksi.php";
include "Navigasi/topbar.php";

// Hitung total akun
$total_query = $koneksi->query("
    SELECT COUNT(*) AS total 
    FROM akun_registrasi
");

$total_data = $total_query->fetch_assoc()['total'];

// Hitung total akun yang sudah dihapus
$arsip_query = $koneksi->query("
    SELECT COUNT(*) AS total_arsip
    FROM arsip_registrasi
");

$total_arsip = $arsip_query->fetch_assoc()['total_arsip'];


// Jumlah data per halaman
$limit = 5;


// Ambil halaman sekarang
if (isset($_GET['halaman'])) {

    $halaman = $_GET['halaman'];

} else {

    $halaman = 1;

}


// Hitung data awal
$awal = ($halaman - 1) * $limit;


// Ambil data sesuai halaman
$data = $koneksi->query("
    SELECT * FROM akun_registrasi
    ORDER BY id_registrasi ASC
    LIMIT $awal,$limit
");
?>

<!DOCTYPE html>
<html>

<head>
    <title>Beranda</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

    <h2>
        Selamat Datang

        <?php echo $_SESSION['username']; ?>

    </h2>

    <hr>

    <a href="Fitur/Akun/buat.php">

        <button>

            Tambah Akun

        </button>

    </a>

    <br><br>
    <table border="1" cellpadding="8">

        <tr>

            <td>
                <b>Total Akun Aktif</b>
                <br>
                <?= $total_data; ?>
            </td>


            <td>
                <b>Total Akun Dihapus</b>
                <br>
                <?= $total_arsip; ?>
            </td>

        </tr>

    </table>
    <table border="1" cellpadding="8">

        <tr>

            <th>ID</th>
            <th>Username</th>
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

                    <a href="Fitur/Akun/edit.php?id=<?= $row['id_registrasi'] ?>">

                        <button>Edit</button>

                    </a>

                    <a href="Fitur/Akun/hapus.php?id=<?= $row['id_registrasi'] ?>">

                        <button>Hapus</button>

                    </a>

                </td>

            </tr>

        <?php } ?>

    </table>

</body>
<br>

<?php

$total_halaman = ceil($total_data / $limit);

?>


<?php if ($halaman > 1) { ?>

    <a href="?halaman=<?= $halaman - 1; ?>">

        <button>
            Kembali
        </button>

    </a>

<?php } ?>


<?php for ($i = 1; $i <= $total_halaman; $i++) { ?>

    <a href="?halaman=<?= $i; ?>">

        <button>
            <?= $i; ?>
        </button>

    </a>

<?php } ?>


<?php if ($halaman < $total_halaman) { ?>

    <a href="?halaman=<?= $halaman + 1; ?>">

        <button>
            Selanjutnya
        </button>

    </a>

<?php } ?>

</html>