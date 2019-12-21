<h2> Ubah Order Pemesanan </h2>
<?php
$no_order = $_GET['no_order'];
$sql = mysql_query("SELECT * from order_pemesanan JOIN ms_brg ON order_pemesanan.kode_brg = ms_brg.kode_brg WHERE no_order='$no_order'");
if($data = mysql_fetch_array($sql)){
    $no_order = $data['no_order'];
	$nop = $data['nop'];
    $kode_brg = $data['kode_brg'];
	$ktrgn_order = $data ['ktrgn_order'];
	$waktu_kirim = $data ['waktu_kirim'];
	$qty = $data ['qty'];
    }
?>
<form action="index.php?halaman=ubahop" method="POST">
	<div class="form-group">
	<table width='100%' align='center'>
    <tr><input type="hidden" name="no_order" value="<?php echo $no_order ; ?>">
		<td><label>No OP</label>
	   <input type='text' name='nop' value="<?php echo $nop ; ?>" class="form-control" readonly><br>
		<label>Kode Barang</label>
	   <input type='text' name='kode_brg' value="<?php echo $kode_brg ; ?>" class="form-control" readonly><br>
	   <label>QTY</label>
        <input type="text" name="qty" value="<?php echo $qty ; ?>" class="form-control" required></td><td>
		<br><label>Waktu Kirim</label>
        <input type="text" name="waktu_kirim" value="<?php echo $waktu_kirim ; ?>" class="form-control" required><br>
		<label>Keterangan Order</label>
        <textarea input rows="6" type="text" name="ktrgn_order" value="<?php echo $ktrgn_order ; ?>" class="form-control"></textarea><br>
		</table>
	<tr></tr><a href="index.php?halaman=dataop" class="btn btn-danger"></i>Kembali</a>
	<button type="submit" class="btn btn-primary" name="ubah"><i class="fa fa-pencil"></i>Simpan</button><br><br>
	
</div></form>