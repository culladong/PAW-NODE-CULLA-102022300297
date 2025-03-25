<!-- BUAT FUNGSI EDIT DATA ( ketika data berhasil di tambahkan maka akan dialihkan ke halaman katalog buku) -->
<?php
include 'connect.php';

// BUAT FUNGSI EDIT DATA (ketika data berhasil diubah maka akan dialihkan ke halaman katalog buku)
if (isset($_POST['update'])) {
    $id = $_GET['id']; // Ambil ID dari URL
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $tahun_terbit = $_POST['tahun_terbit'];

    // Query untuk update data buku
    $query = "UPDATE tb_buku SET judul='$judul', penulis='$penulis', tahun_terbit='$tahun_terbit' WHERE id='$id'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header("Location: katalog_buku.php"); // Redirect ke katalog buku
        exit();
    } else {
        echo "<script>alert('Data gagal diperbarui');</script>";
    }
}
?>
