<?php 

include '../koneksi.php';

$id_pinjam = $_GET['id_pinjam'];

$query = "DELETE FROM peminjaman WHERE id_pinjam = $id_pinjam";

$result = mysqli_query($connect, $query);

$num = mysqli_affected_rows($connect);

if ($num > 0)
 {
  echo "<script>alert('Berhasil hapus data !'); window.location='index.php'</script>";
}
else
{
  echo "<script>alert('Gagal hapus data !'); window.location='index.php'</script>";
}

 ?>