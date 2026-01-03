<?php
include "../config/database.php";

if (!isset($_SESSION['login']) || $_SESSION['role'] != 'admin') {
    header("Location: ../auth/login.php");
    exit;
}


header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="data_siswa.csv"');

$output = fopen("php://output", "w");
fputcsv($output, ['Nama','Email','Kelas']);

$q = mysqli_query($conn, "SELECT nama,email,kelas FROM siswa");
while ($row = mysqli_fetch_assoc($q)) {
  fputcsv($output, $row);
}
fclose($output);
exit;
