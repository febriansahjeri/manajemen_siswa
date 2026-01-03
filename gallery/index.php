<?php
include "../config/database.php";
include "../middleware/admin.php";
include "../partials/navbar.php";

$data = mysqli_query($conn, "SELECT * FROM gallery ORDER BY id DESC");
?>


<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Gallery</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-4">
  <h3 class="mb-4">Gallery</h3>

  <form action="upload.php" method="post" enctype="multipart/form-data" class="mb-4">
    <label class="form-label fw-semibold">Upload gambar (boleh banyak sekaligus)</label>
    <input type="file" name="gambar[]" multiple required class="form-control mb-2">
    <button class="btn btn-primary">Upload</button>
  </form>

  <div class="row g-3">
    <?php while($g = mysqli_fetch_assoc($data)): ?>
      <div class="col-md-3">
        <div class="card shadow-sm">
          <img src="../uploads/gallery/<?= $g['filename'] ?>"
               class="card-img-top"
               style="height:180px;object-fit:cover">

          <div class="card-body text-center">
            <small class="text-muted d-block mb-2">
              <?= date("Y-m-d H:i", strtotime($g['created_at'])) ?>
            </small>

            <a href="delete.php?id=<?= $g['id'] ?>"
               onclick="return confirm('Hapus gambar?')"
               class="btn btn-danger btn-sm w-100">
               Hapus
            </a>
          </div>
        </div>
      </div>
    <?php endwhile ?>
  </div>
</div>

</body>
</html>
