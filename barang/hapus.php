<?php
	$kode_brg = $_GET['kode_brg'];
	$sql = mysql_query ("DELETE FROM ms_brg WHERE kode_brg = '$kode_brg'");
	if($sql){
    echo "<script>alert('data telah dihapus');</script>";
    echo "<script>window.location='index.php?halaman=databrg';</script>";
}
?>