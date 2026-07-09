<?php

include "../../Konfigurasi/koneksi.php";
include "../../Navigasi/topbar.php";


$data = $koneksi->query(
    "SELECT * FROM berita
     ORDER BY tanggal_buat DESC"
);

?>


<!DOCTYPE html>
<html>

<head>

    <title>Hapus Berita</title>

</head>


<body>


    <a href="../../berita.php">
        <button>
            Kembali ke Berita
        </button>
    </a>


    <h2>Hapus Berita</h2>

    <hr>



    <?php while ($row = $data->fetch_assoc()) { ?>


        <a href="hapus_konfirmasi.php?id=<?= $row['id_berita']; ?>" style="text-decoration:none;color:black;">


            <table border="1" width="100%" cellpadding="10">


                <tr>


                    <td width="200">


                        <img src="../../assets/gambar/<?= $row['Gambar']; ?>" width="180" height="120">


                    </td>


                    <td>


                        <h2>

                            <?= $row['judul_berita']; ?>

                        </h2>


                        <p>

                            <?= substr($row['isi_berita'], 0, 250); ?>

                            ...

                        </p>


                        <br>


                        <b>Tanggal:</b>

                        <?= $row['tanggal_buat']; ?>


                        <br>


                        <b>Pembuat:</b>

                        <?= $row['pembuat']; ?>

                        <br>


                        <b>Pengedit:</b>

                        <?= empty($row['pengedit']) ? '-' : $row['pengedit']; ?>


                        <br>
h
                        <b>Tanggal Edit:</b>

                        <?= empty($row['tanggal_edit']) ? '-' : $row['tanggal_edit']; ?>


                    </td>


                </tr>


            </table>


        </a>


        <br>


    <?php } ?>


</body>

</html>