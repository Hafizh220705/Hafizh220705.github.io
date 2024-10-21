<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

if (time() - $_SESSION['loggedin_time'] > 1800) {
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit();
}

$greeting = "Selamat Datang, " . $_SESSION['username'] . "!";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome | Authentication Web</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #e0f7fa;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #34495e;
            font-size: 2rem;
            margin-bottom: 20px;
        }

        button {
            background-color: #e74c3c;
            color: white;
        }

        button:hover {
            background-color: #c0392b;
        }
    </style>
</head>

<body>
    <div class="container text-center">
        <h1><?= $greeting ?></h1>
        <form method="POST" action="logout.php">
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>
    </div>
</body>

</html>
