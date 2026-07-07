<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    die("Akses ditolak");
}


$nama_registrasi = trim($_POST['nama_registrasi']);
$username = trim($_POST['username']);
$password = trim($_POST['password']);
$urutan = $_POST['urutan_tampil'];
$keterangan = trim($_POST['keterangan']);

$proses = "Ya";


// validasi data wajib
if (empty($nama_registrasi) || empty($username) || empty($password) || empty($urutan) || empty($proses)) {
    die("Data wajib belum lengkap");
}


// membuat kode otomatis
if ($nama_registrasi == "Registrasi Umum") {
    $kode_registrasi = "RU";
} else if ($nama_registrasi == "Registrasi Khusus") {
    $kode_registrasi = "RK";
} else {
    die("Registrasi tidak valid");
}


// validasi urutan
if (!is_numeric($urutan)) {
    die("Urutan harus berupa angka");
}

$urutan = intval($urutan);


if ($urutan < 1 || $urutan > 5) {
    die("Urutan hanya boleh 1 sampai 5");
}


if ($keterangan == "") {

    $sql = "INSERT INTO akun_registrasi
(kode_registrasi, nama_registrasi, username, password, urutan_tampil, proses)

VALUES

('$kode_registrasi',
 '$nama_registrasi',
 '$username',
 '$password',
 '$urutan',
 '$proses')";

} else {

    $sql = "INSERT INTO akun_registrasi
(kode_registrasi, nama_registrasi, username, password, urutan_tampil, keterangan, proses)

VALUES

('$kode_registrasi',
 '$nama_registrasi',
 '$username',
 '$password',
 '$urutan',
 '$keterangan',
 '$proses')";

}


if ($koneksi->query($sql)) {

    echo "
    <script>
    alert('Akun berhasil dibuat');
    window.location='beranda.php';
    </script>";

} else {

    echo "Gagal membuat akun: " . $koneksi->error;

}

?>