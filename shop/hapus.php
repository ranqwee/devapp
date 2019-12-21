<?php
	$id_shop = $_GET['id_shop'];
	$sql = mysql_query ("DELETE FROM ms_shop WHERE id_shop = '$id_shop'");
	if($sql){
    echo "<script>alert('data telah dihapus');</script>";
    echo "<script>window.location='index.php?halaman=datashop';</script>";
}
?>