<?php

include '../aset/header.php';

include '../koneksi.php';

$id_pinjam = $_GET['id_pinjam'];
$id_inventaris = $_GET['id_inventaris'];

$sql = "SELECT nama FROM inventaris WHERE id_inventaris = $id_inventaris";
$res = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_assoc($res);

?>

<div class="container">
    <div class="row mt-4">
        <div class= col-md-6>
            <div class="card">
                <h5 class="card-header">Form Pengembalian</h5>
                <div class="card-body">
                <form method="post" action="proses-kembali.php">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" disabled value="<?=$data['nama'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="tgl_kembali">Tanggal Kembali</label>
                        <input type="date" name="tgl_kembali" class="form-control">
                    </div>
                    <input type="hidden" name="id_pinjam" value="<?= $id_pinjam ?>">
                    <input type="hidden" name="id_buku" value="<?= $id_inventaris ?>">
                    <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
include '../aset/footer.php';
?>