<?php
	$nop = $_POST['nop'];
    $status = $_POST['status'];
	
$sql = mysql_query ("UPDATE op SET status='$status' WHERE nop='$nop'");
    if($sql){
    echo "<script>alert('data berhasil diubah');</script>";
    echo "<script>window.location='index.php?halaman=datanopfi';</script>";
}
?>