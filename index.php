<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Siswa</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f7f6;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #fff;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            text-align: center;
            max-width: 400px;
            width: 90%;
        }
        h1 {
            color: #333;
            margin-bottom: 1.5rem;
            font-size: 24px;
        }
        .menu-list {
            list-style: none;
            padding: 0;
        }
        .menu-list li {
            margin: 10px 0;
        }
        .btn {
            display: block;
            text-decoration: none;
            background-color: #007bff;
            color: white;
            padding: 12px;
            border-radius: 8px;
            transition: background 0.3s ease;
            font-weight: 500;
        }
        .btn:hover {
            background-color: #0056b3;
        }
        .btn-secondary {
            background-color: #6c757d;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
        }
        footer {
            margin-top: 20px;
            font-size: 12px;
            color: #888;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Manajemen Siswa</h1>
        <p>Selamat datang! Pilih menu tujuan:</p>
        
        <ul class="menu-list">
            <li><a href="auth/login.php" class="btn">Masuk (Login)</a></li>
            <li><a href="dashboard/" class="btn btn-secondary">Dashboard</a></li>
            <li><a href="todo/" class="btn btn-secondary">Daftar Tugas</a></li>
            <li><a href="gallery/" class="btn btn-secondary">Galeri</a></li>
        </ul>

        <footer>
            &copy; 2026 Febriansah Jeri
        </footer>
    </div>

</body>
</html>
