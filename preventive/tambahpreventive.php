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
    </br> <label>Jenis Job</label>
         <textarea  name="jenis_job" class="form-control" rows="3"></textarea>
		 <br>
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
        <label>Jam Operasi</label>
        <input type="time" name="jam_kerja" class="form-control" required>
    </br>
		<label>Periode</label>
		<select name="periode" class="form-control">
        <option value="">--- Pilih Periode ---</option>
		<option value="Daily">Daily</option>
		<option value="3 Daily">3 Daily</option>
		<option value="Weekly">Weekly</option>
		<option value="2 Weekly">2 Weekly</option>
		<option value="3 Weekly">3 Weekly</option>
		<option value="Monthly">Monthly</option>
		<option value="2 Monthly">2 Monthly</option>
		<option value="3 Monthly">3 Monthly</option>
		<option value="4 Monthly">4 Monthly</option>
		<option value="6 Monthly">6 Monthly</option>
		<option value="Yearly">Yearly</option>
		<option value="2 Yearly">2 Yearly</option>
		<option value="3 Yearly">3 Yearly</option>
		<option value="5 Yearly">5 Yearly</option>
		<option value="6 Yearlyy">6 Yearly</option>
		<option value="10 Yearly">10 Yearly</option>
		<option value="Visualy">Visualy</option>
		<option value="Model Change">Model Change</option>
		</select><br><br>
		<a href="index.php?halaman=datapreventive" class="btn btn-danger"></i>Kembali</a>
    <tr></tr><button type="submit" class="btn btn-primary" name="save"><i class="fa fa-check"></i>Simpan</button>
    </div>

</form>