<?php
    $id_kerusakan = $_POST['id_kerusakan'];
	$status = $_POST['status'];

$sql = mysql_query ("UPDATE kerusakan SET status='$status' WHERE id_kerusakan='$id_kerusakan'");
    if($sql){
    echo "<script>alert('data berhasil diubah');</script>";
    echo "<script>window.location='index.php?halaman=laporankerusakan';</script>";
}
?>