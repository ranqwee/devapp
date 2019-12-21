<?php
    $id_joborder = $_POST['id_joborder'];
    $jam = $_POST['jam'];
	$id_personil = $_POST ['id_personil'];
	$shift = $_POST ['shift'];
	$job = $_POST ['job'];
	$material = $_POST ['material'];

$sql = mysql_query ("UPDATE job_order SET jam='$jam', 
id_personil='$id_personil', shift='$shift', job='$job', material='$material' WHERE id_joborder='$id_joborder'");
    if($sql){
    echo "<script>alert('data berhasil diubah');</script>";
    echo "<script>window.location='index.php?halaman=joborder';</script>";
}
?>