<?php
include "../config/database.php";

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $pass  = $_POST['password'];

    $q = mysqli_query($conn,"SELECT * FROM users WHERE email='$email'");
    $u = mysqli_fetch_assoc($q);

   if ($u && password_verify($pass,$u['password'])) {
    $_SESSION['login'] = true;
    $_SESSION['nama']  = $u['nama'];
    $_SESSION['role']  = $u['role']; // 🔥 SIMPAN ROLE

    // 🔀 ARAHKAN SESUAI ROLE
    if ($u['role'] == 'admin') {
        header("Location: ../dashboard/index.php");
    } else {
        header("Location: ../user/index.php");
    }
    exit;
} else {
        echo "<script>alert('Login gagal');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <link rel="stylesheet" href="../assets/css/style.css?v=2">

</head>
<body>

<div class="card">
  <h2 class="form-title">Login</h2>

  <form method="post">

    <div class="form-group">
      <label>Email</label>
      <input type="email" name="email" required>
    </div>

    <div class="form-group">
      <label>Password</label>
      <input type="password" name="password" required>
    </div>

    <button name="login">Login</button>

    <a href="register.php">
      <button type="button" class="btn-secondary">Register</button>
    </a>

  </form>
</div>

</body>
</html>
