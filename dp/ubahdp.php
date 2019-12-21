<h2> Ubah Daftar Permintaan </h2>
<?php
$no_dp = $_GET['no_dp'];
$sql = mysql_query("SELECT * from qty_order WHERE no_dp='$no_dp'");
if($data = mysql_fetch_array($sql)){
    $no_dp = $data['no_dp'];
    $kode_brg = $data['kode_brg'];
	$nama_brg = $data ['nama_brg'];
	$no_aset = $data ['no_aset'];
	$qty = $data ['qty'];
	$mata_uang = $data ['mata_uang'];
	$hrg_brg = $data ['hrg_brg'];
	$total = $data ['total'];
    }
?>
<form action="index.php?halaman=ubahqty" method="POST">
	<div class="form-group">
	<table width='100%' align='center'>
    <tr>
       <td width='35%'>
		<label>Nomor Daftar Permintaan</label>
		<input type="text" name="no_dp" name="no_dp" class="form-control" 
		readonly value="<?php echo $no_dp; ?>"> </br>
		<label>Kode Barang</label><br>
		<label>Nama Barang</label>
        <select name="nama_brg" class="form-control" required>
        <input type="text" name="nama_brg" class="form-control" value="<?php echo $nama_brg; ?>"><br>
            <option value="<?php echo $no_aset ; ?>">---- Pilih Nomor Aset ----</option>
                    <?php
                    include 'connect.php';
                    $sqlopt = "SELECT no_aset,FROM aset_brg order by no_aset asc";
                    $queryopt = mysql_query($sqlopt);
                    while($result=mysql_fetch_array($queryopt))
					{
                        if($result['no_aset'] == $row['no_aset']) {
                        echo "<option value='$result[no_aset]' selected='selected'>$result[no_aset]</option>";
                        }else{
                        echo "<option value='$result[no_aset]'>$result[no_aset]</option>";
                        }
                    }	
                    ?>                  
        </select>
    </br>
	<label>QTY</label>
		<input type="text" name="qty" name="qty" class="form-control" 
		 value="<?php echo $qty; ?>"> </br>
	<label>Mata uang</label><br>
        <select name="mata_uang" class="form-control" required>
            <option value="">--- Silahkan pilih ---</option>
            <option value="Rp">RUPIAH</option>
            <option value="$">DOLLAR</option>
            </select><br>
		<label>Harga Satuan</label><br>
        <textarea  name="hrg_brg" class="form-control" rows="5" ><?php echo $hrg_brg; ?></textarea><br>
		<label>Total</label>
        <textarea name="Total" class="form-control" rows="2"><?php echo $total; ?></textarea>
    </br>
	</td></table>
	<tr></tr><a href="index.php?halaman=datadp" class="btn btn-danger"></i>Kembali</a>
	<button type="submit" class="btn btn-primary" name="ubah"><i class="fa fa-pencil"></i>Simpan</button><br><br>
	
</div></form>