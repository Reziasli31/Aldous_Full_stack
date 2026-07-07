<?php

$koneksi = new mysqli("localhost","root","","registrasi");

if ($koneksi->connect_error) {
    die("" . $koneksi->connect_error);
}
?>