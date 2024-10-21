<?php
session_start();
$login_error = "";

if (isset($_POST['login'])) {
    $username = htmlspecialchars(trim($_POST['username']));
    $password = $_POST['password'];

    $stored_username = "Hafizh Fadhl Muhammad";
    $stored_password = "140810230070";

    if ($username == $stored_username && $password == $stored_password) {
        $_SESSION['username'] = $username;
        $_SESSION['loggedin_time'] = time();

        setcookie("user_preference", "dark_mode", time() + (86400 * 30), "/");

        header("Location: welcome.php");
        exit();
    } else {
        $login_error = "Username atau password salah!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Authentication Web</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .card {
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-body {
            background: #ffffff;
            border-radius: 15px;
            padding: 30px;
        }

        h3 {
            color: #34495e;
            font-weight: bold;
        }

        button {
            background-color: #2ecc71;
            color: white;
        }

        button:hover {
            background-color: #27ae60;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h3 class="text-center">Login</h3>
                        <form method="POST" action="">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" name="username" class="form-control" placeholder="Username" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Password" required>
                            </div>
                            <button type="submit" name="login" class="btn btn-primary w-100">Login</button>
                            <?php if (!empty($login_error)): ?>
                                <div class="text-danger mt-3"><?= $login_error ?></div>
                            <?php endif; ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
