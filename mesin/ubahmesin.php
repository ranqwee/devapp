<h2> Ubah Mesin </h2>
<?php
$id_mesin = $_GET['id_mesin'];
$sql = mysql_query("SELECT * FROM ms_mesin WHERE id_mesin='$id_mesin'");
if($data = mysql_fetch_array($sql)){
    $id_mesin = $data['id_mesin'];
	$tgl_mesin = $data['tgl_mesin'];
    $nama_mesin = $data['nama_mesin'];
	$type_mesin = $data['type_mesin'];
	$merek_mesin = $data['merek_mesin'];
	$noseri_mesin = $data['noseri_mesin'];
	$tahun_mesin = $data['tahun_mesin'];
	$jml_mesin = $data['jml_mesin'];
	$id_shop = $data['id_shop'];
	$id_personil = $data['id_personil'];
	$supp_mesin = $data['supp_mesin'];
    }
?>
<form action="index.php?halaman=ubahmesin" method="POST">
	<div class="form-group">
	<table width='100%' align='center'><td>
     <br><br>   <label>ID Mesin</label>
		<input type="text" name="id_mesin" name="id_mesin" class="form-control" 
		readonly value="<?php echo $data['id_mesin']; ?>"> </br>
		 <label>Tanggal</label>
        <input type="date" name="tgl_mesin" class="form-control" value="<?php echo $data['tgl_mesin']; ?>">
        </br>
		<label>Nama Mesin</label>
        <input type="text" name="nama_mesin" class="form-control" value="<?php echo $data['nama_mesin']; ?>">
        </br>
		<label>Type Mesin</label>
        <input type="text" name="type_mesin" class="form-control" value="<?php echo $data['type_mesin']; ?>">
        </br>
		<label>Merek Mesin</label>
        <input type="text" name="merek_mesin" class="form-control" value="<?php echo $data['merek_mesin']; ?>">
		<br>
		<label>Noseri Mesin</label>
        <input type="text" name="noseri_mesin" class="form-control" value="<?php echo $data['noseri_mesin']; ?>">
        </br></td><td>
		<label>Tahun</label>
        <input type="year" name="tahun_mesin" class="form-control" value="<?php echo $data['tahun_mesin']; ?>">
		<br>
		<label>Jumlah</label>
        <input type="text" name="jml_mesin" class="form-control" value="<?php echo $data['jml_mesin']; ?>">
        <br>
		 <label>Shop</label>
        <select name="id_shop" class="form-control" required>
            <option value="<?php echo $data['id_shop']; ?>">--- Pilih Shop ---</option>
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
            <option value="<?php echo $data['id_personil']; ?>">--- Pilih Personil ---</option>
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
        <input type="text" name="supp_mesin" class="form-control" value="<?php echo $data['supp_mesin']; ?>">
        </br>
		</td>
		</table>
	<tr></tr><a href="index.php?halaman=datamesin" class="btn btn-danger"></i>Kembali</a>
	<button type="submit" class="btn btn-primary" name="ubah"><i class="fa fa-pencil"></i>Simpan</button>
</div></form>