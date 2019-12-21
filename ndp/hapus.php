<?php
	$ndp = $_GET['ndp'];
	$sql = mysql_query ("DELETE FROM dp WHERE ndp = '$ndp'");
	if($sql){
    echo "<script>alert('data telah dihapus');</script>";
    echo "<script>window.location='index.php?halaman=datandp';</script>";
}
?>