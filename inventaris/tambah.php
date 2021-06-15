<?php
include '../aset/header.php';
include '../koneksi.php';

$q = "SELECT *FROM jenis ORDER BY id_jenis";

$hasil = mysqli_query($koneksi, $q);

while($data = mysqli_fetch_assoc($hasil)){
    $jenis[] = $data;
}

?>

<div class="container">
    <div class="row mt-4">
        <div class = "col-md-9">
                    <div class="card">
            <div class="card-header">
                <h2>Tambah Data Barang</h2>
            </div>
            <div class="card-body">
            <form method="post" action="proses-tambah.php">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input required type="text" name ="nama" class="form-control" id="nama" placeholder="Masukan nama">
                </div>
                <div class="form-group">
                    <label for="jumlah">Jumlah</label>
                    <input type="number" name="jumlah" class="form-control" id="jumlah" placeholder="Masukan jumlah">
                </div> 
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <input required type="text" name ="deskripsi" class="form-control" id="deskripsi" placeholder="Masukan deskripsi">
                </div>
                <div class="form-group">
                    <label for="jenis">Jenis</label>
                    <select name="id_jenis">
                            <?php
                                foreach ($jenis as $k) { ?>
                                <option value="<?=$k['id_jenis']?>"> <?= $k['nama_jenis']?></option>
                            <?php
                            } 
                            ?>
                    </select>
                <div class = "form-group">
                    <label for="tgl_register">Tanggal Register</label>
                    <input type="date" name="tgl_register" class="form-control">
                </div>    
                </div>
                <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                </form>                        
            </div>
            </div>
        </div>
    </div>

</div>

<?php
 include '../aset/footer.php';
?>