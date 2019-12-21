<?php
	$no_order = $_POST['no_order'];
	$nop = $_POST['nop'];
    $kode_brg = $_POST['kode_brg'];
	$ktrgn_order = $_POST ['ktrgn_order'];
	$waktu_kirim = $_POST ['waktu_kirim'];
	$qty = $_POST ['qty'];
$sql = mysql_query ("UPDATE order_pemesanan SET nop='$nop', kode_brg='$kode_brg', ktrgn_order='$ktrgn_order', waktu_kirim='$waktu_kirim', qty='$qty' WHERE no_order='$no_order'");
    if($sql){
    echo '<script language="javascript">alert("Data Berhasil Diubah"); 
	window.location.href="index.php?halaman=dataop&id='.$nop.'"</script>';
}
?>