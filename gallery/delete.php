<?php
include "../config/database.php";

if (!isset($_SESSION['login']) || $_SESSION['role'] != 'admin') {
    header("Location: ../auth/login.php");
    exit;
}


$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM gallery WHERE id='$id'"));

if ($data) {
  unlink("../uploads/gallery/".$data['filename']);
  mysqli_query($conn,"DELETE FROM gallery WHERE id='$id'");
}

header("Location: index.php");
exit;
