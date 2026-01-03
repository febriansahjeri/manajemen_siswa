<?php
include "../config/database.php";

if (isset($_POST['register'])) {
    $nama  = htmlspecialchars($_POST['nama']);
    $email = htmlspecialchars($_POST['email']);
    $pass  = $_POST['password'];
    $pass2 = $_POST['password2'];

    if ($pass !== $pass2) {
        echo "<script>alert('Password tidak sama');</script>";
        return;
    }

    $cek = mysqli_query($conn,"SELECT email FROM users WHERE email='$email'");
    if (mysqli_num_rows($cek) > 0) {
        echo "<script>alert('Email sudah terdaftar');</script>";
        return;
    }

    $password = password_hash($pass, PASSWORD_DEFAULT);

    $foto = $_FILES['foto']['name'];
    $tmp  = $_FILES['foto']['tmp_name'];
    $ext  = pathinfo($foto, PATHINFO_EXTENSION);
    $namaFoto = uniqid().".".$ext;
    move_uploaded_file($tmp, "../uploads/profile/".$namaFoto);

    mysqli_query($conn,"INSERT INTO users VALUES(
      null,'$nama','$email','$password','$namaFoto',NOW()
    )");

    echo "<script>alert('Registrasi berhasil');window.location='login.php';</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Register</title>
  <link rel="stylesheet" href="../assets/css/style.css?v=2">

</head>
<body>

<div class="card">
  <h2 class="form-title">Register</h2>

  <form method="post" enctype="multipart/form-data">

    <div class="photo-upload">
      <img id="preview" class="photo-preview" style="display:none;">
      <input type="file" name="foto" accept="image/*" onchange="previewFoto(this)" required>
    </div>

    <div class="form-group">
      <label>Nama</label>
      <input type="text" name="nama" required>
    </div>

    <div class="form-group">
      <label>Email</label>
      <input type="email" name="email" required>
    </div>

    <div class="form-group">
      <label>Password</label>
      <input type="password" name="password" required>
    </div>

    <div class="form-group">
      <label>Konfirmasi Password</label>
      <input type="password" name="password2" required>
    </div>

    <button name="register">Daftar</button>

    <div class="form-footer">
      Sudah punya akun? <a href="login.php">Login</a>
    </div>

  </form>
</div>

<script>
function previewFoto(input){
  const preview = document.getElementById("preview");
  if(input.files && input.files[0]){
    preview.src = URL.createObjectURL(input.files[0]);
    preview.style.display = "block";
  }
}
</script>

</body>
</html>
