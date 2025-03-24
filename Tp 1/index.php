<?php
// Inisialisasi variabel untuk menyimpan nilai input dan error
$nama = $email = $nim = "";
$namaErr = $emailErr = $nimErr = "";
    // **********************  1  **************************  
    // Tangkap nilai nama yang ada pada form HTML
    // silakan taruh kode kalian di bawah
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (!empty($_POST["nama"])) {
            $nama = htmlspecialchars($_POST["nama"]);
        } else {
            $namaErr = "Nama wajib diisi";
        }


    // **********************  2  **************************  
    // Validasi format email agar sesuai dengan standar
    // silakan taruh kode kalian di bawah
    if (!empty($_POST["email"])) {
        if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $email = htmlspecialchars($_POST["email"]);
        } else {
            $emailErr = "Format email tidak valid";
        }
    } else {
        $emailErr = "Email wajib diisi";
    }


    // **********************  3  **************************  
    // Pastikan NIM terisi dan  angka
    // silakan taruh kode kalian di bawah
    if (!empty($_POST["nim"])) {
        if (filter_var($_POST["nim"], FILTER_VALIDATE_EMAIL)) {
            $email = htmlspecialchars($_POST["nim"]);
        } else {
            $emailErr = "Format nim tidak valid";
        }
    } else {
        $emailErr = "Nim wajib diisi";
    }
} 
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran Mahasiswa Baru</title>
    <link rel="stylesheet" href="styles.css">  
</head>
<body>
    <div class="container">
        <img src="logo.png" alt="Logo" class="logo">
        <h2>Formulir Pendaftaran Mahasiswa Baru</h2>

        <?php if ($_SERVER["REQUEST_METHOD"] == "POST") { ?>
            <?php if (!empty($namaErr) || !empty($emailErr) || !empty($nimErr)) { ?>
                <div class="alert alert-danger">
                    <strong>Kesalahan!</strong> Harap perbaiki data yang salah.
                </div>
            <?php } else { ?>
                <div class="alert alert-success">
                    <strong>Berhasil!</strong> Data pendaftaran telah diterima.
                </div>
            <?php } ?>
        <?php } ?>

        <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">

         <!-- **********************  4  ************************** -->
         <!-- Tambahkan kolom input untuk Nama, Email, dan NIM dengan mengambil class form-group sebagai referensi -->

         <div class="form-group">
         <label for="nama">Nama:</label>
                <!-- tambahkan label nama -->
                <input type="text" id="nama" name="nama" value="<?php echo $nama; ?>">
                <!-- Tampilkan pesan error jika variabel $namaErr tidak kosong -->
                <?php if (!empty($namaErr)) { ?>
                     <span class="error"><?php echo $namaErr; ?></span>
                <?php } ?>
            </div>

            <div class="form-group">
                <!-- tambahkan label email -->
                <label for="email">Email:</label>
                <input type="text" id="email" name="email" value="<?php echo $email; ?>">
                <!-- Tampilkan pesan error jika variabel $emailErr tidak kosong -->
                <?php if (!empty($emailErr)) { ?>
                     <span class="error"><?php echo $emailErr; ?></span>
                <?php } ?>
            </div>

            <div class="form-group">
            <label for="nim">NIM:</label>
                <!-- tambahkan label nim -->
                <input type="text" id="nim" name="nim" value="<?php echo $nim; ?>">
                <!-- Tampilkan pesan error jika variabel $nimErr tidak kosong -->
                <?php if (!empty($nimErr)) { ?>
                     <span class="error"><?php echo $nimErr; ?></span>
                <?php } ?>
            </div>

            <div class="button-container">
                <button type="submit">Daftar</button>
            </div>
        

        </form>
        <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($namaErr) && empty($emailErr) && empty($nimErr)) { ?>
    <h3>Data yang Dikirim</h3>
    <table border="1">
        <tr>
            <th>Nama</th>
            <th>Email</th>
            <th>NIM</th>
        </tr>
        <tr>
            <td><?php echo $nama; ?></td>
            <td><?php echo $email; ?></td>
            <td><?php echo $nim; ?></td>
        </tr>
    </table>
<?php } ?>

    </div>
</body>
</html>


