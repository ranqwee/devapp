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


<h2> Tambah Data Personil </h2>
<form action="index.php?halaman=save" method="POST">
    <div class="form-group">
	<table width='100%' align='center'><td>
	<br><br><label>Tanggal</label>
        <input type="date" name="tgl_personil" class="form-control">
    </br>
        <label>Nama Personil</label>
        <input type="text" name="nama_personil" class="form-control" required maxlength="20">
    </br>
	<label>Alamat</label>
         <textarea  name="alamat_personil" class="form-control" rows="5"></textarea>
				<br><label>No Telp</label>
        <input type="text" name="telp_personil" class="form-control">
    <br><br></td><td>
	<label>No HP</label>
        <input type="text" name="hp_personil" class="form-control">
    </br>
       <label>Shop</label>
        <select name="id_shop" class="form-control" required>
            <option value="">---- Pilih Shop ----</option>
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
        <label>Skill</label>
        <select name="skill" class="form-control" >
            <option value="">----- Pilih Skill -----</option>
            <option value="Welding">Welding</option>
            <option value="Wiring">Wiring</option>
            <option value="Fabrikasi">Fabrikasi</option>
            <option value="Elektrikal">Elektrikal</option>
			<option value="Mekanikal">Mekanikal</option>
            <option value="Refrigerasi">Refrigerasi</option>
            <option value="Plumber">Plumber</option>
            <option value="PLC">PLC</option>
            <option value="Pneumatik">Pneumatik</option>
            <option value="Hydrolik">Hydrolik</option>
            <option value="Leader">Leader</option>
            <option value="Computer">Computer</option>
			<option value="Elektronik">Elektronik</option>
            <option value="DataAnalys">Data Analys</option>
            <option value="Wooden">Wooden</option>
            <option value="Helper">Helper</option>
        </select>
    </br>
	<label>Keterangan</label>
        <input type="text" name="keterangan" class="form-control">
    </br></td></table>
	<tr></tr><a href="index.php?halaman=datapersonil" class="btn btn-danger"></i>Kembali</a>
    <tr></tr><button type="submit" class="btn btn-primary" name="save"><i class="fa fa-check"></i>Simpan</button>
    </div>

</form>