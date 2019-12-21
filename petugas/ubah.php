<?php
    $kd_petugas = $_POST['kd_petugas'];
    $nama_petugas = $_POST['nama_petugas'];

$sql = mysql_query ("UPDATE mst_petugas SET nama_petugas='$nama_petugas' WHERE kd_petugas='$kd_petugas'");
    if($sql){
    echo "<script>alert('data berhasil diubah');</script>";
    echo "<script>window.location='index.php?halaman=petugas';</script>";
}
?>