<?php

if (!(isset($_SESSION['login']))) {
    header("location: ../login/form-login.php");}

include '../koneksi.php';

if(isset($_POST['simpan']))
{
    $nama = $_POST['nama'];
    $deskripsi = $_POST['deskripsi'];
    $jumlah = $_POST['jumlah'];
    $id_jenis = $_POST['id_jenis'];
    $tgl_register = $_POST['tgl_register'];
}

$sql = "INSERT INTO inventaris (nama, deskripsi, jumlah, id_jenis, tgl_register) 
        VALUES ('$nama', '$deskripsi', $jumlah, $id_jenis, '$tgl_register')";

$res = mysqli_query ($koneksi, $sql);

    $count = mysqli_affected_rows($koneksi);

    if($count == 1)
    {
        header("Location: index.php");
    } else {
        header("Location: tambah.php");
}

?>