<?php
require 'connect.php';

// ==================1==================
// If statement untuk mengecek POST request dari form
// Lalu definisikan variabel-variabel untuk menyimpan data yang dikirim dari POST
if (isset($_POST['create'])) {
    $bukuName = $_POST["judul_buku"];
    $penulisName = $_POST["penulis_buku"];
    $tahunterbitName = $_POST["tahun_terbit_buku"];

    
    
    // ==================2==================
    // Definisikan $query untuk melakukan koneksi ke database
    $query = "INSERT INTO katalog_buku (judul_buku, penulis_buku, tahun_terbit_buku)
    VALUES ('$bukuName', '$penulisName', '$tahunterbitName')";
    mysqli_query($conn, $query);

    // ==================3==================
    // Eksekusi query

    if (mysqli_affected_rows($conn) > 0) {
        header("location: katalog_buku.php");
    } else {
        echo "<script>alert('Data gagal ditambahkan');</script>";
    }
}
?>