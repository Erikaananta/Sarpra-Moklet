<?php
include '../aset/header.php';

?>

<div class="container">
    <div class="row mt-4">
        <div class = "col-md-9">
            <div class="card">
                <div class="card-header">
                    <h2>Tambah Pegawai <i class="fas fa-users"></i></h2>
                </div>
                <div class="card-body">
                <form method="post" action="proses-tambah.php">
                    <div class="form-group">
                        <label for="anggota">Nama Lengkap</label>
                        <input required type="text" name ="nama_pegawai" class="form-control" id="nama_pegawai" placeholder="Masukan Nama Lengkap">
                        <small class="form-text text-muted">contoh : Erika Ananta</small>
                    </div> 
                    <div class="form-group">
                        <label for="telp">Nomor Telpon</label>
                        <input type="number" name="telp" class="form-control" id="telp" placeholder="Masukan Nomor Telepon">
                        <small class="form-text text-muted">contoh : 1112223333</small>
                    </div>
                    <div class="form-group">
                        <label for="username">Alamat</label>
                        <input type="text" name ="alamat" class="form-control" id="alamat" placeholder="Masukan Alamat">
                        <small class="form-text text-muted">contoh : Jl. Danau Tambingan G-6 D-21</small>
                    </div>
                    <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                </form>                        
            </div>
        </div>
    </div>
</div>

<?php
 include '../aset/footer.php';
?>