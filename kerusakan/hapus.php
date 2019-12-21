<?php
	$id_kerusakan = $_GET['id_kerusakan'];
	$sql = mysql_query ("DELETE FROM kerusakan WHERE id_kerusakan = '$id_kerusakan'");
	if($sql){
    echo "<script>alert('data telah dihapus');</script>";
    echo "<script>window.location='index.php?halaman=laporankerusakan';</script>";
}
?>