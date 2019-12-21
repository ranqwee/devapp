<?php
	$id_pemeliharaan = $_POST ['id_pemeliharaan'];
	$id_joborder = $_POST ['id_joborder'];
    $tgl = $_POST['tgl'];
	$job = $_POST['job'];
    $id_mesin = $_POST['id_mesin'];
	$id_shop = $_POST['id_shop'];
	$shift = $_POST['shift'];
	$loss = $_POST['loss'];
	$job_type = $_POST['job_type'];
	$job_status = $_POST['job_status'];
	$id_personil = $_POST['id_personil'];
	$material = $_POST['material'];
	$penyebab = $_POST['penyebab'];

$sql = mysql_query ("UPDATE pemeliharaan SET id_joborder='$id_joborder', tgl='$tgl', job='$job', id_mesin='$id_mesin',  id_shop='$id_shop', 
shift='$shift', loss='$loss', job_type='$job_type', job_status='$job_status', id_personil='$id_personil', material='$material', penyebab='$penyebab' WHERE id_pemeliharaan='$id_pemeliharaan'");
    if($sql){
    echo "<script>alert('data berhasil diubah');</script>";
    echo "<script>window.location='index.php?halaman=pemeliharaan';</script>";
}
?>