<?php

include 'koneksi.php';
include 'aset/header.php';

$sql_pegawai = "SELECT * FROM pegawai";
$res_pegawai = mysqli_query($koneksi, $sql_pegawai);

$count_pegawai = mysqli_affected_rows($koneksi);

$sql_inventaris = "SELECT * FROM inventaris";
$res_inventaris = mysqli_query($koneksi, $sql_inventaris);

$count_inventaris = mysqli_affected_rows($koneksi);

$sql_peminjaman = "SELECT * FROM peminjaman";
$res_peminjaman = mysqli_query($koneksi, $sql_peminjaman);

$count_peminjaman = mysqli_affected_rows($koneksi);

?>

<div class="container">
    <div class="row mt-4">
        <div class="col-md">
        <h2><i class="fas fa-chart-line mr-2"></i>Dashboard</h2>
        <hr class="bg-light">
        </div>
    </div>
    <div class="row">
    <div class="col-md-4">
        <div class="card border-primary mb-3" style="max-width: 18rem;">
            <div class="card-header"><a class="navbar-brand" href="http://localhost/sarpra/inventaris/index.php">Barang</a></div>
            <div class="card-body text-primary">
            <p class="card-text" style="font-size:60px"><?= $count_inventaris ?></p>
            <a href="http://localhost/sarpra/inventaris/index.php" class="btn btn-primary">Lebih Detail <i class="fas fa-angle-double-right"></i></a>
        </div>
    </div>
    </div>
        <div class="col-md-4">
        <div class="card border-success mb-3" style="max-width: 18rem;">
            <div class="card-header"><a class="navbar-brand" href="http://localhost/sarpra/pegawai/index.php">Pegawai</a></div>
            <div class="card-body text-success">
            <p class="card-text" style="font-size:60px"><?= $count_pegawai?></p>
            <a href="http://localhost/sarpra/pegawai/index.php" class="btn btn-success">Lebih Detail <i class="fas fa-angle-double-right"></i></a>
        </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border-danger mb-3" style="max-width: 18rem;">
            <div class="card-header"><a class="navbar-brand" href="http://localhost/sarpra/peminjaman/index.php">Peminjaman</a></div>
            <div class="card-body text-danger">
            <p class="card-text" style="font-size:60px"><?= $count_peminjaman?></p>
            <a href="http://localhost/sarpra/peminjaman/index.php" class="btn btn-danger">Lebih Detail <i class="fas fa-angle-double-right"></i></a>
        </div>
        </div>
    </div>


</div>


<?php

include 'aset/footer.php';

?>