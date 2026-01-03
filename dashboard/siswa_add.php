<?php
include "../config/database.php";

if (!isset($_SESSION['login']) || $_SESSION['role'] != 'admin') {
    header("Location: ../auth/login.php");
    exit;
}


if (isset($_POST['simpan'])) {
  $nama = htmlspecialchars($_POST['nama']);
  $email = htmlspecialchars($_POST['email']);
  $kelas = htmlspecialchars($_POST['kelas']);

  mysqli_query($conn, "INSERT INTO siswa (nama,email,kelas,created_at)
                       VALUES ('$nama','$email','$kelas',NOW())");

  header("Location: index.php");
  exit;
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Tambah Siswa</title>
<link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
<div class="card">
<h2>Tambah Siswa</h2>
<form method="post">
<input name="nama" placeholder="Nama" required>
<input name="email" type="email" placeholder="Email" required>
<input name="kelas" placeholder="Kelas" required>
<button name="simpan">Simpan</button>
<a href="index.php">Kembali</a>
</form>
</div>
</body>
</html>
