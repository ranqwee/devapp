<h2>Ubah Data Pemeliharaan</h2>
<?php
$id_pemeliharaan = $_GET ['id_pemeliharaan'];
$sql = mysql_query("SELECT * FROM pemeliharaan WHERE id_pemeliharaan='$id_pemeliharaan'");
if($data = mysql_fetch_array($sql)){
   $id_pemeliharaan = $data['id_pemeliharaan'];
   $id_joborder = $data['id_joborder'];
	$tgl = $data['tgl'];
	$id_mesin = $data['id_mesin'];
	$id_shop = $data['id_shop'];
	$id_personil = $data['id_personil'];
	$shift = $data['shift'];
	$job = $data['job'];
	$loss = $data['loss'];
	$penyebab = $data['penyebab'];
	$material = $data['material'];
	$job_type = $data['job_type'];
	$job_status = $data['job_status'];
    }
?>
<form action="index.php?halaman=ubahpemeliharaan" method="POST">
<div class="form-group">
	<table width='100%' align='center'>
    <tr>
       <td width='50%'>
	   <input type="hidden" name="id_pemeliharaan" value="<?php echo $id_pemeliharaan; ?>" class="form-control" />
    </br><label>ID Job Order</label>
        <input type="text" name="id_joborder" class="form-control" required  readonly 
value="<?php echo $id_joborder; ?>">
    </br>
		 <label>Tanggal</label>
         <input type="date" name="tgl" class="form-control" value="<?php echo $tgl; ?>" required>
		 <br>
		 <label>Nama Mesin</label>
        <select name="id_mesin" class="form-control" required>
            <option value="<?php echo $id_mesin; ?>">---- Pilih Mesin ----</option>
                    <?php
                    include 'connect.php';
                    $sqlopt = "SELECT id_mesin,nama_mesin FROM ms_mesin order by nama_mesin asc";
                    $queryopt = mysql_query($sqlopt);
                    while($result=mysql_fetch_array($queryopt))
					{
                        if($result['id_mesin'] == $row['nama_mesin']) {
                        echo "<option value='$result[id_mesin]' selected='selected'>$result[nama_mesin]</option>";
                        }else{
                        echo "<option value='$result[id_mesin]'>$result[nama_mesin]</option>";
                        }
                    }	
                    ?>                  
        </select>	
    </br>
        <label>Shop</label>
        <select name="id_shop" class="form-control" required>
            <option value="<?php echo $id_shop; ?>">--- Pilih Shop ---</option>
                    <?php
                    include 'connect.php';
                    $sqlopt = "SELECT id_shop,nama_shop FROM ms_shop order by nama_shop asc";
                    $queryopt = mysql_query($sqlopt);
                    while($result=mysql_fetch_array($queryopt))
                    {
                        if($result['id_shop'] == $row['nama_shop']) {
                        echo "<option value='$result[id_shop]' selected='selected'>$result[nama_shop]</option>";
                        }else{
                        echo "<option value='$result[id_shop]'>$result[nama_shop]</option>";
                        }
                    }
                    ?>                  
        </select>
    </br>
		 <label>Personil</label>
        <select name="id_personil" class="form-control" required>
            <option value="<?php echo $id_personil; ?>">---- Pilih Personil ----</option>
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
        </select><br>
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
        </select>
        </br> 
		 <label>Penyebab</label>
         <select name="penyebab" class="form-control">
            <option value="">---- Silahkan pilih ----</option>
            <option value='Umur Tercapai' <?php if($shift == "Umur Tercapai") { echo "selected"; }?>>Umur Tercapai</option>
            <option value='Pengaruh Lingkungan' <?php if($shift == "Pengaruh Lingkungan") { echo "selected"; }?>>Pengaruh Lingkungan</option>
            <option value='Material Salah' <?php if($shift == "Material Salah") { echo "selected"; }?>>Material Salah</option>
            <option value='Human Error' <?php if($shift == "Human Error") { echo "selected"; }?>>Human Error</option>
			<option value='Metode Salah' <?php if($shift == "Metode Salah") { echo "selected"; }?>>Metode Salah</option>
            <option value='Dalam Penyelidikan' <?php if($shift == "Dalam Penyelidikan") { echo "selected"; }?>>Dalam Penyelidikan</option>
            <option value='Desain Salah' <?php if($shift == "Desain Salah") { echo "selected"; }?>>Desain Salah</option>
			<option value='Efisiensi' <?php if($shift == "Efisiensi") { echo "selected"; }?>>Efisiensi</option><br></td><td>
			<label>Job Desctiption</label>
         <textarea name="job" rows="6" class="form-control" required><?php echo $job ; ?> </textarea>
		 <br>
			<label>Total Loss</label>
        <input type="text" name="loss" class="form-control" value="<?php echo $loss ; ?>" >
		<br>
		 <label>Material</label>
         <textarea name="material" rows="3" class="form-control"><?php echo $material ; ?> </textarea>
		 <br>
		<label>Tipe Pekerjaan</label>
         <select name="job_type" class="form-control" required>
            <option value="">---- Silahkan pilih ----</option>
            <option value='Preventive' <?php if($job_type == "Preventive") { echo "selected"; }?>>Preventive</option>
            <option value='Corrective' <?php if($job_type == "Corrective") { echo "selected"; }?>>Corrective</option>
            <option value='Follow Up' <?php if($job_type == "Follow Up") { echo "selected"; }?>>Follow Up</option>
            <option value='Manual PM' <?php if($job_type == "Manual PM") { echo "selected"; }?>>Manual PM</option>
			<option value='Breakdown' <?php if($job_type == "Breakdown") { echo "selected"; }?>>Breakdown</option>
			<option value='Predictive' <?php if($job_type == "Predictive") { echo "selected"; }?>>Predictive</option>
			<option value='Inspection' <?php if($job_type == "Inspection") { echo "selected"; }?>>Inspection</option></select><br>
			<label>Status Pekerjaan</label>
         <select name="job_status" class="form-control" required>
            <option value="">---- Silahkan pilih ----</option>
            <option value='Open' <?php if($job_status == "Open") { echo "selected"; }?>>Open</option>
            <option value='Close' <?php if($job_status == "Close") { echo "selected"; }?>>Close</option>
            <option value='Waiting Part' <?php if($job_status == "Waiting Part") { echo "selected"; }?>>Waiting Part</option>
			<option value='Cancel' <?php if($job_status == "Cancel") { echo "selected"; }?>>Cancel</option></select><br>
		</td></table><br><br>
		<tr></tr><a href="index.php?halaman=pemeliharaan" class="btn btn-danger"></i>Kembali</a>
	<button type="submit" class="btn btn-primary" name="ubah"><i class="fa fa-pencil"></i>Simpan</button>
	</div>
</form>