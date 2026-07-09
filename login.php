<?php
session_start();
include "Konfigurasi/koneksi.php";

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    die("Akses ditolak!");
}

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT *
        FROM akun_registrasi
        WHERE username='$username'
        AND password='$password'
        AND proses='Ya'";

$hasil = $koneksi->query($sql);

if($hasil->num_rows > 0){

    $_SESSION['login']=true;
    $_SESSION['username']=$username;

    header("Location: beranda.php");
    exit();

}else{

    echo "Username atau Password salah";

}
?>