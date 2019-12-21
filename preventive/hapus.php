<?php
	$id_preventive = $_GET['id_preventive'];
	$sql = mysql_query ("DELETE FROM preventive WHERE id_preventive = '$id_preventive'");
	if($sql){
    echo "<script>alert('data telah dihapus');</script>";
    echo "<script>window.location='index.php?halaman=datapreventive';</script>";
}
?>