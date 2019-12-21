<?php
	$no_sp = $_GET['no_sp'];
	$sql = mysql_query ("DELETE FROM srt_pgntr WHERE no_sp = '$no_sp'");
	if($sql){
    echo "<script>alert('data telah dihapus');</script>";
    echo "<script>window.location='index.php?halaman=datasp';</script>";
}
?>