<?php
include "../config/database.php";

if (!isset($_SESSION['login']) || $_SESSION['role'] != 'admin') {
    header("Location: ../auth/login.php");
    exit;
}

$id = (int) $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM comments WHERE id=$id"));

if (isset($_POST['update'])) {
  $nama  = htmlspecialchars($_POST['nama']);
  $email = htmlspecialchars($_POST['email']);
  $pesan = htmlspecialchars($_POST['pesan']);

  mysqli_query($conn,"UPDATE comments SET
    nama='$nama',
    email='$email',
    pesan='$pesan'
    WHERE id='$id'");

  header("Location: index.php");
  exit;
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Komentar</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<?php include "../dashboard/navbar.php"; ?>

<div class="container mt-4">
<h3>Edit Komentar</h3>

<form method="post">
  <input name="nama" class="form-control mb-2" value="<?= $data['nama'] ?>" required>
  <input name="email" class="form-control mb-2" value="<?= $data['email'] ?>">
  <textarea name="pesan" class="form-control mb-2" rows="4" required><?= $data['pesan'] ?></textarea>
  <button name="update" class="btn btn-primary">Update</button>
</form>
</div>

</body>
</html>
