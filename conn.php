<?php

/* if (!isset($_SESSION['id'])) {
  header("Location: login.php"); 
  exit();} */
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "url_duuat";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("فشل الاتصال: " . $conn->connect_error);
}
?>