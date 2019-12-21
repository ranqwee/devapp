<?php
    $kd_liniproduksi = $_POST['kd_liniproduksi'];
    $nama_liniproduksi = $_POST['nama_liniproduksi'];

$sql = mysql_query ("UPDATE mst_liniproduksi SET nama_liniproduksi='$nama_liniproduksi' WHERE kd_liniproduksi='$kd_liniproduksi'");
    if($sql){
    echo "<script>alert('data berhasil diubah');</script>";
    echo "<script>window.location='index.php?halaman=lini';</script>";
}
?>