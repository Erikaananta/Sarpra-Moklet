<?php

include '../koneksi.php';
include '../aset/header.php';

$sql = "SELECT * FROM inventaris ORDER BY nama";
$res = mysqli_query($koneksi, $sql);
$id_inventaris = array();

while ($data = mysqli_fetch_assoc($res)){
    $id_inventaris[] = $data;
}

$id_inventaris = $_GET['id_inventaris'];

$q_inventaris = "SELECT * FROM inventaris
              where id_inventaris = $id_inventaris";

$hasil_inventaris = mysqli_query($koneksi, $q_inventaris);

$inventaris = mysqli_fetch_assoc($hasil_inventaris);

if(isset($_POST['simpan']))
{
    $nama = $_POST['nama'];
    $deskripsi = $_POST['deskripsi'];
    $jumlah = $_POST['jumlah'];

    $q_update = "UPDATE inventaris SET nama = '$nama', 
                                 deskripsi = '$deskripsi',
                                 jumlah = $jumlah
                WHERE id_inventaris = $id_inventaris";
    
    $hasil_update = mysqli_query($koneksi, $q_update);

    $cek = mysqli_affected_rows($koneksi);

    if($cek == 1){
        header("Location: index.php");
    }
    else{
        echo "GAGAL";
    }
}

?>

<div class="container">
    <div class="row mt-4">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <h2>Edit Data Inventaris</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" class="form-control" id="nama" value="<?= $inventaris['nama'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="jumlah">Jumlah</label>
                            <input type="text" name="jumlah" class="form-control" id="jumlah" value="<?= $inventaris['jumlah'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <input type="text" class="form-control" name="deskripsi" id="deskripsi" value="<?= $inventaris['deskripsi'] ?>">
                        </div>
                        <div class = "form-group">
                            <label for="tgl_register">Tanggal Register</label>
                            <input type="date" name="tgl_register" class="form-control">
                        </div>
                        <input type="hidden" name="id_inventaris" id="id_inventaris" value="<?= $inventaris['id_inventaris']?>">
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