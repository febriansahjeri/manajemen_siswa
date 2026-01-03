<?php
include "../config/database.php";

if (!isset($_SESSION['login']) || $_SESSION['role'] != 'admin') {
    header("Location: ../auth/login.php");
    exit;
}


$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM siswa WHERE id='$id'");
$s = mysqli_fetch_assoc($data);

if (isset($_POST['update'])) {
  $nama = htmlspecialchars($_POST['nama']);
  $email = htmlspecialchars($_POST['email']);
  $kelas = htmlspecialchars($_POST['kelas']);

  mysqli_query($conn,"UPDATE siswa SET
    nama='$nama', email='$email', kelas='$kelas'
    WHERE id='$id'");

  header("Location: index.php");
  exit;
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Edit Siswa</title>
<link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
<div class="card">
<h2>Edit Siswa</h2>
<form method="post">
<input name="nama" value="<?= $s['nama'] ?>" required>
<input name="email" value="<?= $s['email'] ?>" required>
<input name="kelas" value="<?= $s['kelas'] ?>" required>
<button name="update">Update</button>
<a href="index.php">Kembali</a>
</form>
</div>
</body>
</html>
