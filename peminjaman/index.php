<?php

include '../koneksi.php';

$sql = "SELECT * FROM peminjaman INNER JOIN pegawai ON peminjaman.id_pegawai = pegawai.id_pegawai
        INNER JOIN petugas ON peminjaman.id_petugas = petugas.id_petugas ORDER BY peminjaman.tgl_pinjam";

$res = mysqli_query($koneksi, $sql);

$pinjam = array();

while ($data = mysqli_fetch_assoc($res)) {
    $pinjam[] = $data;
}

include '../aset/header.php';
?>

<div class="container">
    <div class="row mt-4">
        <div class= "col-md">


<div class="card">
  <div class="card-header">
    <h2 class="card-title"><i class="fas fa-edit"></i>Data Peminjaman</h2>
  </div>
  <div class="card-body">
  <a type="button" class="btn btn-danger mb-2" href="form-pinjam.php"> <i class="fas fa-plus"></i> Tambah Peminjaman</a>
  <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nama Peminjam</th>
      <th scope="col">Tanggal Peminjam</th>
      <th scope="col">Tanggal Jatuh Tempo</th>
      <th scope="col">Petugas</th>
      <th scope="col">Status</th>
      <th scope="col">Aksi
      </th>
    </tr>


  <tbody>
    <?php

        $no = 1;
        foreach ($pinjam as $p) { ?> 

            <tr>
                <th scope="row"><?= $no ?></td>
                <td><?= $p['nama_pegawai'] ?> </td>
                <td><?= date('d F Y', strtotime($p['tgl_pinjam'])) ?></td>
                <td><?= date('d F Y', strtotime($p['tgl_jatuh_tempo'])) ?></td>
                <td><?= $p['nama_petugas'] ?> </td>
                <td>
                  <?php

                      if($p['status'] == "dipinjam")
                      {
                        echo '<h5><span class="badge badge-info">Dipinjam</span></h5>';
                      } else {
                        echo '<h5><span class="badge badge-secondary">Kembali</span></h5>';
                      }

                  ?>
                  </td>
                  <td>
                    <a href="detail.php?id_pinjam=<?= $p['id_pinjam'] ?>&nama=<?= $p['nama_pegawai'] ?>" class="badge badge-success">Detail</a>
                    <a href="form-edit.php?id_pinjam=<?= $p['id_pinjam']?>" class="badge badge-warning">Edit</a>
                    <a href="hapus.php?id_pinjam <?= $p['id_pinjam'] ?>" class="badge badge-danger">Hapus</a>
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
</div>
    </div>
<?php
include '../aset/footer.php';
?>