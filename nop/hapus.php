<?php
	$nop = $_GET['nop'];
	$sql = mysql_query ("DELETE FROM op WHERE nop = '$nop'");
	if($sql){
    echo "<script>alert('data telah dihapus');</script>";
    echo "<script>window.location='index.php?halaman=datanop';</script>";
}
?>