<?php

include "Konfigurasi/koneksi.php";
include "Navigasi/topbar.php";
$data = $koneksi->query(
    "SELECT * FROM berita
     ORDER BY tanggal_buat DESC"
);

?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        .dropdown {
            position: relative;
            display: inline-block;
        }


        .dropbtn {

            padding: 8px 15px;
            cursor: pointer;

        }


        /* isi dropdown */

        .dropdown-content {

            display: none;
            position: absolute;
            background-color: white;
            border: 1px solid black;
            min-width: 150px;

        }


        /* pilihan */

        .dropdown-content a {

            display: block;
            padding: 8px;
            text-decoration: none;
            color: black;

        }


        /* saat diarahkan */

        .dropdown-content a:hover {

            background-color: #ddd;

        }


        /* munculkan menu */

        .dropdown:hover .dropdown-content {

            display: block;

        }
    </style>
    <title>Berita</title>

</head>


<body>

    <div class="dropdown">

        <button class="dropbtn">
            Kelola Berita ▼
        </button>


        <div class="dropdown-content">

            <a href="Fitur/berita/buat.php">
                Tambah Berita
            </a>

            <a href="Fitur/berita/edit.php">
                Edit Berita
            </a>

            <a href="Fitur/berita/hapus.php">
                Hapus Berita
            </a>

        </div>

    </div>

    <h2>Daftar Berita</h2>

    <hr>


    <?php while ($row = $data->fetch_assoc()) { ?>


        <a href="Fitur/berita/detail_berita.php?id=<?= $row['id_berita']; ?>" style="text-decoration:none;color:black;">


            <table width="100%" border="1" cellpadding="10">

                <tr>


                    <!-- GAMBAR KIRI -->

                    <td width="200">

                        <img src="assets/gambar/<?= $row['Gambar']; ?>" width="180" height="120">

                    </td>


                    <!-- ISI KANAN -->

                    <td>


                        <h2>

                            <?= $row['judul_berita']; ?>

                        </h2>


                        <p style="text-align:justify;">

                            <?= substr($row['isi_berita'], 0, 250); ?>

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


                        <br>


                        <b>
                            Pengedit:
                        </b>

                        <?= $row['pengedit'] ?? '-'; ?>


                        <br>


                        <b>
                            Tanggal Edit:
                        </b>

                        <?= $row['tanggal_edit'] ?? '-'; ?>


                    </td>


                </tr>


            </table>


        </a>


        <br>


    <?php } ?>


</body>

</html>