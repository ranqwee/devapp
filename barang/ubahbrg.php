<h2>Ubah Data Barang </h2>
<?php
$kode_brg = $_GET['kode_brg'];
$sql = mysql_query("SELECT * from ms_brg WHERE kode_brg='$kode_brg'");
if($data = mysql_fetch_array($sql)){
    $kode_brg = $data['kode_brg'];
	$nama_brg = $data['nama_brg'];
    $mata_uang = $data['mata_uang'];
	$harga_brg = $data['harga_brg'];
	$ktrg_brg = $data['ktrg_brg'];
    }
?>
<form action="index.php?halaman=ubahbrg" method="POST">
	<div class="form-group">
	<table width="70%"><td>
		<br><label>Kode Barang</label><br>
		<input type="text" name="kode_brg" name="kode_brg" class="form-control" readonly value="<?php echo $data['kode_brg']; ?>"> </br>
		<label>Nama Barang</label><br>
		<input type="text" name="nama_brg" name="nama_brg" class="form-control" value="<?php echo $data['nama_brg']; ?>"> </br>
        <label>Mata uang</label><br>
        <select name="mata_uang" class="form-control" required>
            <option value="<?php echo $mata_uang ; ?>"><?php echo $mata_uang ; ?></option>
            <option value="Rp">RUPIAH</option>
            <option value="$">DOLLAR</option>
            </select><br></td><td>
		<label>Harga Barang</label><br>
        <input type="text" name="harga_brg" class="form-control" value="<?php echo $data['harga_brg']; ?>"><br>
		<label>Keterangan Barang</label><br>
		<input type="text" name="ktrg_brg" name="ktrg_brg" class="form-control"	 value="<?php echo $data['ktrg_brg']; ?>"> </br>
        <br></td></table>
	</div>
	<tr></tr><a href="index.php?halaman=databrg" class="btn btn-danger"></i>Kembali</a>
	<button type="submit" class="btn btn-primary" name="ubah"><i class="fa fa-pencil"></i>Simpan</button>
</form>
</form>