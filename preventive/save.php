<?php
	$jenis_job = $_POST['jenis_job'];
	$id_shop = $_POST['id_shop'];
	$jam_kerja = $_POST['jam_kerja'];
	$periode = $_POST['periode'];
	
    $sql = mysql_query("INSERT INTO preventive (jenis_job, id_shop, jam_kerja, periode) 
	VALUES ('$jenis_job', '$id_shop', '$jam_kerja', '$periode')");
    if($sql){
    echo "<script>alert('data telah tersimpan');</script>";
    echo "<script>window.location='index.php?halaman=datapreventive';</script>";
}
?>