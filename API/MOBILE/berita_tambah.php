<?php

include "../../Konfigurasi/koneksi.php";


// ambil data

$judul = $_POST['judul_berita'];

$isi = $_POST['isi_berita'];

$username = $_POST['username'];



// upload gambar

$nama_gambar = $_FILES['gambar']['name'];

$tmp = $_FILES['gambar']['tmp_name'];



$folder = "../../Assets/Gambar/";



move_uploaded_file(

    $tmp,

    $folder.$nama_gambar

);



// tanggal

$tanggal_buat = date("Y-m-d H:i:s");



// tambah berita

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
'$tanggal_buat',
NULL,
'$username',
NULL

)

";



if($koneksi->query($query)){



    // ambil id berita terakhir

    $id = $koneksi->insert_id;



    // arsip tambah

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

    '$id',
    '$judul',
    '$isi',
    '$nama_gambar',
    '$tanggal_buat',
    NULL,
    '$username',
    NULL,
    'Tambah',
    '$username'

    )

    ";



    $koneksi->query($arsip);



    echo json_encode([

        "status"=>"success",

        "message"=>"Berita berhasil dibuat"

    ]);



}else{


    echo json_encode([

        "status"=>"failed"

    ]);

}



?>