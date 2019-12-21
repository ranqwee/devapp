<?php
    $ndp = $_POST['ndp'];
	$status = $_POST['status'];

$sql = mysql_query ("UPDATE dp SET status='$status' WHERE ndp='$ndp'");
    if($sql){
    echo "<script>alert('data berhasil diubah');</script>";
    echo "<script>window.location='index.php?halaman=datadp';</script>";
}
?>