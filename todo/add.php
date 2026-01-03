<?php
include "../config/database.php";

if (!isset($_SESSION['login'])) exit;

$user  = $_SESSION['nama'];
$title = htmlspecialchars($_POST['task']);

mysqli_query($conn,"
  INSERT INTO todos (user,title,status,created_at)
  VALUES ('$user','$title',0,NOW())
");
