<?php

include '../koneksi.php';
include 'fungsi-transaksi.php';

if(isset($_POST['simpan']))
{
    $id_pinjam = $_POST['id_pinjam'];
    $id_inventaris = $_POST['id_inventaris'];
    $tgl_kembali = $_POST['tgl_kembali'];

    $sql = "UPDATE peminjaman SET tgl_kembali = '$tgl_kembali',
            status = 'dikembalikan' WHERE id_pinjam = $id_pinjam";

    $res = mysqli_query($koneksi, $sql);
    $count = mysqli_affected_rows($koneksi);

    $jumlah_update = ambilJumlah($koneksi, $id_inventaris) + 1;

    if($count == 1)
    {
        updateJumlah($koneksi, $id_inventaris, $jumlah_update);
        $denda = hitungDenda($koneksi,  $id_pinjam, $tgl_kembali);

        $sql = "UPDATE peminjaman SET denda = $denda WHERE id_pinjam = $id_pinjam";
        $res = mysqli_query($koneksi, $sql);

        header("Location: detail.php?id_pinjam=$id_pinjam");
    } else {
        header("Location: index.php");
    }


} else {
    header("Location: index.php");
}

?>