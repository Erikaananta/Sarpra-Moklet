<?php

include '../koneksi.php';

$id_inventaris = $_POST['id_inventaris'];
$nama = $_POST['nama'];
$deskripsi = $_POST['deskripsi'];
$jumlah = $_POST['jumlah'];
$tgl_register = $_POST['tgl_register'];

$data = "UPDATE inventaris set nama ='$nama', deskripsi='$deskripsi', jumlah=$jumlah, tgl_register_$tgl_register  where id_jenis='$id_inventaris'";

$result = mysqli_query($koneksi, $data);

$cek = mysqli_affected_rows($koneksi);

if($cek > 0) {
    header("location: index.php");
}else{
    echo "GAGAL";
}
?>