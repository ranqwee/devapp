
<h2> Tambah Permintaan </h2>
<div class="panel-body">
<div class="form-group">
<form action="index.php?halaman=savenop" method="POST">
    <table width='100%' align='center'>
    <tr>
	<input type="hidden" name="nop">
	<input type="hidden" name="status" value="Menunggu Persetujuan">
		<label>Tanggal</label>
        <input type="date" name="tgl_op" class="form-control" required></tr><br>
	<tr></tr><a href="index.php?halaman=datanop" class="btn btn-danger"></i>Kembali</a>
    <tr></tr><button type="submit" class="btn btn-primary" name="save"><i class="fa fa-check"></i>Simpan</button>
</form>    </div>
</div>
