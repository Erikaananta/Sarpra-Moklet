<?php
include '../aset/header.php';
include '../koneksi.php';

include 'fungsi-transaksi.php';

$id_pinjam = $_GET['id_pinjam'];

$sql = "SELECT * FROM peminjaman INNER JOIN inventaris ON  peminjaman.id_inventaris = inventaris.id_inventaris WHERE
        id_pinjam = $id_pinjam";

$res = mysqli_query($koneksi, $sql);

$detail = mysqli_fetch_assoc($res);

?>


<div class="container">
    <div class="row mt-4">
        <div class="col-md-7">
            <h2>Detail Peminjaman</h2>
            <hr class="bg-light">
                <table class="table table-bordered">
                    <tr>
                        <td><strong>Nama Barang</strong></td>
                        <td><?= $detail['nama'] ?></td>
                    </tr>
                    <tr>
                        <td><strong>Tanggal Pinjam</strong></td>
                        <td><?=date('d F Y', strtotime($detail['tgl_pinjam'])) ?></td>
                    </tr>
                    <tr>
                        <td><strong>Tanggal Jatuh Tempo</strong></td>
                        <td><?=date('d F Y', strtotime($detail['tgl_jatuh_tempo'])) ?></td>
                    </tr>
                    <tr>
                        <td><strong>Tanggal Kembali</strong></td>
                        <td>
                            <?php
                            if($detail['tgl_kembali'] == NULL)
                                echo '-';
                            else
                                echo date('d F Y', strtotime($detail['tgl_kembali']));
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Status</strong></td>
                        <td><?=$detail['status']?></td>
                    </tr>
                    <?php
                    if($detail['denda']  > 0)
                    {?>
                    
                    <tr>
                        <td class="table-danger" colspan="2">
                            <strong>Denda yang harus dibayar: </strong> Rp <?= $detail['denda'] ?>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>

                    <tr>
                        <td class="text-right" colspan="2">
                            <a href="index.php" class="btn btn-success"><i class="fas fa-angle-double-left"></i>Kembali</a>
                            <a class="btn btn-primary
                                <?php if($detail['tgl_kembali'] !=NULL) {echo "disabled";} ?>" 
                            href="form-kembali.php?id_pinjam=<?= $detail['id_pinjam'] ?>&id_inventaris=<?= $detail['id_inventaris']?>" role="button">Form Pengembalian</a>
                        </td>
                    
                    </tr>
                </table>
        </div>
    </div>
</div>

<?php
include '../aset/footer.php';
?>