<h2> Ubah Petugas </h2>
<?php
$kd_petugas = $_GET['kd_petugas'];
$sql = mysql_query("SELECT * from mst_petugas where kd_petugas='$kd_petugas'");
if($data = mysql_fetch_array($sql)){
    $kd_petugas = $data['kd_petugas'];
    $nama_petugas = $data['nama_petugas'];
    }
?>
<form action="index.php?halaman=ubahpetugas" method="POST">
	<div class="form-group">
		<label>Kode Petugas</label>
		<input type="text" name="kd_petugas" name="kd_petugas" class="form-control" readonly value="<?php echo $data['kd_petugas']; ?>"> </br>
		<label>Nama Petugas</label>
		<input type="text" name="nama_petugas" name="nama_petugas" maxlength="20" class="form-control" value="<?php echo $data['nama_petugas']; ?>">
	</div>
	<button type="submit" class="btn btn-primary" name="ubah"><i class="fa fa-pencil"></i>Simpan</button>
</form>