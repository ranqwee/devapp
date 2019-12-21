<h2> Ubah Pemesanan</h2>
<?php
$nop = $_GET['nop'];
$sql = mysql_query("SELECT * from op WHERE nop='$nop'");
if($data = mysql_fetch_array($sql)){
    $nop = $data['nop'];
	$status = $data['status'];
    }
?>
<form action="index.php?halaman=ubahnop" method="POST">
	<div class="form-group">
	<table width='100%' align='center'>
    <tr>
       <td width='35%'>
		<label>No OP</label>
		<input type="text" name="nop" class="form-control" 
		readonly value="<?php echo $data['nop']; ?>"> </br>
	<label>Status</label>
         <select name="status" id="status" class="form-control" required>
			<option value=""> ---- Pilih Status ---- </option>
            <option value='Disetujui' <?php if($status == "Disetujui") { echo "selected"; }?>>Disetujui</option>
            <option value='Ditolak' <?php if($status == "Ditolak") { echo "selected"; }?>>Ditolak</option>
        </select>
    </br>
	</td></table>
	<tr></tr><a href="index.php?halaman=datanop" class="btn btn-danger"></i>Kembali</a>
	<button type="submit" class="btn btn-primary" name="ubah"><i class="fa fa-pencil"></i>Simpan</button><br><br>
	
</div></form>