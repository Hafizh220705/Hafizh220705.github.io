<?php
$servername = "localhost:3307";
$username = "root";
$database = "mhs";
$password = "C@intaku1140_";

$conn = mysqli_connect($servername, $username, $password, $database);

if(!$conn){
    die("Connection Failed: ". mysqli_connect_error());
}

?>