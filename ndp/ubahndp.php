<h2> Ubah Daftar Permintaan </h2>
<?php
$ndp = $_GET['ndp'];
$sql = mysql_query("SELECT * from dp WHERE ndp='$ndp'");
if($data = mysql_fetch_array($sql)){
    $ndp = $data['ndp'];
	$status = $data['status'];
    }
?>
<form action="index.php?halaman=ubahndp" method="POST">
	<div class="form-group">
	<table width='100%' align='center'>
    <tr>
       <td width='35%'>
		<label>No DP</label>
		<input type="text" name="ndp" class="form-control" 
		readonly value="<?php echo $data['ndp']; ?>"> </br>
	<label>Status</label>
         <select name="status" id="status" class="form-control" required>
			<option value=""> ---- Pilih Status ---- </option>
            <option value='Diterima' <?php if($status == "Diterima") { echo "selected"; }?>>Diterima</option>
            <option value='Dibatalkan' <?php if($status == "Dibatalkan") { echo "selected"; }?>>Dibatalkan</option>
            <option value='Ditunda' <?php if($status == "Ditunda") { echo "selected"; }?>>Ditunda</option>
			<option value='Baru Dikirimkan' <?php if($status == "Baru Dikirimkan") { echo "selected"; }?>>Baru Dikirimkan</option>
        </select>
    </br>
	</td></table>
	<tr></tr><a href="index.php?halaman=datandp" class="btn btn-danger"></i>Kembali</a>
	<button type="submit" class="btn btn-primary" name="ubah"><i class="fa fa-pencil"></i>Simpan</button><br><br>
	
</div></form>