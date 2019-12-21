<?php
	$kd_komponen=$_GET['kd_komponen'];
	$sql = mysql_query ("DELETE FROM mst_komponen WHERE kd_komponen='$kd_komponen'");
	if($sql){
    echo "<script>alert('data telah dihapus');</script>";
    echo "<script>window.location='index.php?halaman=komponen';</script>";
}
?>