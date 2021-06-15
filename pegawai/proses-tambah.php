<?php

include '../koneksi.php';

if(isset($_POST['simpan']))
{
    $nama_pegawai = $_POST['nama_pegawai'];
    $telp = $_POST['telp'];
    $alamat = $_POST['alamat'];

    $sql = "INSERT INTO pegawai(nama_pegawai, telp, alamat) VALUES
            ('$nama_pegawai','$telp', '$alamat')";

    $res = mysqli_query ($koneksi, $sql);

    $count = mysqli_affected_rows($koneksi);

    if($count == 1)
    {
        header("Location: index.php");
    } else {
        header("Location: tambah-pegawai.php");
    }

} else {
    header("Location: tambah-pegawai.php");
}

?>