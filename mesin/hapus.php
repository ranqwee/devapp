<?php
	$id_mesin=$_GET['id_mesin'];
	$sql = mysql_query ("DELETE FROM ms_mesin WHERE id_mesin='$id_mesin'");
	if($sql){
    echo "<script>alert('data telah dihapus');</script>";
    echo "<script>window.location='index.php?halaman=datamesin';</script>";
}
?>