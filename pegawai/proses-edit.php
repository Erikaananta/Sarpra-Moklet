<?php

include '../koneksi.php';

$id_pegawai = $_POST['id_pegawai'];
$nama_pegawai = $_POST['nama_pegawai']; 
$telp = $_POST['telp'];
$alamat = $_POST['alamat'];

$query = "UPDATE pegawai SET nama_pegawai='$nama_pegawai',telp='$telp',alamat='$alamat' where id_pegawai='$id_pegawai'";

$result = mysqli_query($koneksi, $query);

$cek = mysqli_affected_rows($koneksi);

if($cek > 0) {
    header("location: index.php");
}else{
    echo "GAGAL";
}
?>