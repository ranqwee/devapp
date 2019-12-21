<?php
    $id_personil = $_POST['id_personil'];
	$tgl_personil = $_POST['tgl_personil'];
    $nama_personil = $_POST['nama_personil'];
	$alamat_personil = $_POST['alamat_personil'];
	$telp_personil = $_POST['telp_personil'];
	$hp_personil = $_POST['hp_personil'];
	$id_shop = $_POST ['id_shop'];
	$skill = $_POST ['skill'];
	$keterangan = $_POST['keterangan'];

$sql = mysql_query ("UPDATE ms_personil SET tgl_personil='$tgl_personil', nama_personil='$nama_personil', alamat_personil='$alamat_personil', telp_personil='$telp_personil', 
hp_personil='$hp_personil', id_shop='$id_shop', skill='$skill', keterangan='$keterangan' WHERE id_personil='$id_personil'");
    if($sql){
    echo "<script>alert('data berhasil diubah');</script>";
    echo "<script>window.location='index.php?halaman=datapersonil';</script>";
}
?>