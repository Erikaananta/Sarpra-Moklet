<?php
include '../aset/header.php';
include '../koneksi.php';

$id_pegawai = $_GET['id_pegawai'];

$sql = "SELECT * FROM pegawai WHERE id_pegawai = $id_pegawai";

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
                    Detail Pegawai
                </div>
                <div class="card-body">
                <table class="table">
                    <tr>
                        <td><strong>Nama</strong></td>
                        <td><?= $detail['nama_pegawai'] ?></td>
                    </tr>
                    <tr>
                        <td><strong>Telepon</strong></td>
                        <td><?= $detail['telp'] ?></td>
                    </tr>
                    <tr>
                        <td><strong>Alamat</strong></td>
                        <td><?= $detail['alamat'] ?></td>
                    </tr>
                    <tr>
                        <td></td>                           
                        <td>
                            <a href="index.php" class="btn btn-success"><i class="fas fa-angle-double-left"></i>Kembali</a>
                            <!-- <a href="form-edit.php"class="btn btn-warning">Edit<i class="fas fa-angle-double-right"></i></a> -->
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