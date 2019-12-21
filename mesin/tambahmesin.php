<h2> Tambah Mesin </h2>
<form action="index.php?halaman=savemesin" method="POST">
    <div class="form-group">
	<table width='100%' align='center'>
    <tr><br>
       <td width='35%'>
	   <label>Tanggal</label>
        <input type="date" name="tgl_mesin" class="form-control" required>
        </br>
		<label>Nama Mesin</label>
        <input type="text" name="nama_mesin" class="form-control" required>
        </br>
		<label>Type Mesin</label>
        <input type="text" name="type_mesin" class="form-control" required>
        </br>
		<label>Merek Mesin</label>
        <input type="text" name="merek_mesin" class="form-control" required>
		<br>
		<label>Noseri Mesin</label>
        <input type="text" name="noseri_mesin" class="form-control" required>
        </br></td><td>
		<label>Tahun</label>
        <input type="year" name="tahun_mesin" class="form-control" required>
		<br>
		<label>Jumlah</label>
        <input type="text" name="jml_mesin" class="form-control" required>
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
		<br>
		<label>Personil</label>
        <select name="id_personil" class="form-control" required>
            <option value="">--- Pilih Personil ---</option>
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
		<br>
		<label>Supplier</label>
        <input type="text" name="supp_mesin" class="form-control" required>
        </br>
		</td>
		</table>
	<tr></tr><a href="index.php?halaman=datamesin" class="btn btn-danger"></i>Kembali</a>
    <button type="submit" class="btn btn-primary" name="save"><i class="fa fa-check"></i>Simpan</button>
</div></form>