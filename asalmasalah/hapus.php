<?php
	$kd_asalmasalah=$_GET['kd_asalmasalah'];
	$sql = mysql_query ("DELETE FROM mst_asal_masalah_komponen WHERE kd_asalmasalah='$kd_asalmasalah'");
	if($sql){
    echo "<script>alert('data telah dihapus');</script>";
    echo "<script>window.location='index.php?halaman=dataasalmasalah';</script>";
}
?>