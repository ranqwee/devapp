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


<h2> Tambah Job Order </h2>
<form action="index.php?halaman=savejoborder" method="POST">
    <div class="form-group">
	<table width='100%' align='center'>
    <tr>
       <td width='35%'><br><br>
	   <label>Tanggal dan Jam Pelaksanaan</label><br>
        <input type="datetime-local" name="jam" class="form-control" required><br>
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
        </select>
    </br>
        <label>Shift</label>
         <select name="shift" class="form-control" required>
            <option value="">---- Pilih Shift ----</option>
            <option value="Shift 1">Shift 1</option>
            <option value="Shift 2">Shift 2</option>
            <option value="Shift 3">Shift 3</option>
            <option value="Normal">Normal</option>
			<option value="OT 7">OT 7</option>
            <option value="OT 2">OT 2</option>
            <option value="OT 3">OT 3</option>
        </select>
		<br>
		</td><td>
		<br><br><br><label>Job Desc</label><br>
        <textarea  name="job" class="form-control" rows="5"></textarea><br>
		<label>Material dan Bahan</label>
        <textarea  name="material" class="form-control" rows="2"></textarea>
    </br></td></table><br><br>
	<tr></tr><a href="index.php?halaman=joborder" class="btn btn-danger"></i>Kembali</a>
    <tr></tr><button type="submit" class="btn btn-primary" name="save"><i class="fa fa-check"></i>Simpan</button>
    </div>

</form>