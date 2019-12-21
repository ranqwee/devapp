<h2>Ubah Data Personil </h2>
<?php
$id_personil = $_GET['id_personil'];
$sql = mysql_query("SELECT * from ms_personil WHERE id_personil='$id_personil'");
if($data = mysql_fetch_array($sql)){
    $id_personil = $data['id_personil'];
	$tgl_personil = $data['tgl_personil'];
    $nama_personil = $data['nama_personil'];
	$alamat_personil = $data['alamat_personil'];
	$telp_personil = $data['telp_personil'];
	$hp_personil = $data['hp_personil'];
	$id_shop = $data ['id_shop'];
	$skill = $data ['skill'];
	$keterangan = $data['keterangan'];
    }
?>
<form action="index.php?halaman=ubah" method="POST">
	<div class="form-group">
	<table width='100%' align='center'><td>
		<label>ID Personil</label>
		<input type="text" name="id_personil" name="id_personil" class="form-control" 
		readonly value="<?php echo $id_personil ; ?>"><br>
	<label>Tanggal</label>
        <input type="date" name="tgl_personil" class="form-control" value="<?php echo $data['tgl_personil']; ?>">
    </br>
        <label>Nama Personil</label>
        <input type="text" name="nama_personil" class="form-control" value="<?php echo $data['nama_personil']; ?>">
    </br>
	<label>Alamat</label>
         <textarea  name="alamat_personil" class="form-control" rows="5" ><?php echo $alamat_personil ; ?></textarea></td><td>
				<br><br><br><label>No Telp</label>
        <input type="text" name="telp_personil" class="form-control" value="<?php echo $telp_personil ; ?>">
    <br><br>
	<label>No HP</label>
        <input type="text" name="hp_personil" class="form-control" value="<?php echo $hp_personil ; ?>">
    </br>
       <label>Shop</label>
        <select name="id_shop" class="form-control" >
            <option value="<?php echo $id_shop ; ?>">---- Pilih Shop ----</option>
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
        <select name="skill" class="form-control">
            <option value='Leader' <?php if($skill == "Leader") { echo "selected"; }?>>Leader</option>
			<option value="<?php echo $skill; ?>">----- Pilih Skill -----</option>
			<option value='Welding' <?php if($skill == "Welding") { echo "selected"; }?>>Welding</option>
            <option value='Wiring' <?php if($skill == "Wiring") { echo "selected"; }?>>Wiring</option>
            <option value='Fabrikasi' <?php if($skill == "Welding") { echo "selected"; }?>>Fabrikasi</option>
            <option value='Elektrikal' <?php if($skill == "Elektrikal") { echo "selected"; }?>>Elektrikal</option>
			<option value='Mekanikal' <?php if($skill == "Mekanikal") { echo "selected"; }?>>Mekanikal</option>
            <option value='Refrigerasi' <?php if($skill == "Refrigerasi") { echo "selected"; }?>>Refrigerasi</option>
            <option value='Plumber' <?php if($skill == "Plumber") { echo "selected"; }?>>Plumber</option>
            <option value='PLC' <?php if($skill == "PLC") { echo "selected"; }?>>PLC</option>
            <option value='Pneumatik' <?php if($skill == "Pneumatik") { echo "selected"; }?>>Pneumatik</option>
            <option value='Hydrolik' <?php if($skill == "Hydrolik") { echo "selected"; }?>>Hydrolik</option>
            <option value='Computer' <?php if($skill == "Computer") { echo "selected"; }?>>Computer</option>
			<option value='Eletronik' <?php if($skill == "Eletronik") { echo "selected"; }?>>Eletronik</option>
            <option value='Data Analys' <?php if($skill == "Data Analys") { echo "selected"; }?>>Data Analys</option>
            <option value='Wooden' <?php if($skill == "Wooden") { echo "selected"; }?>>Wooden</option>
            <option value='Helper' <?php if($skill == "Helper") { echo "selected"; }?>>Helper</option>
        </select>
    </br>
	<label>Keterangan</label>
        <input type="text" name="keterangan" class="form-control" value="<?php echo $keterangan ; ?>">
    </br></td></table>
	<tr></tr><a href="index.php?halaman=datapersonil" class="btn btn-danger"></i>Kembali</a>
	<button type="submit" class="btn btn-primary" name="ubah"><i class="fa fa-pencil"></i>Simpan</button>
</div></form>