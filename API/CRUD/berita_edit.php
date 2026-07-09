<?php

session_start();

date_default_timezone_set('Asia/Makassar');

include "../../Konfigurasi/koneksi.php";


// cek login

if(!isset($_SESSION['login'])){

    die("Belum login");

}


// data form

$id = $_POST['id_berita'];

$judul = $_POST['judul_berita'];

$isi = $_POST['isi_berita'];

$gambar_lama = $_POST['gambar_lama'];


// user yang melakukan edit

$pelaku = $_SESSION['username'];


// ambil data lama berita

$data_lama = $koneksi->query(

    "SELECT * FROM berita
     WHERE id_berita='$id'"

);


$lama = $data_lama->fetch_assoc();


if(!$lama){

    die("Berita tidak ditemukan");

}



// ==============================
// SIMPAN DATA LAMA KE ARSIP
// ==============================


$query_arsip = "

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
'{$lama['id_berita']}',
'{$lama['judul_berita']}',
'{$lama['isi_berita']}',
'{$lama['Gambar']}',
'{$lama['tanggal_buat']}',
" . ($lama['tanggal_edit'] ? "'{$lama['tanggal_edit']}'" : "NULL") . ",
'{$lama['pembuat']}',
" . ($lama['pengedit'] ? "'{$lama['pengedit']}'" : "NULL") . ",
'Edit',
'$pelaku'
)

";



if(!$koneksi->query($query_arsip)){

    die("Gagal membuat arsip : ".$koneksi->error);

}




// ==============================
// CEK GAMBAR BARU
// ==============================


$gambar = $_FILES['gambar']['name'];

$tmp = $_FILES['gambar']['tmp_name'];



if(empty($gambar)){


    $gambar = $gambar_lama;


}else{


    $folder = "../../Assets/Gambar/";

    move_uploaded_file(
        $tmp,
        $folder.$gambar
    );


}




// ==============================
// UPDATE BERITA
// ==============================


$tanggal_edit = date("Y-m-d H:i:s");


$query = "

UPDATE berita SET

judul_berita='$judul',

isi_berita='$isi',

Gambar='$gambar',

pengedit='$pelaku',

tanggal_edit='$tanggal_edit'


WHERE id_berita='$id'

";



if($koneksi->query($query)){


    echo "

    <script>

    alert('Berita berhasil diedit');

    window.location='../../berita.php';

    </script>

    ";


}else{


    echo "Gagal update : ".$koneksi->error;


}


?>