<?php
	$id_joborder = $_POST['id_joborder'];
	$tgl = $_POST['tgl'];
	$id_mesin = $_POST['id_mesin'];
	$id_shop = $_POST['id_shop'];
	$id_personil = $_POST['id_personil'];
	$shift = $_POST['shift'];
	$penyebab = $_POST ['penyebab'];
	$job = $_POST['job'];
    $loss = $_POST['loss'];
	$material = $_POST['material'];
	$job_type = $_POST['job_type'];
	$job_status = $_POST['job_status'];
	
    $sql = mysql_query("INSERT INTO pemeliharaan (id_joborder, tgl, job, id_mesin, id_shop, shift, loss,
	job_type, job_status, id_personil, material, penyebab) VALUES ('$id_joborder', '$tgl', '$job', '$id_mesin', 
	'$id_shop', '$shift', '$loss', '$job_type', '$job_status', '$id_personil', '$material', '$penyebab')");
    if($sql){
    echo "<script>alert('data telah tersimpan');</script>";
    echo "<script>window.location='index.php?halaman=pemeliharaan';</script>";
}
?>