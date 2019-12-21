<?php
    $id_mesin = $_POST['id_mesin'];
	$tgl_mesin = $_POST['tgl_mesin'];
    $nama_mesin = $_POST['nama_mesin'];
	$type_mesin = $_POST['type_mesin'];
	$merek_mesin = $_POST['merek_mesin'];
	$noseri_mesin = $_POST['noseri_mesin'];
	$tahun_mesin = $_POST['tahun_mesin'];
	$jml_mesin = $_POST['jml_mesin'];
	$id_shop = $_POST['id_shop'];
	$id_personil = $_POST['id_personil'];
	$supp_mesin = $_POST['supp_mesin'];

$sql = mysql_query ("UPDATE ms_mesin SET tgl_mesin='$tgl_mesin', nama_mesin='$nama_mesin', type_mesin='$type_mesin', merek_mesin='$merek_mesin',  noseri_mesin='$noseri_mesin', tahun_mesin='$tahun_mesin', jml_mesin='$jml_mesin', id_shop='$id_shop', id_personil='$id_personil', supp_mesin='$supp_mesin' WHERE id_mesin='$id_mesin'");
    if($sql){
    echo "<script>alert('data berhasil diubah');</script>";
    echo "<script>window.location='index.php?halaman=datamesin';</script>";
}
?>