<h2>Ubah Shop </h2>
<?php
$id_shop = $_GET['id_shop'];
$sql = mysql_query("SELECT * from ms_shop WHERE id_shop='$id_shop'");
if($data = mysql_fetch_array($sql)){
    $id_shop = $data['id_shop'];
    $nama_shop = $data['nama_shop'];
	}
?>
<form action="index.php?halaman=ubahshop" method="POST">
	<div class="form-group">
		<label>ID Shop</label>
		<input type="text" name="id_shop" name="id_shop" class="form-control" 
		readonly value="<?php echo $data['id_shop']; ?>"> </br>
		<label>Nama Shop</label>
		<input type="text" name="nama_shop" name="nama_shop" maxlength="20" class="form-control" 
		value="<?php echo $data['nama_shop']; ?>">
	<br><br>
	<tr></tr><a href="index.php?halaman=datashop" class="btn btn-danger"></i>Kembali</a>
	<button type="submit" class="btn btn-primary" name="ubah"><i class="fa fa-pencil"></i>Simpan</button>
</div></form>