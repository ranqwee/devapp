<h2> Ubah Tipe Engine </h2>
<?php
$kd_tipeengine = $_GET['kd_tipeengine'];
$sql = mysql_query("SELECT * from mst_tipeengine where kd_tipeengine='$kd_tipeengine'");
if($data = mysql_fetch_array($sql)){
    $kd_tipeengine = $data['kd_tipeengine'];
    $tipe_engine = $data['tipe_engine'];
    }
?>
<form action="index.php?halaman=ubahtipe" method="POST">
	<div class="form-group">
		<label>Kode Tipe Engine</label>
		<input type="text" name="kd_tipeengine" name="kd_tipeengine" class="form-control" readonly value="<?php echo $data['kd_tipeengine']; ?>"> </br>
		<label>Tipe Engine</label>
		<input type="text" name="tipe_engine" name="tipe_engine" maxlength="10" class="form-control" value="<?php echo $data['tipe_engine']; ?>">
	</div>
	<button type="submit" class="btn btn-primary" name="ubah"><i class="fa fa-pencil"></i>Simpan</button>
</form>