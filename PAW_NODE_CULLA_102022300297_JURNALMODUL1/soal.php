<?php
// **********************  1  **************************  
// Inisialisasi variabel untuk menyimpan nilai input dan error
$nama = $email = $nim = $jurusan = $fakultas ="";
$namaErr = $emailErr = $nimErr = $jurusanErr = $fakultasErr = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // **********************  2  **************************  
    // - Tangkap nilai nama yang ada pada form HTML (Lihat Task 7)
    // - Validasi agar nama tidak boleh kosong
    // - Validasi agar nama hanya berupa abjad (Hint : gunakan fungsi preg_match (atau fungsi lainnya))
    // silakan taruh kode kalian di bawah

    $nama = $_POST ["nama"] ;
    if (empty ($nama)) {
        $namaErr = "Nama Wajib Diisi";
    } elseif (!preg_match ('/([a-zA-Z0-9]|[a-zA-Z0-9\,])/', $_POST["nama"])){
        $namaErr = "Format nama tidak valid";
    }
    // **********************  3  **************************  
    // - Tangkap nilai email yang ada pada form HTML (Lihat Task 7)
    // - Memeriksa apakah email kosong
    // - Memeriksa apakah format email valid (Hint : gunakan fungsi filter_var)
    // silakan taruh kode kalian di bawah
    $email = $_POST ["email"] ;
    if (empty($_POST["email"])) {
        $emailErr = "Email wajib diisi";
    } elseif (!filter_var($_POST["email"])) {
        $emailErr = "Format email tidak valid";
    }
    // **********************  4  **************************  
    // - Tangkap nilai NIM yang ada pada form HTML (Lihat Task 7)
    // - Pastikan NIM terisi dan berformat angka
    // - silakan taruh kode kalian di bawah
    $nim = $_POST ["nim"] ;
    if (empty($_POST["nim"])) {
        $nimErr = "NIM wajib diisi";
    } elseif (!ctype_digit($_POST["nim"])) {
        $nimErr = "NIM harus berupa angka";
    }
    // **********************  5  **************************  
    // - Tangkap nilai jurusan yang ada pada form HTML (Lihat Task 7)
    // - Validasi agar jurusan tidak boleh kosong
    // - Validasi agar jurusan hanya berupa abjad (Hint : gunakan fungsi preg_match (atau fungsi lainnya))
    // silakan taruh kode kalian di bawah
    $jurusan = $_POST ["jurusan"] ;
    if (empty ($jurusan)) {
        $jurusanErr = "Jurusan Wajib Diisi";
    } elseif (!preg_match ('/([a-zA-Z0-9]|[a-zA-Z0-9\,])/' , $_POST["jurusan"])){
        $jurusanErr = "Format Jurusan tidak valid";
    }

    // **********************  6  **************************  
    // - Tangkap nilai fakultas yang ada pada form HTML (Lihat Task 7)
    // - Validasi agar fakultas tidak boleh kosong
    // - Validasi agar fakultas hanya berupa abjad (Hint : gunakan fungsi preg_match (atau fungsi lainnya))
    // silakan taruh kode kalian di bawah
    $fakultas = $_POST ["fakultas"] ;
    if (empty ($fakultas)) {
        $fakultasErr = "Fakultas Wajib Diisi";
    } elseif (!preg_match ('/([a-zA-Z0-9]|[a-zA-Z0-9\,])/' , $_POST["fakultas"])){
        $fakultasErr = "Format fakultas tidak valid";
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
            <?php if (!empty($namaErr) || !empty($emailErr) || !empty($nimErr) || !empty($jurusanErr) || !empty($fakultasErr)) { ?>
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
            <!-- **********************  7  ************************** -->
            <!-- Tambahkan value di tiap form-group/kolom untuk menampilkan kembali data di form setelah submit (retaining input) -->
            <!-- Hint : value pada input form harus berisi variabel yang menyimpan data input -->
            <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" id="nama" name="nama" value="<?php echo $nama; ?>">
            <span class="error"><?php echo $namaErr ? "* $namaErr" : ""; ?></span>
            </div>

            <div class="form-group">
            <label for="email">Email</label>
            <input type="text" id="email" name="email" value="<?php echo $email ?>" >
            <span class="error"><?php echo $emailErr ? "* $emailErr" : ""; ?></span>
            </div>

            <div class="form-group">
            <label for="nim">NIM</label>
            <input type="text" id="nim" name="nim" value="<?php echo $nim; ?>">
            <span class="error"><?php echo $nimErr ? "* $nimErr" : ""; ?></span>
            </div>

            <div class="form-group">
            <label for="jurusan">Jurusan</label>
            <input type="text" id="jurusan" name="jurusan" value=<?php echo $jurusan?> >
            <span class="error"><?php echo $jurusanErr ? "* $jurusanErr" : ""; ?></span>
            </div>

            <div class="form-group">
            <label for="fakultas">Fakultas</label>
            <input type="text" id="fakultas" name="fakultas" value=<?php echo $fakultas?> >
            <span class="error"><?php echo $fakultasErr ? "* $fakultasErr" : ""; ?></span>
            </div>

            <div class="button-container">
            <button type="submit">Daftar</button>
            </div>
        </form>
    </div>

    <!-- **********************  8  ************************** -->
    <!-- Panggil variabel yang berisi pesan error (Hint : gunakan if dan metode post) -->
    <?php if ($_SERVER ["REQUEST_METHOD"] == "POST" && !$namaErr && !$nimErr && !$emailErr && !$jurusanErr && !$fakultasErr){ ?>
    <div class="container">
        <h3>Data Pendaftaran</h3>
        <div class="table-container">
    <!-- **********************  9  ************************** -->
    <!-- Tampilkan data pendaftaran dalam bentuk tabel yang baru saja diinput -->
            <table>
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Nim</th>
                    <th>Jurusan</th>
                    <th>Fakultas</th>
                </tr>
                <tr>
                    <td><?php echo $nama ;?></td>
                    <td><?php echo $email ;?></td>
                    <td><?php echo $nim ;?></td>
                    <td><?php echo $jurusan ;?></td>
                    <td><?php echo $fakultas ;?></td>
                </tr>
            </table>   
        </div>
    </div>
    <?php } ?>
</body>
</html>