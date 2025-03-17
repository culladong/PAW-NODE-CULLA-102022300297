<!-- BUAT FUNGSI EDIT DATA ( ketika data berhasil di tambahkan maka akan dialihkan ke halaman katalog buku) -->
 <?php
 include("navbar.php");
 include("connect.php");

 $id = $_GET['id'];
 $query = "SELECT * FROM tb_buku WHERE id = $id";
 $data = mysqli_query($conn, $query);
 $buku = [];

 while ($buku = mysqli_fetch_assoc($data)) {
    $buku[] = $buku;
 }