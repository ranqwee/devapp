<?php
    $jam = $_POST['jam'];
	$id_personil = $_POST['id_personil'];
	$shift = $_POST['shift'];
	$job = $_POST['job'];
	$material = $_POST['material'];
	
    $sql = mysql_query("INSERT INTO job_order (jam, id_personil, shift, job, material) VALUES ('$jam', '$id_personil', '$shift', '$job', '$material')");
    if($sql){
    echo "<script>alert('data telah tersimpan');</script>";
    echo "<script>window.location='index.php?halaman=joborder';</script>";
}
?>