<?php
	$nop = $_POST ['nop'];
	$tggl_order = $_POST ['tggl_order'];
	$ktrgn_order = $_POST ['ktrgn_order'];
	$kode_brg = $_POST['kode_brg'];
	$waktu_kirim = $_POST ['waktu_kirim'];
	$qty = $_POST['qty'];
	
    $sql = mysql_query("INSERT INTO order_pemesanan (nop, tggl_order, ktrgn_order, kode_brg, waktu_kirim, qty) 
	VALUES ('$nop', '$tggl_order', '$ktrgn_order', '$kode_brg', '$waktu_kirim', '$qty')");
    if($sql){
    echo '<script language="javascript">alert("Data telah tersimpan"); 
	window.location.href="index.php?halaman=dataop&id='.$nop.'"</script>';
}
?>