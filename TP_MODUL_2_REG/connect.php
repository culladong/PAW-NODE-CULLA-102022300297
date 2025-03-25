<?php
// ==================1==================
// Definisikan variabel2 yang akan digunakan untuk melakukan koneksi ke database
$host = "localhost"; // Host database (biasanya localhost)
$user = "root"; // Username database (default XAMPP: root)
$password = ""; // Password database (default XAMPP: kosong)
$database = "db_perpustakaan"; // Nama database yang akan digunakan
$port = 3308; // Port MySQL (default: 3306)

// ==================2==================
// Definisikan $conn untuk melakukan koneksi ke database 
$conn = mysqli_connect($host, $user, $password, $database, $port);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

?>