<?php

include "koneksi.php";


if($_SERVER["REQUEST_METHOD"] != "POST"){
    die("Akses ditolak");
}


$id = $_POST['id_registrasi'];

$nama_registrasi = trim($_POST['nama_registrasi']);
$username = trim($_POST['username']);
$password = trim($_POST['password']);
$urutan = $_POST['urutan_tampil'];
$keterangan = trim($_POST['keterangan']);

if($keterangan == ""){
    $keterangan = "Keterangan belum di buat";
}

// buat kode otomatis

if($nama_registrasi == "Registrasi Umum"){

    $kode_registrasi = "RU";

}
else if($nama_registrasi == "Registrasi Khusus"){

    $kode_registrasi = "RK";

}
else{

    die("Registrasi tidak valid");

}


// validasi data wajib

if(empty($username) || empty($password)){
    die("Username dan password wajib diisi");
}


// validasi urutan

if(!is_numeric($urutan)){
    die("Urutan harus angka");
}


$urutan = intval($urutan);


if($urutan < 1 || $urutan > 5){

    die("Urutan hanya boleh 1 sampai 5");

}


// update

$sql = "UPDATE akun_registrasi SET

kode_registrasi='$kode_registrasi',
nama_registrasi='$nama_registrasi',
username='$username',
password='$password',
urutan_tampil='$urutan',
keterangan='$keterangan'

WHERE id_registrasi='$id'";


if($koneksi->query($sql)){

    echo "
    <script>
    alert('Akun berhasil diperbarui');
    window.location='beranda.php';
    </script>
    ";

}
else{

    echo "Gagal update : ".$koneksi->error;

}


?>