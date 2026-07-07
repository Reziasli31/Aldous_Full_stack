<?php

include "koneksi.php";

if($_SERVER["REQUEST_METHOD"] != "POST"){
    die("Akses ditolak");
}

$id = intval($_POST['id_registrasi']);


// Ambil data akun

$sql = "SELECT * FROM akun_registrasi
        WHERE id_registrasi='$id'";

$result = $koneksi->query($sql);

if($result->num_rows == 0){
    die("Data tidak ditemukan");
}

$data = $result->fetch_assoc();


// Simpan ke arsip

$sql_arsip = "INSERT INTO arsip_registrasi
(
id_registrasi,
kode_registrasi,
nama_registrasi,
username,
password,
urutan_tampil,
keterangan,
proses,
created_at
)

VALUES
(
'".$data['id_registrasi']."',
'".$data['kode_registrasi']."',
'".$data['nama_registrasi']."',
'".$data['username']."',
'".$data['password']."',
'".$data['urutan_tampil']."',
'".$data['keterangan']."',
'".$data['proses']."',
'".$data['created_at']."'
)";


if($koneksi->query($sql_arsip)){

    // Hapus akun aktif

    $sql_hapus = "DELETE FROM akun_registrasi
                  WHERE id_registrasi='$id'";

    if($koneksi->query($sql_hapus)){

        echo "

        <script>

        alert('Akun berhasil dihapus dan diarsipkan');

        window.location='beranda.php';

        </script>

        ";

    }else{

        echo "Gagal menghapus akun : ".$koneksi->error;

    }

}else{

    echo "Gagal mengarsipkan data : ".$koneksi->error;

}

?>