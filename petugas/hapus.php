<?php
	$kd_petugas=$_GET['kd_petugas'];
	$sql = mysql_query ("DELETE FROM mst_petugas WHERE kd_petugas='$kd_petugas'");
	if($sql){
    echo "<script>alert('data telah dihapus');</script>";
    echo "<script>window.location='index.php?halaman=petugas';</script>";
}
?>