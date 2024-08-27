<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Socify.com</title>
</head>
<body>
<nav
  class="navbar navbar-expand-lg navbar-dark shadow-sm"
  style="background-color: #000000"
>
  <div class="container">
    <a class="navbar-brand" href="#section_1">Socify</a>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav ms-auto">
        <a class="nav-link active" href="../../app/views/home.php">Home</a>
        <a class="nav-link active" href="../../app/views/album.php">AlbumKu</a>
        <a class="nav-link active" href="../../app/views/uploads.php">Uploads</a>
        <a class="nav-link active" href="../../app/views/selectfoto.php">Foto</a>
        <a class="nav-link active" href="../../app/views/profile.php">Profile</a>
        <a onclick="return confirm('Apakah Yakin Akan Logout?')" class="btn btn-outline-danger" href="../../app/controllers/c_user.php?aksi=logout">Logout</a>
      </div>
    </div>
  </div>
</nav>
</body>
</html>