<?php include "koneksi.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
</head>
<body>
    <h1>Data Mahasiswa</h1>
    <a href="addMhs.php">Tambah Data</a>
    <br><br>

    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>NPM</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Tanggal Lahir</th>
            <th>Jenis Kelamin</th>
            <th>Email</th>
            <th>Aksi</th>
        </tr>

    <?php
    $query = "SELECT *FROM identitas";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr>
                    <td>{$row['npm']}</td>
                    <td>{$row['nama']}</td>
                    <td>{$row['alamat']}</td>
                    <td>{$row['tanggal_lahir']}</td>
                    <td>{$row['jenis_kelamin']}</td>
                    <td>{$row['email']}</td>
                    <td>
                        <a href='edit.php?npm={$row['npm']}'>Edit</a> |
                        <a href='deleteMhs.php?npm={$row['npm']}' onclick='return confirm(\"Apakah Anda Ingin Menghapus?\")'>Hapus</a>
                    </td>
                </tr>";
        }
    } 
    ?>
    </table>
</body>
</html>