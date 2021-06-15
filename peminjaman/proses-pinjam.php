<?php

include '../koneksi.php';
include 'fungsi-transaksi.php';

if(isset($_POST['simpan']))
{
    $id_pegawai = $_POST['id_pegawai'];
    $id_inventaris = $_POST['id_inventaris'];
    $tgl_pinjam = $_POST['tgl_pinjam'];
    $tgl_jatuh_tempo = date('Y-m-d', strtotime($tgl_pinjam . '+ 7 days'));

    $sql = "INSERT INTO peminjaman (id_pegawai, id_inventaris, tgl_pinjam, tgl_jatuh_tempo, id_petugas)
            VALUES ($id_pegawai, $id_inventaris, '$tgl_pinjam', '$tgl_jatuh_tempo', 1)";

    $jumlah = ambilJumlah($koneksi, $id_inventaris);
            
    if(cekPinjam($koneksi, $id_pegawai) && $jumlah > 0)
    {
        $res = mysqli_query($koneksi, $sql);

        $count = mysqli_affected_rows($koneksi);

        $jumlah_update = $jumlah - 1;
        if($count == 1)
        {
            updateJumlah($koneksi, $id_inventaris, $jumlah_update);
            header("Location: index.php");
        }
    } else {
        header("Location: index.php");
    }
} else {
    header("Location: form-pinjam.php");
}

?>