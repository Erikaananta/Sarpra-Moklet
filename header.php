<?php
session_start();
if(!isset($_SESSION['login']))
{
    header("Location: http://localhost/sarpra/login/");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="http://localhost/siperpus/aset/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://localhost/siperpus/aset/fontawesome/css/all.min.css">

    <title>Sarpra</title>

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-primary">
  <a class="navbar-brand" href="#"><i class="fas fa-book-reader text-white mr-2"></i>SARANA PRASARANA | Hallo!! </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
    <ul class="navbar-nav mr-auto">
      <a class="nav-item nav-link" href="http://localhost/sarpra/index.php">Dashboard</a>
      <a class="nav-item nav-link" href="http://localhost/sarpra/inventaris/index.php">Barang</a>
      <a class="nav-item nav-link" href="http://localhost/sarpra/pegawai/index.php">Pegawai</a>
      <a class="nav-item nav-link" href="http://localhost/sarpra/peminjaman/index.php">Peminjaman</a>
      <a class="nav-item nav-link" href="http://localhost/sarpra/login/logout.php">Logout</a>
      </div>
    </div>
  </div>
  </form>
</nav>