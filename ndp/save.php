<?php
	$ndp = $_POST ['ndp'];
	$tgl = $_POST['tgl'];
	$status = $_POST['status'];
	
    $sql = mysql_query("INSERT INTO dp (status, ndp, tgl) VALUES ('$status', '$ndp', '$tgl')");
    if($sql){
    echo "<script>alert('data telah tersimpan');</script>";
    echo "<script>window.location='index.php?halaman=datandpuser';</script>";
}
?>