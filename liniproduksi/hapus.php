<?php
	$kd_liniproduksi=$_GET['kd_liniproduksi'];
	$sql = mysql_query ("DELETE FROM mst_liniproduksi WHERE kd_liniproduksi='$kd_liniproduksi'");
	if($sql){
    echo "<script>alert('data telah dihapus');</script>";
    echo "<script>window.location='index.php?halaman=lini';</script>";
}
?>