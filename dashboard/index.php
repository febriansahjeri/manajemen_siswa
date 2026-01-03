<?php
include "../config/database.php";

if (!isset($_SESSION['login']) || $_SESSION['role'] != 'admin') {
    header("Location: ../auth/login.php");
    exit;
}


$keyword = $_GET['search'] ?? '';
$page = $_GET['page'] ?? 1;
$limit = 5;
$offset = ($page - 1) * $limit;

/* TOTAL DATA */
$totalQuery = mysqli_query($conn, "SELECT COUNT(*) AS total FROM siswa");
$totalData = mysqli_fetch_assoc($totalQuery)['total'];
$totalHalaman = ceil($totalData / $limit);

/* DATA SISWA */
$sql = "SELECT * FROM siswa
        WHERE nama LIKE '%$keyword%'
           OR email LIKE '%$keyword%'
           OR kelas LIKE '%$keyword%'
        ORDER BY id DESC
        LIMIT $offset,$limit";
$data = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Dashboard</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light">

<?php include "navbar.php"; ?>


<div class="container mt-4">

<a href="siswa_add.php" class="btn btn-primary mb-3">
  <i class="bi bi-plus-lg"></i> Tambah Siswa
</a>
<a href="export_csv.php" class="btn btn-success mb-3">Export CSV</a>

<form class="row g-2 mb-3">
  <div class="col-md-4">
    <input name="search" class="form-control" placeholder="Cari..." value="<?= htmlspecialchars($keyword) ?>">
  </div>
  <div class="col-md-2">
    <button class="btn btn-primary w-100">Cari</button>
  </div>
</form>

<div class="card">
<div class="card-body">

<table class="table table-bordered">
<thead class="table-light">
<tr>
<th>No</th><th>Nama</th><th>Email</th><th>Kelas</th><th>Aksi</th>
</tr>
</thead>
<tbody>
<?php
$no = $offset + 1;
while ($s = mysqli_fetch_assoc($data)):
?>
<tr>
<td><?= $no++ ?></td>
<td><?= htmlspecialchars($s['nama']) ?></td>
<td><?= htmlspecialchars($s['email']) ?></td>
<td><?= htmlspecialchars($s['kelas']) ?></td>
<td>
<a href="siswa_edit.php?id=<?= $s['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
<a href="siswa_delete.php?id=<?= $s['id'] ?>"
   onclick="return confirm('Hapus data?')"
   class="btn btn-danger btn-sm">Hapus</a>
</td>
</tr>
<?php endwhile ?>
</tbody>
</table>

<nav>
<ul class="pagination justify-content-end">
<?php for($i=1;$i<=$totalHalaman;$i++): ?>
<li class="page-item <?= ($i==$page)?'active':'' ?>">
<a class="page-link" href="?page=<?= $i ?>&search=<?= urlencode($keyword) ?>">
<?= $i ?>
</a>
</li>
<?php endfor ?>
</ul>
</nav>

</div>
</div>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
