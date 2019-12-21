<?php
	$ndp = $_POST ['ndp'];
	$no_aset = $_POST['no_aset'];
	$qty = $_POST['qty'];
	
    $sql = mysql_query("INSERT INTO daftar_permintaan (ndp, no_aset, qty) 
	VALUES ('$ndp', '$no_aset', '$qty')");
    if($sql){
    echo '<script language="javascript">alert("Data telah tersimpan"); 
	window.location.href="index.php?halaman=datadpuser&id='.$ndp.'"</script>';
}
?>