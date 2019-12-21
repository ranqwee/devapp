<?php
	$no_aset = $_POST['no_aset'];
	$kode_brg = $_POST['kode_brg'];
    $stock = $_POST['stock'];
	$satuan = $_POST['satuan'];
	$stock_min = $_POST['stock_min'];
	$lokasi = $_POST['lokasi'];
	
    $sql = mysql_query("INSERT INTO aset_brg (no_aset, kode_brg, stock, satuan, stock_min, lokasi) VALUES ('$no_aset', '$kode_brg', '$stock', '$satuan', '$stock_min', '$lokasi')");
    if($sql){
    echo "<script>alert('data telah tersimpan');</script>";
    echo "<script>window.location='index.php?halaman=dataaset';</script>";
}
?>