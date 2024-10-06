<?php
include "koneksi.php";

$npm = $_GET["npm"];
$query = "DELETE FROM identitas WHERE npm = '$npm'";
if(mysqli_query($conn, $query)){
    header("Location: index.php");
} 
else {
    echo "Error: " . mysqli_error($conn);
}

?>