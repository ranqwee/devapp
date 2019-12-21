<?php
	$nop = $_POST['nsp'];
    $status = $_POST['status'];
	
$sql = mysql_query ("UPDATE op SET status='$status' WHERE nsp='$nsp'");
    if($sql){
    echo "<script>alert('data berhasil diubah');</script>";
    echo "<script>window.location='index.php?halaman=datanopfi';</script>";
}
?>