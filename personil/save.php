<?php
    $nama_personil = $_POST['nama_personil'];
	$tgl_personil = $_POST['tgl_personil'];
	$alamat_personil = $_POST['alamat_personil'];
	$telp_personil = $_POST['telp_personil'];
	$hp_personil = $_POST['hp_personil'];
	$id_shop = $_POST['id_shop'];
	$skill = $_POST['skill'];
	$keterangan = $_POST['keterangan'];
	
    $sql = mysql_query("INSERT INTO ms_personil (tgl_personil, nama_personil, alamat_personil, telp_personil, hp_personil, id_shop, skill, keterangan) VALUES ('$tgl_personil', '$nama_personil', '$alamat_personil', '$telp_personil', '$hp_personil', '$id_shop', '$skill', '$keterangan')");
    if($sql){
    echo "<script>alert('data telah tersimpan');</script>";
    echo "<script>window.location='index.php?halaman=datapersonil';</script>";
}
?>