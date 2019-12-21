<?php
	$kd_laporanin=$_GET['kd_laporanin'];
	$sql = mysql_query ("DELETE FROM laporan_inprocess WHERE kd_laporanin='$kd_laporanin'");
	if($sql){
    echo "<script>alert('data telah dihapus');</script>";
    echo "<script>window.location='index.php?halaman=laporanin';</script>";
}
?>