<?php
include "../config/database.php";

if (!isset($_SESSION['login']) || $_SESSION['role'] != 'admin') {
    header("Location: ../auth/login.php");
    exit;
}


$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM siswa WHERE id='$id'");

header("Location: index.php");
exit;
