<script language="javascript">
 function hanyaAngka(e, decimal) {
    var key;
    var keychar;
     if (window.event) {
         key = window.event.keyCode;
     } else
     if (e) {
         key = e.which;
     } else return true;
   
    keychar = String.fromCharCode(key);
    if ((key==null) || (key==0) || (key==8) ||  (key==9) || (key==13) || (key==27) ) {
        return true;
    } else
    if ((("0123456789").indexOf(keychar) > -1)) {
        return true;
    } else
    if (decimal && (keychar == ".")) {
        return true;
    } else return false;
    }

</script>


<h2> Tambah Data Pemeliharaan </h2>
<form action="index.php?halaman=savepemeliharaan" method="POST">
    <div class="form-group">
	<table width='100%' align='center'>
    <tr><br><br>
	<td width='35%'><label>ID Joborder</label>
         <input type="text" name="id_joborder" class="form-control" required>
		 <br>
		 <label>Tanggal</label>
         <input type="date" name="tgl" class="form-control" required>
		 <br>
		 <label>Nama Mesin</label>
        <select name="id_mesin" class="form-control" required>
            <option value="">---- Pilih Mesin ----</option>
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
            <option value="">--- Pilih Shop ---</option>
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
            <option value="">---- Pilih Personil ----</option>
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
         <select name="shift" class="form-control" required>
            <option value="">---- Silahkan pilih ----</option>
            <option value="Shift 1">Shift 1</option>
            <option value="Shift 2">Shift 2</option>
            <option value="Shift 3">Shift 3</option>
            <option value="Normal">Normal</option>
			<option value="OT 7">OT 7</option>
            <option value="OT 2">OT 2</option>
            <option value="OT 3">OT 3</option></select>
        </br> 
		 <label>Penyebab</label>
         <select name="penyebab" class="form-control">
            <option value="">---- Silahkan pilih ----</option>
            <option value="Umur Tercapai">Umur Tercapai</option>
            <option value="Pengaruh Lingkungan">Pengaruh Lingkungan</option>
            <option value="Material Salah">Material Salah</option>
            <option value="Human Error">Human Error</option>
			<option value="Metode Salah">Metode Salah</option>
            <option value="Dalam Penyelidikan">Dalam Penyelidikan</option>
            <option value="Desian Salah">Desian Salah</option>
			<option value="Efisiensi">Efisiensi</option></select><br></td><td>
			<label>Job Desctiption</label>
         <textarea name="job" rows="6" class="form-control" required></textarea>
		 <br>
			<label>Total Loss</label>
        <input type="text" name="loss" class="form-control"><br>
		 <label>Material</label>
         <textarea name="material" rows="3" class="form-control"></textarea>
		 <br>
		<label>Tipe Pekerjaan</label>
         <select name="job_type" class="form-control" required>
            <option value="">---- Silahkan pilih ----</option>
            <option value="Preventive">Preventive</option>
            <option value="Corrective">Corrective</option>
            <option value="Follow Up">Follow Up</option>
            <option value="Manual PM">Manual PM</option
			<option value="Breakdown">Breakdown</option>
			<option value="Predictive">Predictive</option>
			<option value="Inspection">Inscpection</option></select><br>
			<label>Status Pekerjaan</label>
         <select name="job_status" class="form-control" required>
            <option value="">---- Silahkan pilih ----</option>
            <option value="Open">Open</option>
            <option value="Close">Close</option>
            <option value="Waiting Part">Waiting Part</option>
			<option value="Cancel">Cancel</option></select><br>
		</td></table><br><br>
		<tr></tr><a href="index.php?halaman=pemeliharaan" class="btn btn-danger"></i>Kembali</a>
    <tr></tr><button type="submit" class="btn btn-primary" name="save"><i class="fa fa-check"></i>Simpan</button>
    </div>

</form>