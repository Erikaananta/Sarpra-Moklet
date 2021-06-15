<?php

include '../koneksi.php';

$sql = "SELECT * FROM inventaris ORDER BY nama";

$res = mysqli_query($koneksi, $sql);

$inventaris = array();

while ($data = mysqli_fetch_assoc($res)) {
    $inventaris[] = $data;
}

include '../aset/header.php';
?>

<div class="container">
    <div class="row mt-4">
        <div class= "col-md">


<div class="card mt-4">
  <div class="card-header">
    <h2><i class="fas fa-apple-alt"></i></i> Data Inventaris</h2>
  </div>
  <div class="card-body">
  <a type="button" class="btn btn-primary mb-2" href="tambah.php"> <i class="fas fa-plus"></i> Tambah Inventaris</a>
  <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nama</th>
      <th scope="col">Jumlah</th>
      <th scope="col">Aksi</th>
    </tr>
</thead>

  <tbody>
    <?php

        $no=1;
        foreach ($inventaris as $p) { ?>

            <tr>
                <th scope="row"><?= $no ?></th>
                <td><?=$p['nama'] ?> </td>
                <td><?=$p['jumlah'] ?> </td>
                <td>
                    <a href="detail.php?id_inventaris=<?=$p['id_inventaris'] ?>" class="badge badge-success">Detail</a>
                    <a href="form-edit.php?id_inventaris=<?=$p['id_inventaris'] ?>" class="badge badge-warning">Edit</a>
                    <a href="hapus.php?id_inventaris=<?=$p['id_inventaris'] ?>" class="badge badge-danger">Hapus</a>
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