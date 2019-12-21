<?php
	$kd_laporanbefore=$_GET['kd_laporanbefore'];
	$sql = mysql_query ("DELETE FROM laporan_beforeprocess WHERE kd_laporanbefore='$kd_laporanbefore'");
	if($sql){
    echo "<script>alert('data telah dihapus');</script>";
    echo "<script>window.location='index.php?halaman=laporanbefore';</script>";
}
?>