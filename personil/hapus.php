<?php
	$id_personil = $_GET['id_personil'];
	$sql = mysql_query ("DELETE FROM ms_personil WHERE id_personil = '$id_personil'");
	if($sql){
    echo "<script>alert('data telah dihapus');</script>";
    echo "<script>window.location='index.php?halaman=datapersonil';</script>";
}
?>