<?php
include "../config/database.php";

if (!isset($_SESSION['login']) || $_SESSION['role'] != 'user') {
    header("Location: ../auth/login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Dashboard User</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
  <div class="card p-4">
    <h3>Halo, <?= $_SESSION['nama'] ?></h3>
    <p>Login sebagai <b>User</b></p>

    <a href="../comments/index.php" class="btn btn-primary">Komentar</a>
    <a href="../auth/logout.php" class="btn btn-danger">Logout</a>
  </div>
</div>

</body>
</html>
