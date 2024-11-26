<?php
// conn.php
$host = 'localhost'; // atau alamat host Anda
$username = 'root'; // ganti dengan username database Anda
$password = ''; // ganti dengan password database Anda
$dbname = '19023_psas'; // ganti dengan nama database Anda

// Membuat koneksi
$conn = new mysqli($host, $username, $password, $dbname);

// Mengecek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
