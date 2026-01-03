<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Siswa</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background-color: #f4f7f6; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .container { background: white; padding: 40px; border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.1); text-align: center; width: 350px; }
        h1 { margin-bottom: 20px; color: #333; }
        .btn-utama {
            display: block;
            background-color: #007bff !important;
            color: white !important;
            padding: 15px;
            margin: 10px 0;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
            transition: 0.3s;
        }
        .btn-utama:hover { background-color: #0056b3 !important; transform: translateY(-2px); }
        footer { margin-top: 20px; font-size: 12px; color: #888; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Manajemen Siswa</h1>
        <p>Selamat datang! Pilih menu tujuan:</p>
        <a href="auth/login.php" class="btn-utama">Masuk (Login)</a>
        <a href="dashboard/index.php" class="btn-utama">Dashboard</a>
        <a href="todo/index.php" class="btn-utama">Daftar Tugas</a>
        <a href="gallery/index.php" class="btn-utama">Galeri</a>
        <a href="comments/index.php" class="btn-utama">Komentar</a>
        <footer>&copy; 2026 Febriansah Jeri</footer>
    </div>
</body>
</html>