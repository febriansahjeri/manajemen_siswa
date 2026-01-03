<?php
include "../config/database.php";

if (!isset($_SESSION['login']) || $_SESSION['role'] != 'admin') {
    header("Location: ../auth/login.php");
    exit;
}

$id = (int) $_GET['id'];
mysqli_query($conn, "DELETE FROM comments WHERE id=$id");

header("Location: index.php");
exit;
