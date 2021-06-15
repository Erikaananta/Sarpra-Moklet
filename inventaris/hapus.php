<?php 

include '../koneksi.php';

$id_inventaris = $_GET['id_inventaris'];

$query = "DELETE FROM inventaris WHERE id_inventaris = $id_inventaris";

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