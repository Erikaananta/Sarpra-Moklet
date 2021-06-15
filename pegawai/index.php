<?php

include '../koneksi.php';

$sql = "SELECT * FROM pegawai ORDER BY nama_pegawai";

$res = mysqli_query($koneksi, $sql);

$pegawai= array();

while ($data = mysqli_fetch_assoc($res)) {
    $pegawai[] = $data;
}

include '../aset/header.php';
?>

<div class="container">
    <div class="row mt-4">
        <div class= "col-md">


<div class="card mt-4">
  <div class="card-header">
    <h2><i class="fas fa-user"></i> Data Pegawai</h2>
  </div>
  <div class="card-body">
  <a type="button" class="btn btn-success mb-2" href="tambah-pegawai.php"> <i class="fas fa-plus"></i> Tambah Pegawai</a>
  <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nama</th>
      <th scope="col">Telpon</th>
      <th scope="col">Aksi</th>
    </tr>
</thead>

  <tbody>
    <?php

        $no=1;
        foreach ($pegawai as $p) { ?>

            <tr>
                <th scope="row"><?= $no ?></th>
                <td><?=$p['nama_pegawai'] ?> </td>
                <td><?=$p['telp'] ?> </td>
                <td>
                    <a href="detail.php?id_pegawai=<?=$p['id_pegawai'] ?>" class="badge badge-success">Detail</a>
                    <a href="form-edit.php?id_pegawai=<?=$p['id_pegawai'] ?>" class="badge badge-warning">Edit</a>
                    <a href="hapus.php?id_pegawai=<?=$p['id_pegawai'] ?>" class="badge badge-danger">Hapus</a>
                </td>
            </tr>
    <?php
        $no++;
        }
    ?>
  </tbody>


</table>
  </div>
</div>

    </div>
<?php
include '../aset/footer.php';
?>