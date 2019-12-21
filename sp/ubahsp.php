<h2>Ubah Data Surat Pengantar </h2>
<?php
$no_sp = $_GET['no_sp'];
$sql = mysql_query("SELECT * from srt_pgntr WHERE no_sp='$no_sp'");
if($data = mysql_fetch_array($sql)){
    $no_sp = $data['no_sp'];
	$tggl_sp = $data['tggl_sp'];
    $kpd_sp = $data['kpd_sp'];
	$ktrgn_sp = $data['ktrgn_sp'];
	$pnrm_sp = $data['pnrm_sp'];
	$pgrm_sp = $data['pgrm_sp'];
    }
?>
<form action="index.php?halaman=ubahsp" method="POST">
	<div class="form-group">
		<label>Nomor</label><br>
		<input type="text" name="no_sp" name="no_sp" class="form-control" readonly value="<?php echo $data['no_sp']; ?>"> </br>
      <label>Tanggal<br>
		<input type="date" name="tggl_sp" name="tggl_sp" class="form-control" value="<?php echo $data['tggl_sp']; ?>"> </br>
        <br>
		<label>ditujukan Kepada</label><br>
		<input type="text" name="kpd_sp" name="kpd_sp" class="form-control"  value="<?php echo $data['kpd_sp']; ?>"> </br>
		<label>Keterangan Surat pengantar</label><br>
		<input type="text" name="ktrgn_sp" name="ktrgn_sp" class="form-control"  value="<?php echo $data['ktrgn_sp']; ?>"> </br>
		<label>Penerima</label><br>
        <input type="text" name="pnrm_sp" class="form-control" value="<?php echo $data['pnrm_sp']; ?>"><br>
		<label>Pengirim</label><br>
        <input type="text" name="pgrm_sp" class="form-control" value="<?php echo $data['pgrm_sp']; ?>"><br>
        <br>
	</div>
	<tr></tr><a href="index.php?halaman=datasp" class="btn btn-danger"></i>Kembali</a>
	<button type="submit" class="btn btn-primary" name="ubah"><i class="fa fa-pencil"></i>Simpan</button>
</form>
</form>