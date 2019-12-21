<?php
    $no_aset = $_POST['no_aset'];
	$kode_brg = $_POST['kode_brg'];
    $stock = $_POST['stock'];
	$satuan = $_POST['satuan'];
	$stock_min = $_POST['stock_min'];
	$lokasi = $_POST['lokasi'];

$sql = mysql_query ("UPDATE aset_brg SET kode_brg='$kode_brg', stock='$stock', satuan='$satuan', stock_min='$stock_min', lokasi='$lokasi' WHERE no_aset='$no_aset'");
    if($sql){
    echo "<script>alert('data berhasil diubah');</script>";
    echo "<script>window.location='index.php?halaman=dataaset';</script>";
}
?>