<?php
	$nop = $_POST ['nop'];
	$tgl_op = $_POST['tgl_op'];
	$status = $_POST['status'];
	
    $sql = mysql_query("INSERT INTO op (status, nop, tgl_op) VALUES ('$status', '$nop', '$tgl_op')");
    if($sql){
    echo "<script>alert('data telah tersimpan');</script>";
    echo "<script>window.location='index.php?halaman=datanop';</script>";
}
?>