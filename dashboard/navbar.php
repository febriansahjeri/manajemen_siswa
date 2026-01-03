<?php
// navbar.php
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
    <a class="navbar-brand fw-bold" href="../dashboard/index.php">
      Dashboard Admin
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto gap-3 align-items-lg-center">

        <li class="nav-item">
          <a class="nav-link" href="../dashboard/index.php">Dashboard</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="../gallery/index.php">Gallery</a>
        </li>

          <!-- MENU KOMENTAR (DI SAMPING GALLERY) -->
        <li class="nav-item">
          <a class="nav-link" href="../comments/index.php">Komentar</a>
        </li>

        <li class="nav-item">
  <a class="nav-link" href="../todo/index.php">To-Do List</a>
</li>

        <li class="nav-item">
          <a class="btn btn-danger btn-sm" href="../auth/logout.php">
            Logout
          </a>
        </li>

      </ul>
    </div>
  </div>
</nav>
