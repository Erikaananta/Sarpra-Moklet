<?php
include '../koneksi.php';

function ambilInventaris($koneksi)
{
    $sql = "SELECT id_inventaris, nama FROM inventaris";
    $res = mysqli_query($koneksi, $sql);

    $data_inventaris = array();

    while ($data = mysqli_fetch_assoc($res)) {
        $data_inventaris[] = $data;
    }

    return $data_inventaris;
}

function ambilPegawai($koneksi)
{
    $sql = "SELECT id_pegawai, nama_pegawai FROM pegawai";
    $res = mysqli_query($koneksi, $sql);

    $data_pegawai = array();

    while ($data = mysqli_fetch_assoc($res)) {
        $data_pegawai[] = $data;
    }

    return $data_pegawai;
}

function ambilPeminjaman($koneksi, $id_pinjam)
{
    $sql = "SELECT * FROM peminjaman INNER JOIN pegawai ON peminjaman.id_pegawai = pegawai.id_pegawai
                                     INNER JOIN inventaris ON peminjaman.id_inventaris = inventaris.id_inventaris
                                     WHERE id_pinjam = $id_pinjam";
    $res = mysqli_query($koneksi, $sql);
    $data = mysqli_fetch_assoc($res);

    return $data;
}

function ambilJumlah($koneksi, $id_inventaris)
{
    $sql = "SELECT jumlah FROM inventaris WHERE id_inventaris = $id_inventaris";
    $res = mysqli_query($koneksi, $sql);

    $data = mysqli_fetch_assoc($res);

    return $data['jumlah'];
}

function cekPinjam($koneksi, $id_pegawai)
{
    $sql = "SELECT * FROM peminjaman WHERE id_pegawai = $id_pegawai AND status = 'dipinjam'";
    $res = mysqli_query($koneksi, $sql);

    $pinjam = mysqli_affected_rows($koneksi);

    if($pinjam == 0)
        return true;
    else 
        return false;
}

function updateJumlah($koneksi, $id_inventaris, $jumlah_update)
{
    $sql = "UPDATE inventaris SET jumlah = $jumlah_update WHERE id_inventaris = $id_inventaris";
    $res = mysqli_query($koneksi, $sql);

}


function hitungDenda($koneksi, $id_pinjam, $tgl_kembali)
{
    $denda = 0;

    $sql = "SELECT tgl_jatuh_tempo FROM peminjaman WHERE id_pinjam =$id_pinjam";
    $res = mysqli_query($koneksi, $sql);
    $data = mysqli_fetch_assoc($res);
    $tgl_jatuh_tempo = $data['tgl_jatuh_tempo'];

    $hari_denda = (strtotime($tgl_kembali) - strtotime($tgl_jatuh_tempo))/60/60/24;

    if($hari_denda >= 0)
    {
        $denda = $hari_denda * 5000;
    }

    return $denda;
}

?>