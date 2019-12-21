<?php
	$kd_tipeengine=$_GET['kd_tipeengine'];
	$sql = mysql_query ("DELETE FROM mst_tipeengine WHERE kd_tipeengine='$kd_tipeengine'");
	if($sql){
    echo "<script>alert('data telah dihapus');</script>";
    echo "<script>window.location='index.php?halaman=tipe';</script>";
}
?>