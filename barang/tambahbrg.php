<h2> Tambah Data Barang </h2>
<form action="index.php?halaman=savebrg" method="POST">
    <div class="form-group">
	<br><table width='70%'><td>
	<input type="hidden" name="kode_brg">
        <label>Nama Barang</label>
        <input type="text" name="nama_brg" class="form-control" required>
    </br>
	 <label>Mata Uang</label>
        <select name="mata_uang" class="form-control" required>
            <option value="">Silahkan Pilih</option>
            <option value="Rp">Rupiah</option>
            <option value="USD">Dollar</option>     
        </select>
    </br></td><td>
       <label>Harga Barang</label>
        <Input type="text" name="harga_brg" class="form-control" required>                
    </br>
        <label>Keterangan Barang</label>
		<Input type="text" name="ktrg_brg" class="form-control" required>                
 </div></td></table>
 </br>
 <a href="index.php?halaman=databrg" class="btn btn-danger"></i>Kembali</a>
    <button type="submit" class="btn btn-primary" name="save"><i class="fa fa-check"></i>Simpan</button>
</form>