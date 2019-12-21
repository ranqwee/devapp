<?php
    $id_shop = $_POST['id_shop'];
    $nama_shop = $_POST['nama_shop'];
	
$sql = mysql_query ("UPDATE ms_shop SET nama_shop='$nama_shop' WHERE id_shop='$id_shop'");
    if($sql){
    echo "<script>alert('data berhasil diubah');</script>";
    echo "<script>window.location='index.php?halaman=datashop';</script>";
}
?>