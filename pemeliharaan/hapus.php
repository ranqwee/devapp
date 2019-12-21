<?php
	$id_pemeliharaan = $_GET['id_pemeliharaan'];
	$sql = mysql_query ("DELETE FROM pemeliharaan WHERE id_pemeliharaan = '$id_pemeliharaan'");
	if($sql){
    echo "<script>alert('data telah dihapus');</script>";
    echo "<script>window.location='index.php?halaman=pemeliharaan';</script>";
}
?>