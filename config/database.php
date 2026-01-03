<?php
$conn = mysqli_connect("localhost", "root", "", "manajemen_siswa");

if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
