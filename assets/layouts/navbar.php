<?php 
include_once '../../app/controllers/conn.php';
if (!isset($_SESSION["data"])) {
    header("Location: ../../index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="stylesheet" href="/ujikom_mvc/assets/css/dashboard.css">
    <link rel="icon" href="/ujikom_mvc/assets/img/logo.png">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />


    <title>Socify.com</title>
</head>
<body>
<nav class="navbar navbar-expand-lg fixed-top text-dark p-3">
  <div class="container-fluid">
    <h6 class="navbar-brand fw-bolder" href="#">SOCIALIX</h6>
      <div class="navbar-nav ms-auto">
        <a href="../../app/views/home.php">Home</a>
        <a href="../../app/views/album.php">AlbumKu</a>
        <a href="../../app/views/uploads.php">Uploads</a>
        <a href="../../app/views/selectfoto.php">Foto</a>
        <li class="nav-item dropdown pe-3">
    <a dropdown-toggle href="#" data-bs-toggle="dropdown" aria-expanded="false">
    <i class="far fa-user"></i>
        <?= $_SESSION['data']['Username'] ?>
    </a>
    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
        <li class="dropdown-header">
            <h6><?= $_SESSION['data']['Username'] ?></h6>
            <span><?= $_SESSION['data']['Email'] ?></span>
        </li>
        <li>
            <hr class="dropdown-divider">
        </li>
        <li>
            <a class="dropdown-item d-flex align-items-center" href="../../app/views/profile.php">
            <i class="far fa-user"></i>
                <span>My Profile</span>
            </a>
        </li>
        <li>
            <hr class="dropdown-divider">
        </li>
        <li>
            <a class="dropdown-item d-flex align-items-center" href="../../app/controllers/c_user.php?aksi=logout" onclick="return confirm('Yakin ingin keluar dari aplikasi?')">
            <i class="fas fa-sign-out-alt"></i>
                <span>Sign Out</span>
            </a>
        </li>
    </ul>
</li>

       
      </div>
      </div>
</nav>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
      <script>
        AOS.init();
      </script>
       <script>
      window.addEventListener("scroll", function () {
        var navbar = document.querySelector("nav");
        navbar.classList.toggle("sticky", window.scrollY > 0);
      });
    </script>
<script src="../js/scrool.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>