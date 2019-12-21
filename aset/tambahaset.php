<h2> Tambah Aset </h2>
<form action="index.php?halaman=saveaset" method="POST">
    <div class="form-group">
	<table width="70%"><td>
        <input type="hidden" name="no_aset">
    </br>
         <label>Nama Barang</label>
        <select name="kode_brg" class="form-control" required>
            <option value="">--- Silahkan Pilih ---</option>
                    <?php
                    include 'connect.php';
                    $sqlopt = "SELECT kode_brg,nama_brg FROM ms_brg order by nama_brg asc";
                    $queryopt = mysql_query($sqlopt);
                    while($result=mysql_fetch_array($queryopt))
                    {
                        if($result['kode_brg'] == $row['nama_brg']) {
                        echo "<option value='$result[kode_brg]' selected='selected'>$result[nama_brg]</option>";
                        }else{
                        echo "<option value='$result[kode_brg]'>$result[nama_brg]</option>";
                        }
                    }
                    ?>                  
        </select>
		<br>
		<label>Stock</label>
		<input type="text" name="stock" class="form-control" required></br>
		<label>Satuan</label>
		<select name="satuan" class="form-control" required>
            <option value="">--- Silahkan pilih ---</option>
            <option value="Pcs">Pcs</option>
            <option value="SET">SET</option>
			<option value="Paket">Paket</option>
			</select> 
    </br></td><td>
	<label>Stock Minimal</label>
	<input type="text" name="stock_min" class="form-control" required></br>
	<label>lokasi</label>
		<select name="lokasi" class="form-control" required>
            <option value="">--- Silahkan Pilih ---</option>
            <option value="Gudang GA 1">GGA1</option>
            <option value="Gudang GA 2">GGA2</option>
			<option value="Gudang GA 3">GGA3</option>
			<option value="Gudang GA Stockyard">GGS</option>
			</select> 
    </br></td></table><br>

	<tr></tr><a href="index.php?halaman=dataaset" class="btn btn-danger"></i>Kembali</a>
    <button type="submit" class="btn btn-primary" name="save"><i class="fa fa-check"></i>Simpan</button>
</form>    </div>