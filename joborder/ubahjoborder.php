<h2> Ubah Job Order </h2>
<?php
$id_joborder = $_GET['id_joborder'];
$sql = mysql_query("SELECT * from job_order WHERE id_joborder='$id_joborder'");
if($data = mysql_fetch_array($sql)){
    $id_joborder = $data['id_joborder'];
    $jam = $data['jam'];
	$id_personil = $data ['id_personil'];
	$shift = $data ['shift'];
	$job = $data ['job'];
	$material = $data ['material'];
    }
?>
<form action="index.php?halaman=ubahjob" method="POST">
	<div class="form-group">
	<table width='100%' align='center'>
    <tr>
       <td width='35%'>
		<label>ID Job Order</label>
		<input type="text" name="id_joborder" name="id_joborder" class="form-control" 
		readonly value="<?php echo $id_joborder; ?>"> </br>
		<label>Tanggal dan Jam Pelaksanaan</label><br>
        <input type="datetime-local" name="jam" class="form-control" value="<?php echo $jam; ?>"><br>
        <label>Personil</label>
        <select name="id_personil" class="form-control" required>
            <option value="<?php echo $id_personil ; ?>">---- Pilih Personil ----</option>
                    <?php
                    include 'connect.php';
                    $sqlopt = "SELECT id_personil,nama_personil FROM ms_personil order by nama_personil asc";
                    $queryopt = mysql_query($sqlopt);
                    while($result=mysql_fetch_array($queryopt))
					{
                        if($result['id_personil'] == $row['nama_personil']) {
                        echo "<option value='$result[id_personil]' selected='selected'>$result[nama_personil]</option>";
                        }else{
                        echo "<option value='$result[id_personil]'>$result[nama_personil]</option>";
                        }
                    }	
                    ?>                  
        </select>
    </br>
        <label>Shift</label>
         <select name="shift" id="shift" class="form-control" required>
			<option value=""> ---- Silahkan Pilih ---- </option>
            <option value='Shift 1' <?php if($shift == "Shift 1") { echo "selected"; }?>>Shift 1</option>
            <option value='Shift 2' <?php if($shift == "Shift 2") { echo "selected"; }?>>Shift 2</option>
            <option value='Shift 3' <?php if($shift == "Shift 3") { echo "selected"; }?>>Shift 3</option>
            <option value='Normal' <?php if($shift == "Normal") { echo "selected"; }?>>Normal</option>
			<option value='OT 2' <?php if($shift == "OT 2") { echo "selected"; }?>>OT 2</option>
            <option value='OT 3' <?php if($shift == "OT 2") { echo "selected"; }?>>OT 3</option>
            <option value='OT 7' <?php if($shift == "OT 7") { echo "selected"; }?>>OT 7</option>
        </select></td><td>
		<label>Job Desc</label><br>
        <textarea  name="job" class="form-control" rows="5" ><?php echo $job; ?></textarea><br>
		<label>Material dan Bahan</label>
        <textarea name="material" class="form-control" rows="2"><?php echo $material; ?></textarea>
    </br>
	</td></table>
	<tr></tr><a href="index.php?halaman=joborder" class="btn btn-danger"></i>Kembali</a>
	<button type="submit" class="btn btn-primary" name="ubah"><i class="fa fa-pencil"></i>Simpan</button><br><br>
	
</div></form>