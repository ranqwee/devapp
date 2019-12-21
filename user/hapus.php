<?php
	$id_user=$_GET['id_user'];
	$sql = mysql_query ("DELETE FROM user_login WHERE id_user='$id_user'");
	if($sql){
    echo "<script>alert('data telah dihapus');</script>";
    echo "<script>window.location='index.php?halaman=datauser';</script>";
}
?>