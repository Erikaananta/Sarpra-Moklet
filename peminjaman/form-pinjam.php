<?php

include '../koneksi.php';
include 'fungsi-transaksi.php';

$inventaris = ambilInventaris($koneksi);
$pegawai = ambilPegawai($koneksi);

include '../aset/header.php';

?>

<div class = "container">
    <div class ="row mt-4">
        <div class = "col md-8">
            <div class = "card">
                <div class = "card-header">
                <h3>Form Tambah Peminjaman</h3>
            </div>
            <div class = "card-body">
                <form method="post" action="proses-pinjam.php">
                    <div  class = "form-group">
                        <label for="pegawai">Nama</label>
                        <select name="id_pegawai" class="form-control">
                            <?php
                            foreach($pegawai as $a) { ?>
                            <option value="<?= $a['id_pegawai'] ?>"><?= $a['nama_pegawai'] ?></option>
                            <?php
                             }
                            ?>
                        </select>
                    </div>
                    
                    <div  class = "form-group">
                        <label for="inventaris">Barang</label>
                        <select name="id_inventaris" class="form-control">
                            <?php
                            foreach($inventaris as $b) { ?>
                                <option value="<?= $b['id_inventaris'] ?>"><?= $b['nama'] ?></option>
                            <?php
                             }
                            ?>
                        </select>
                    </div>

                    <div class = "form-group">
                        <label for="buku">Tanggal Peminjaman</label>
                        <input type="date" name="tgl_pinjam" class="form-control">
                    </div>         
                    
                    <div class = "form-group">
                    <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                    </div>     
                </form>
            </div>
        </div>
    </div>
</div>


<?php

include '../aset/footer.php'

?>