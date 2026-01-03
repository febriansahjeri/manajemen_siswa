<?php
include "../config/database.php";

if (!isset($_SESSION['login']) || $_SESSION['role'] != 'admin') {
    header("Location: ../auth/login.php");
    exit;
}


foreach ($_FILES['gambar']['tmp_name'] as $i => $tmp) {

  if ($tmp == '') continue;

  $ext = pathinfo($_FILES['gambar']['name'][$i], PATHINFO_EXTENSION);
  $namaFile = uniqid().".".$ext;

  move_uploaded_file($tmp, "../uploads/gallery/".$namaFile);

  mysqli_query($conn,"INSERT INTO gallery (filename,created_at)
                      VALUES ('$namaFile',NOW())");
}

header("Location: index.php");
exit;
