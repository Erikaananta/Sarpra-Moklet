<?php
include '../koneksi.php';

$id_pegawai = $_GET['id_pegawai'];

$query= "SELECT * FROM pegawai where id_pegawai = $id_pegawai";

$data = mysqli_query($koneksi, $query);

$var = mysqli_fetch_assoc($data);

   

include '../aset/header.php'
?>

<div class="container">
    <div class="row mt-4">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <h2>Edit Data Pegawai</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="proses-edit.php">
                        <div class="form-group">
                            <label for="nama_pegawai">Nama</label>
                            <input type="text" name="nama_pegawai" class="form-control" id="nama_pegawai" value="<?= $var['nama_pegawai'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="telp">Nomor Telepon</label>
                            <input type="number" name="telp" class="form-control" id="exampleInputPassword1" value="<?= $var['telp'] ?>">
                            <small class="form-text text-muted">Ex: 1112223333</small>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" name="alamat" id="alamat" value="<?= $var['alamat'] ?>">
                        </div>
                        <input type="hidden" name="id_pegawai" id="id_inventaris" value="<?php echo $var['id_pegawai'];?>">
                        <button type="submit" name="simpan" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include '../aset/footer.php';
?>