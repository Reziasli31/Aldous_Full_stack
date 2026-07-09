<?php

session_start();

include "../../Konfigurasi/koneksi.php";


// cek login

if (!isset($_SESSION['login'])) {

    die("Belum login");

}


// ambil data form

$judul = trim($_POST['judul_berita']);
$isi = trim($_POST['isi_berita']);


// pembuat berdasarkan akun login

$pembuat = $_SESSION['username'];


// upload gambar

if (!isset($_FILES['gambar']) || $_FILES['gambar']['error'] != 0) {

    die("Gambar belum dipilih");

}


$nama_gambar = $_FILES['gambar']['name'];

$tmp_gambar = $_FILES['gambar']['tmp_name'];


// cek format gambar

$format = strtolower(
    pathinfo($nama_gambar, PATHINFO_EXTENSION)
);


$allowed = ["jpg", "jpeg", "png"];


if (!in_array($format, $allowed)) {

    die("Format gambar harus JPG, JPEG, atau PNG");

}


// lokasi gambar

$folder = "../../Assets/Gambar/";


// upload gambar

if (!move_uploaded_file($tmp_gambar, $folder . $nama_gambar)) {

    die("Gagal menyimpan gambar");

}



// =========================
// INSERT BERITA
// =========================


$query = "

INSERT INTO berita

(
judul_berita,
isi_berita,
Gambar,
tanggal_buat,
tanggal_edit,
pembuat,
pengedit

)

VALUES

(
'$judul',
'$isi',
'$nama_gambar',
NOW(),
NULL,
'$pembuat',
NULL
)

";



if($koneksi->query($query)){



    // ambil id berita baru

    $id_baru = $koneksi->insert_id;



    // =========================
    // MASUK ARSIP
    // =========================


    $arsip = "

    INSERT INTO arsip_berita

    (
    id_berita,
    judul_berita,
    isi_berita,
    Gambar,
    tanggal_buat,
    tanggal_edit,
    pembuat,
    pengedit,
    aksi,
    pelaku
    )

    VALUES

    (
    '$id_baru',
    '$judul',
    '$isi',
    '$nama_gambar',
    NOW(),
    NULL,
    '$pembuat',
    NULL,
    'Tambah',
    '$pembuat'
    )

    ";



    if($koneksi->query($arsip)){


        echo "

        <script>

        alert('Berita berhasil dibuat');

        window.location='../../berita.php';

        </script>

        ";


    }else{


        echo "Gagal membuat arsip : ".$koneksi->error;


    }



}else{


    echo "Gagal membuat berita : ".$koneksi->error;


}


?>