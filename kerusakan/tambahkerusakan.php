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


<h2>Tambah Data Kerusakan </h2>
<form action="index.php?halaman=savekerusakan" method="POST">
    <div class="form-group">
    </br> 
	<label>Pelapor</label>
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
        </select><br>
	<label>Tanggal Kerusakan</label>
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
		<label>Kerusakan</label>
        <textarea  name="kerusakan" class="form-control" rows="3"></textarea>
		<br>
		<input type="hidden" name="status" value="Baru Dikirimkan" /></td>
    </br>
	<tr></tr><a href="index.php?halaman=laporankerusakantek" class="btn btn-danger"></i>Kembali</a>
    <tr></tr><button type="submit" class="btn btn-primary" name="save"><i class="fa fa-check"></i>Simpan</button>
    </div>

</form>