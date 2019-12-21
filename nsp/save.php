<?php
	$nsp = $_POST ['nsp'];
	$tgl_sp = $_POST['tgl_sp'];
    $sql = mysql_query("INSERT INTO sp (nsp, tgl_sp) VALUES ('$nsp','$tgl_sp')");
    if($sql){
    echo "<script>alert('data telah tersimpan');</script>";
    echo "<script>window.location='index.php?halaman=datansp';</script>";
}
?>