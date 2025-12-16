<?php
$host = "localhost"; // Ganti jika host database berbeda
$username = "root"; // Ganti dengan username database Anda
$password = ""; // Ganti dengan password database Anda
$database = "db_absen";

$koneksi = mysqli_connect($host, $username, $password, $database);

if (mysqli_connect_errno()) {
    echo "Koneksi database gagal: " . mysqli_connect_error();
}
?>