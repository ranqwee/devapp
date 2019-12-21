<h2> Ubah Komponen </h2>
<?php
$kd_komponen = $_GET['kd_komponen'];
$sql = mysql_query("SELECT * from mst_komponen where kd_komponen='$kd_komponen'");
if($data = mysql_fetch_array($sql)){
    $kd_komponen = $data['kd_komponen'];
    $nama_komponen = $data['nama_komponen'];
    
  }
?>
<form action="index.php?halaman=ubah" method="POST">
	<div class="form-group">
		<label>Kode Komponen</label>
		<input type="text" name="kd_komponen" name="kd_komponen" maxlength="4" class="form-control" readonly value="<?php echo $data['kd_komponen']; ?>"> </br>
		<label>Nama Komponen</label>
		<input type="text" name="nama_komponen" name="nama_komponen" maxlength="25" class="form-control" value="<?php echo $data['nama_komponen']; ?>">
	</div>
	<button type="submit" class="btn btn-primary" name="ubah"><i class="fa fa-pencil"></i>Simpan</button>
</form>