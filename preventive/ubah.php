<?php
    $id_preventive = $_POST['id_preventive'];
    $jenis_job = $_POST['jenis_job'];
	$id_shop = $_POST ['id_shop'];
	$jam_kerja = $_POST ['jam_kerja'];
	$periode = $_POST ['periode'];

$sql = mysql_query ("UPDATE preventive SET jenis_job='$jenis_job', id_shop='$id_shop', periode='$periode' WHERE id_preventive='$id_preventive'");
    if($sql){
    echo "<script>alert('data berhasil diubah');</script>";
    echo "<script>window.location='index.php?halaman=datapreventive';</script>";
}
?>