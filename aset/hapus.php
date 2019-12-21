<?php
	$no_aset = $_GET['no_aset'];
	
	$sql = mysql_query ("DELETE FROM aset_brg WHERE no_aset='$no_aset'");
	if($sql){
    echo "<script>alert('data telah dihapus');</script>";
    echo "<script>window.location='index.php?halaman=dataaset';</script>";
}
?>