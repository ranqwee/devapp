<h2> Ubah Lini Produksi </h2>
<?php
$kd_liniproduksi = $_GET['kd_liniproduksi'];
$sql = mysql_query("SELECT * from mst_liniproduksi where kd_liniproduksi='$kd_liniproduksi'");
if($data = mysql_fetch_array($sql)){
    $kd_liniproduksi = $data['kd_liniproduksi'];
    $nama_liniproduksi = $data['nama_liniproduksi'];
    }
?>
<form action="index.php?halaman=ubahlini" method="POST">
	<div class="form-group">
		<label>Kode Lini Produksi</label>
		<input type="text" name="kd_liniproduksi" name="kd_liniproduksi" class="form-control" readonly value="<?php echo $data['kd_liniproduksi']; ?>"> </br>
		<label>Nama Lini Produksi</label>
		<input type="text" name="nama_liniproduksi" name="nama_liniproduksi" maxlength="7" class="form-control" value="<?php echo $data['nama_liniproduksi']; ?>">
	</div>
	<button type="submit" class="btn btn-primary" name="ubah"><i class="fa fa-pencil"></i>Simpan</button>
</form>