<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "perpustakaan_1";

$koneksi = mysqli_connect($host,$username,$password,$database);
if(!$koneksi){
    die("koneksi Gagal :".mysqli_connect_error());
}
?>