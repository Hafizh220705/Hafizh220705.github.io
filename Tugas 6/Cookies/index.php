<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['nama'])) {
    $nama = htmlspecialchars($_POST['nama']);

    setcookie('nama_pengguna', $nama, time() + 60, "/");

    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

$sisa_waktu_cookie = 0;
if (isset($_COOKIE['nama_pengguna'])) {
    $sisa_waktu_cookie = $_COOKIE['nama_pengguna'] ? (time() + 60 - $_SERVER['REQUEST_TIME']) : 0;
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CookieForm | Notes</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #f8f9fa, #e0e0e0);
            height: 100vh;
        }

        .card {
            border-radius: 20px;
            background-color: #fff;
        }

        h2 {
            font-weight: bold;
            color: #4a4a4a;
            animation: fadeIn 1.5s ease-in-out;
        }

        button {
            background-color: #4a90e2;
            color: white;
            border: none;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #357ab7;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        #countdown {
            color: #ff4d4d;
        }
    </style>
</head>

<body class="d-flex align-items-center justify-content-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-body">
                        <h2 class="card-title text-center">Masukkan Pesan Anda</h2>
                        <?php if (isset($_COOKIE['nama_pengguna'])): ?>
                            <p class="text-center">Isi pesannya adalah: <strong><?= htmlspecialchars($_COOKIE['nama_pengguna']) ?></strong></p>
                            <p id="countdown" class="text-center">Cookie akan expired dalam <span id="sisa_waktu"><?= $sisa_waktu_cookie ?></span> detik.</p>
                        <?php else: ?>
                            <p class="text-center">Cookie tidak ditemukan atau sudah expired.</p>
                        <?php endif; ?>
                        <form action="" method="POST" class="mt-4">
                            <div class="form-group">
                                <input type="text" class="form-control" id="nama" name="nama" required placeholder="Masukkan pesan Anda">
                            </div>
                            <button type="submit" class="btn btn-block">Kirim</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        let sisaWaktu = <?= $sisa_waktu_cookie ?>;
        const countdownElement = document.getElementById('sisa_waktu');

        if (sisaWaktu > 0) {
            const interval = setInterval(() => {
                sisaWaktu--;
                countdownElement.textContent = sisaWaktu;
                if (sisaWaktu <= 0) {
                    clearInterval(interval);
                    document.getElementById('countdown').textContent = 'Cookie telah expired.';
                }
            }, 1000);
        }
    </script>
</body>
</html>