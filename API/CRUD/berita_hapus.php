<?php

session_start();

include "../../Konfigurasi/koneksi.php";


// cek login

if (!isset($_SESSION['login'])) {

    die("Belum login");

}


// ambil id berita

$id = $_POST['id_berita'];


// pelaku penghapusan

$pelaku = $_SESSION['username'];


// ambil data berita

$data = $koneksi->query(

    "SELECT * FROM berita
     WHERE id_berita='$id'"

);


$row = $data->fetch_assoc();

if (!$row) {

    die("Berita tidak ditemukan");

}


// simpan ke arsip_berita

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

'{$row['id_berita']}',
'{$row['judul_berita']}',
'{$row['isi_berita']}',
'{$row['Gambar']}',
'{$row['tanggal_buat']}',
" . ($row['tanggal_edit'] ? "'{$row['tanggal_edit']}'" : "NULL") . ",
'{$row['pembuat']}',
" . ($row['pengedit'] ? "'{$row['pengedit']}'" : "NULL") . ",
'Hapus',
'$pelaku'

)

";


if ($koneksi->query($query_arsip)) {


    // hapus dari tabel berita

    $query_hapus = "

    DELETE FROM berita

    WHERE id_berita='$id'

    ";


    if ($koneksi->query($query_hapus)) {

        echo "

        <script>

        alert('Berita berhasil dihapus');

        window.location='../../berita.php';

        </script>

        ";

    } else {

        echo "Gagal menghapus berita : " . $koneksi->error;

    }


} else {

    echo "Gagal menyimpan arsip : " . $koneksi->error;

}

?>