<?php include "koneksi.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menambahkan Data Mahasiswa</title>
</head>
<body>
    <h1>Menambahkan Data Mahasiswa</h1>

    <form action="" method="POST">
        <label for="npm">NPM : </label>
        <input type="text" name="npm" required>
        <br><br>

        <label for="nama">Nama : </label>
        <input type="text" name="nama" required>
        <br><br>

        <label for="alamat">Alamat : </label>
        <input type="text" name="alamat" required>
        <br><br>

        <label for="tanggal_lahir">Tanggal Lahir : </label>
        <input type="date" name="tanggal_lahir" required>
        <br><br>

        <label for="jenis_kelamin">Jenis Kelamin : </label>
        <select name="jenis_kelamin">
            <option value="L">Laki-Laki</option>
            <option value="P">Perempuan</option>
        </select>
        <br><br>

        <label for="email">Email : </label>
        <input type="text" name="email" required>
        <br><br>

        <input type="submit" name="submit" value="simpan">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $npm = $_POST['npm'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $tanggal_lahir = $_POST['tanggal_lahir'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $email = $_POST['email'];
        
        $query = "INSERT INTO identitas (npm, nama, alamat, tanggal_lahir, jenis_kelamin, email) VALUES ('$npm', '$nama', '$alamat', '$tanggal_lahir', '$jenis_kelamin', '$email')";
        mysqli_query($conn, $query);

        header("Location: index.php");
    }
    ?>
</body>
</html>