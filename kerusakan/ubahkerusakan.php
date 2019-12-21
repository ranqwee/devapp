<h2>Ubah Data Kerusakan </h2>
<?php
$id_kerusakan = $_GET['id_kerusakan'];
$sql = mysql_query("SELECT * FROM kerusakan WHERE id_kerusakan='$id_kerusakan'");
if($data = mysql_fetch_array($sql)){
    $id_kerusakan = $data['id_kerusakan'];
	$status = $data ['status'];
    }
?>
<form action="index.php?halaman=ubahkerusakan" method="POST">
<div class="form-group">
<table width='100%' align='center'>
    <tr>
       <td width='35%'>
		<label>ID Kerusakan</label>
		<input type="text" name="id_kerusakan" name="id_kerusakan" class="form-control" 
		readonly value="<?php echo $data['id_kerusakan']; ?>"> </br>
	<label>Status</label>
         <select name="status" id="status" class="form-control" required>
			<option value=""> ---- Pilih Status ---- </option>
            <option value='OK' <?php if($status == "OK") { echo "selected"; }?>>OK</option>
            <option value='Proses' <?php if($status == "Proses") { echo "selected"; }?>>Proses</option>
            <option value='Waiting Part' <?php if($status == "Waiting Part") { echo "selected"; }?>>Waiting Part</option>
			<option value='Baru Dikirimkan' <?php if($status == "Baru Dikirimkan") { echo "selected"; }?>>Baru Dikirimkan</option>
        </select>
		</td></table><br>
	<button type="submit" class="btn btn-primary" name="ubah"><i class="fa fa-pencil"></i>Simpan</button>
</div></form>