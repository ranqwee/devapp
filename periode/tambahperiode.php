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


<h2> Tambah Data Preventif </h2>
<form action="index.php?halaman=savepreventive" method="POST">
    <div class="form-group">
    </br> <br><label>Jenis Job</label>
        <select name="id_preventive" class="form-control" required>
            <option value="">--- Pilih Job ---</option>
                    <?php
                    include 'connect.php';
                    $sqlopt = "SELECT id_preventive,jenis_job FROM preventive order by jenis_job asc";
                    $queryopt = mysql_query($sqlopt);
                    while($result=mysql_fetch_array($queryopt))
                    {
                        if($result['id_preventive'] == $row['jenis_job']) {
                        echo "<option value='$result[id_preventive]' selected='selected'>$result[jenis_job]</option>";
                        }else{
                        echo "<option value='$result[id_preventive]'>$result[jenis_job]</option>";
                        }
                    }
                    ?>                  
        </select><br>
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
	<label>Periode</label>
        <select name="periode" class="form-control" required>
            <option value="">--- Pilih Periode ---</option>
                    <?php
                    include 'connect.php';
                    $sqlopt = "SELECT id_preventive,periode FROM preventive order by periode asc";
                    $queryopt = mysql_query($sqlopt);
                    while($result=mysql_fetch_array($queryopt))
                    {
                        if($result['id_preventive'] == $row['periode']) {
                        echo "<option value='$result[id_preventive]' selected='selected'>$result[periode]</option>";
                        }else{
                        echo "<option value='$result[id_preventive]'>$result[preiode]</option>";
                        }
                    }
                    ?>                  
        </select><br>
        <label>Jadwal Ke-1</label>
        <input type="date" name="jdw1" class="form-control">
    </br>
	        <label>Jadwal Ke-2</label>
        <input type="date" name="jdw2" class="form-control">
    </br>

	        <label>Jadwal Ke-3</label>
        <input type="date" name="jdw3" class="form-control">
    </br>

	        <label>Jadwal Ke-4</label>
        <input type="date" name="jdw4" class="form-control">
    </br>

	        <label>Jadwal Ke-5</label>
        <input type="date" name="jdw5" class="form-control">
    </br>

		<a href="index.php?halaman=datajadwal" class="btn btn-danger"></i>Kembali</a>
    <tr></tr><button type="submit" class="btn btn-primary" name="save"><i class="fa fa-check"></i>Simpan</button>
    </div>

</form>