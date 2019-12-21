<?php
	$id_joborder = $_GET['id_joborder'];
	$sql = mysql_query ("DELETE FROM job_order WHERE id_joborder = '$id_joborder'");
	if($sql){
    echo "<script>alert('data telah dihapus');</script>";
    echo "<script>window.location='index.php?halaman=joborder';</script>";
}
?>