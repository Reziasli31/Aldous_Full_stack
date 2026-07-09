<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST, GET");


include "../../Konfigurasi/koneksi.php";


$username = $_POST['username'] ?? '';

$password = $_POST['password'] ?? '';



$query = $koneksi->query(

"SELECT *
 FROM akun_registrasi
 WHERE username='$username'
 AND password='$password'"

);



if($query->num_rows > 0){


$data = $query->fetch_assoc();



echo json_encode([

    "status"=>"success",

    "username"=>$data['username']

]);


}else{


echo json_encode([

    "status"=>"failed"

]);


}


?>