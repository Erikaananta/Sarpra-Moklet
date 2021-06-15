<?php
include '../aset/header.php';
include '../koneksi.php';

$id_inventaris= $_GET['id_inventaris'];

$sql = "SELECT * FROM inventaris INNER JOIN jenis ON  inventaris.id_jenis = jenis.id_jenis WHERE
        id_inventaris = $id_inventaris";

$res = mysqli_query($koneksi, $sql);

$detail = mysqli_fetch_assoc($res);

?>


<div class="container">
    <div class="row mt-4">
        <div class="col-md-7">
            <h2>Detail <i class="fas fa-info-circle"></i></h2>
            <hr class="bg-light">
            <div class="card">
                <div class="card-header">
                    Detail Inventaris
                </div>
                <div class="card-body">
                <table class="table">
                    <tr>
                        <td><strong>Nama</strong></td>
                        <td><?= $detail['nama'] ?></td>
                    </tr>
                    <tr>
                        <td><strong>Jumlah</strong></td>
                        <td><?= $detail['jumlah'] ?></td>
                    </tr>
                    <tr>
                        <td><strong>Jenis</strong></td>
                        <td><?= $detail['nama_jenis'] ?></td>
                    </tr>
                    <tr>
                        <td><strong>Deskripsi</strong></td>
                        <td><?= $detail['deskripsi'] ?></td>
                    </tr>
                    <tr>
                        <td><strong>Tanggal  </strong></td>
                        <td><?= $detail['tgl_register'] ?></td>
                        
                    </tr>
                    <tr>
                        <td></td>                           
                        <td>
                            <a href="index.php" class="btn btn-success"><i class="fas fa-angle-double-left"></i>Kembali</a>
                            <!-- <a href="edit.php"class="btn btn-warning">Edit<i class="fas fa-angle-double-right"></i></a> -->
                        </td>
                    </tr>
                    </table>                  
                </div>
            </div>
        </div>
    </div>
</div>



<?php
include '../aset/footer.php';
?>