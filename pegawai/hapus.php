<?php 

include '../koneksi.php';

$id_pegawai = $_GET['id_pegawai'];

$query = "DELETE FROM pegawai WHERE id_pegawai = $id_pegawai";

$hasil = mysqli_query($koneksi, $query);

$cek = mysqli_affected_rows($koneksi);

if($cek == 1)
{
    header("Location: index.php");
}
else
{
    echo "Gagal hapus data";
}

?>