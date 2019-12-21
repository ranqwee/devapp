<?php
	$id_personil = $_POST['id_personil'];
	$tgl = $_POST['tgl'];
	$id_mesin = $_POST['id_mesin'];
	$id_shop = $_POST['id_shop'];
	$kerusakan = $_POST['kerusakan'];
	$status = $_POST['status'];
	
    $sql = mysql_query("INSERT INTO kerusakan (id_personil, tgl, id_mesin, id_shop, kerusakan, status) 
	VALUES ('$id_personil', '$tgl', '$id_mesin', '$id_shop', '$kerusakan', '$status')");
    if($sql){
    echo "<script>alert('data telah tersimpan');</script>";
    echo "<script>window.location='index.php?halaman=laporankerusakantek';</script>";
}
?>