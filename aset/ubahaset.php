<h2> Ubah Aset </h2>
<?php
$no_aset = $_GET['no_aset'];
$sql = mysql_query("SELECT * from aset_brg JOIN ms_brg ON aset_brg.kode_brg = ms_brg.kode_brg where no_aset='$no_aset'");
if($data = mysql_fetch_array($sql)){
    $no_aset = $data['no_aset'];
    $kode_brg= $data['kode_brg'];
    $stock = $data['stock'];
	$satuan = $data['satuan'];
	$stock_min = $data['stock_min'];
	$lokasi = $data['lokasi'];
	$nama_brg = $data['nama_brg'];
    }
?>
<form action="index.php?halaman=ubahaset" method="POST">
	<div class="form-group">
		<table width="70%"><td>
		<br><label>No Aset</label>
        <input type="text" name="no_aset" value="<?php echo $no_aset ; ?>" class="form-control" readonly>
    </br>
         <label>Nama Barang</label>
        <select name="kode_brg" class="form-control" required>
            <option value="<?php echo $kode_brg ; ?>"><?php echo $nama_brg ; ?></option>
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
		<input type="text" name="stock" class="form-control" value="<?php echo $stock; ?>" required></br></td><td>
		<br><label>Satuan</label>
		<select name="satuan" class="form-control"  required>
            <option value="<?php echo $satuan; ?>"><?php echo $satuan; ?></option>
            <option value="Pcs">Pcs</option>
            <option value="SET">SET</option>
			<option value="Paket">Paket</option>
			</select> 
    </br>
	<label>Stock Minimal</label>
	<input type="text" name="stock_min" class="form-control" value="<?php echo $stock_min; ?>" required></br>
	<label>lokasi</label>
		<select name="lokasi" class="form-control" required>
            <option value="<?php echo $lokasi ; ?>"><?php echo $lokasi ; ?></option>
            <option value="Gudang GA 1">GGA1</option>
            <option value="Gudang GA 2">GGA2</option>
			<option value="Gudang GA 3">GGA3</option>
			<option value="Gudang GA Stockyard">GGS</option>
			</select> 
    </br></td></table><br>

	<tr></tr><a href="index.php?halaman=dataaset" class="btn btn-danger"></i>Kembali</a>
    <button type="submit" class="btn btn-primary" name="save"><i class="fa fa-check"></i>Simpan</button>
</form>    </div>