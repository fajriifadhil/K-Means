<?php
include '../koneksi.php';

$delete1 = mysqli_query($koneksi, "DELETE FROM data_hasil WHERE id_mobil = '$_GET[id_mobil]'");
$delete2 = mysqli_query($koneksi, "DELETE FROM data_mobil WHERE id_mobil = '$_GET[id_mobil]'");
echo "<script>alert('Data Berhasil Di Hapus');window.location='data_mobil.php'</script>";

?>