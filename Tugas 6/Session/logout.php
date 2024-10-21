<?php
session_start();

session_unset();
session_destroy();

if (isset($_COOKIE['user_preference'])) {
    setcookie("user_preference", "", time() - 3600, "/");
}

header("Location: login.php");
exit();
