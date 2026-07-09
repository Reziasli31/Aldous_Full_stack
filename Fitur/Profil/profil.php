<?php

session_start();

include "../../Konfigurasi/koneksi.php";


if (!isset($_SESSION['login'])) {

    die("Belum login");

}


$username = $_SESSION['username'];



$data = $koneksi->query(

    "SELECT * FROM akun_registrasi
     WHERE username='$username'"

);



$row = $data->fetch_assoc();


if (!$row) {

    die("Data akun tidak ditemukan");

}


?>


<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <title>Profil</title>

</head>


<body>
<body class="profil-page">


<div class="profil-box">


    <h2 class="profil-title">
        Profil Akun
    </h2>


    <hr>


    <!-- Foto Profil -->

    <img class="foto-profil" 
         src="../../Assets/profile/default.jpg" 
         width="150" 
         height="150">



    <br><br>



    <table class="profil-table">


        <tr>

            <td>
                Nama Registrasi
            </td>

            <td>
                <?= $row['nama_registrasi']; ?>
            </td>

        </tr>



        <tr>

            <td>
                Username
            </td>

            <td>
                <?= $row['username']; ?>
            </td>

        </tr>



        <tr>

            <td>
                Urutan Tampil
            </td>

            <td>
                <?= $row['urutan_tampil']; ?>
            </td>

        </tr>



        <tr>

            <td>
                Tanggal Dibuat
            </td>

            <td>
                <?= $row['created_at']; ?>
            </td>

        </tr>


    </table>


    <br>


    <a href="../../Beranda.php">

        <button>
            Kembali ke beranda
        </button>

    </a>


</div>


</body>