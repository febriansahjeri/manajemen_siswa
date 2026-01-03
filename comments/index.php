<?php
include "../config/database.php";

if (!isset($_SESSION['login']) || $_SESSION['role'] != 'admin') {
  header("Location: ../auth/login.php");
  exit;
}


if (isset($_POST['kirim'])) {
  $nama  = htmlspecialchars($_POST['nama']);
  $email = htmlspecialchars($_POST['email']);
  $pesan = htmlspecialchars($_POST['pesan']);

  mysqli_query($conn, "INSERT INTO comments VALUES (
    null,'$nama','$email','$pesan',NOW()
  )");

  header("Location: index.php");
  exit;
}

$data = mysqli_query($conn, "SELECT * FROM comments ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Komentar</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<?php include "../dashboard/navbar.php"; ?>


<div class="container mt-4">

<h3>Komentar</h3>

<form method="post" class="mb-4">
  <input name="nama" class="form-control mb-2" placeholder="Nama" required>
  <input name="email" class="form-control mb-2" placeholder="Email (opsional)">
  <textarea name="pesan" class="form-control mb-2" rows="4" placeholder="Pesan..." required></textarea>
  <button name="kirim" class="btn btn-primary">Kirim</button>
</form>

<h5>Daftar Pesan</h5>

<?php while($c = mysqli_fetch_assoc($data)): ?>
<div class="card mb-3">
  <div class="card-body">
    <strong><?= htmlspecialchars($c['nama']) ?></strong>
    <small class="text-muted">(<?= $c['email'] ?: '-' ?>)</small>
    <p class="mt-2"><?= nl2br(htmlspecialchars($c['pesan'])) ?></p>
    <small><?= $c['created_at'] ?></small><br>

    <a href="edit.php?id=<?= $c['id'] ?>" class="btn btn-warning btn-sm mt-2">Edit</a>
    <a href="delete.php?id=<?= $c['id'] ?>"
       onclick="return confirm('Hapus komentar?')"
       class="btn btn-danger btn-sm mt-2">Hapus</a>
  </div>
</div>
<?php endwhile ?>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
