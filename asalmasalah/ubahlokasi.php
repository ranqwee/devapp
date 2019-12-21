<h2> Ubah Asal Masalah </h2>
<?php
$kd_asalmasalah = $_GET['kd_asalmasalah'];
$sql = mysql_query("SELECT * from mst_asal_masalah_komponen where kd_asalmasalah='$kd_asalmasalah'");
if($data = mysql_fetch_array($sql)){
    $kd_asalmasalah = $data['kd_asalmasalah'];
    $nama_lokasiasalmasalah = $data['nama_lokasiasalmasalah'];
    }
?>
<form action="index.php?halaman=ubahlokasi" method="POST">
	<div class="form-group">
		<label>Kode Lokasi</label>
		<input type="text" name="kd_asalmasalah" name="kd_asalmasalah" class="form-control" readonly value="<?php echo $data['kd_asalmasalah']; ?>"> </br>
		<label>Lokasi Reject</label>
		<input type="text" name="nama_lokasiasalmasalah" name="nama_lokasiasalmasalah" maxlength="20" class="form-control" value="<?php echo $data['nama_lokasiasalmasalah']; ?>">
	</div>
	<button type="submit" class="btn btn-primary" name="ubah"><i class="fa fa-pencil"></i>Simpan</button>
</form>