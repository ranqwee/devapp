<h3><center> Tambah Surat Pengantar </center></h3>
<form action="index.php?halaman=savesp" method="POST">
    <div class="form-group">
	<table width='100%' align='center'><td>
	<input type="hidden" name="no_sp">
	<input type="hidden" name="ndp">
	 </br><label>Tanggal</label>
        <input type="date" name="tgl_sp" class="form-control" required>
        <br>    
       <label>Kepada</label>
        <Input type="text" name="kpd_sp" class="form-control" required>                
    </br>
        <label>Keterangan </label>
		<textarea name="ktrgn_sp" class="form-control" rows="5" required></textarea>       
</br> 
 </div>
 </br>
 <a href="index.php?halaman=datasp" class="btn btn-danger"></i>Kembali</a>
    <button type="submit" class="btn btn-primary" name="save"><i class="fa fa-check"></i>Simpan</button>
</form>