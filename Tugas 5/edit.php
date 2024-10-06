<?php include "koneksi.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Mahasiswa</title>
</head>
<body>
    <h1>Edit Data Mahasiswa</h1>

    <?php
    $npm = $_GET['npm'];
    $query = "SELECT * FROM identitas WHERE npm = '$npm'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    ?>

    <form action="" method="POST">
        <label for="npm">NPM : </label>
        <input type="text" name="npm" value="<?= $row['npm']; ?>" readonly>
        <br><br>

        <label for="nama">Nama : </label>
        <input type="text" name="nama" value="<?= $row['nama']; ?>">
        <br><br>

        <label for="alamat">Alamat : </label>
        <input type="text" name="alamat" value="<?= $row['alamat']; ?>">
        <br><br>

        <label for="tanggal_lahir">Tanggal Lahir : </label>
        <input type="date" name="tanggal_lahir" value="<?= $row['tanggal_lahir']; ?>">
        <br><br>

        <label for="jenis_kelamin">Jenis Kelamin : </label> 
        <select name="jenis_kelamin">
            <option value="L" <?= ($row['jenis_kelamin'] == 'L') ? 'selected' : ''; ?>>Laki-Laki</option>
            <option value="P" <?= ($row['jenis_kelamin'] == 'P') ? 'selected' : ''; ?>>Perempuan</option>
        </select>
        <br><br>

        <label for="email">Email : </label>
        <input type="text" name="email" value="<?= $row['email']; ?>">
        <br><br>

        <input type="submit" name="submit" value="Update">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $tanggal_lahir = $_POST['tanggal_lahir'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $email = $_POST['email'];
        
        $query = "UPDATE identitas SET nama = '$nama', alamat = '$alamat', tanggal_lahir = '$tanggal_lahir', jenis_kelamin = '$jenis_kelamin', email = '$email' WHERE npm = '$npm'";
        mysqli_query($conn, $query);

        header("Location: index.php");
    }
    ?>
</body>
</html>