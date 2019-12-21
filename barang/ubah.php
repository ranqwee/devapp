<?php
    $kode_brg = $_POST['kode_brg'];
	$nama_brg = $_POST['nama_brg'];
    $mata_uang = $_POST['mata_uang'];
	$harga_brg = $_POST['harga_brg'];
	$ktrg_brg = $_POST['ktrg_brg'];

$sql = mysql_query ("UPDATE ms_brg SET nama_brg='$nama_brg', mata_uang='$mata_uang', harga_brg='$harga_brg', ktrg_brg='$ktrg_brg' WHERE kode_brg='$kode_brg'");
    if($sql){
    echo "<script>alert('data berhasil diubah');</script>";
    echo "<script>window.location='index.php?halaman=databrg';</script>";
}
?>