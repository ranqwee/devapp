<h2> Ubah Data Preventif </h2><br>
<?php
$id_preventive = $_GET['id_preventive'];
$sql = mysql_query("SELECT * FROM preventive WHERE id_preventive='$id_preventive'");
if($data = mysql_fetch_array($sql)){
    $id_preventive = $data['id_preventive'];
    $jenis_job = $data['jenis_job'];
	$id_shop = $data ['id_shop'];
	$jam_kerja = $data ['jam_kerja'];
	$periode = $data ['periode'];
    }
?>
<form action="index.php?halaman=ubahpreventive" method="POST">
<div class="form-group">
<table width='100%' align='center'>
    <tr>
		<label>ID Preventive</label>
		<input type="text" name="id_preventive" class="form-control" 
		readonly value="<?php echo $data['id_preventive']; ?>"> </br>
		 </br> <label>Jenis Job</label>
         <textarea  name="jenis_job" class="form-control" rows="3" value="<?php echo $data['jenis_job']; ?>"><?php echo $jenis_job ;?></textarea>
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
    </br>
        <label>Jam Operasi</label>
        <input type="time" name="jam_kerja" class="form-control" value="<?php echo $data['jam_kerja']; ?>"required>
    </br>
		<label>Periode</label>
		<select name="periode" class="form-control" value="<?php echo $data['periode']; ?>">
        <option value="">--- Pilih Periode ---</option>
		<option value='Daily' <?php if($periode == "Daily") { echo "selected"; }?>>Daily</option>
		<option value='3 Daily' <?php if($periode == "3 Daily") { echo "selected"; }?>>3 Daily</option>
		<option value='Weekly' <?php if($periode == "Weekly") { echo "selected"; }?>>Weekly</option>
		<option value='2 Weekly' <?php if($periode == "2 Weekly") { echo "selected"; }?>>2 Weekly</option>
		<option value='3 Weekly' <?php if($periode == "3 Weekly") { echo "selected"; }?>>3 Weekly</option>
		<option value='Monthly' <?php if($periode == "Monthly") { echo "selected"; }?>>Monthly</option>
		<option value='2 Monthly' <?php if($periode == "2 Monthly") { echo "selected"; }?>>2 Monthly</option>
		<option value='3 Monthly' <?php if($periode == "3 Monthly") { echo "selected"; }?>>3 Monthly</option>
		<option value='4 Monthly' <?php if($periode == "4 Monthly") { echo "selected"; }?>>4 Monthly</option>
		<option value='6 Monthly' <?php if($periode == "6 Monthly") { echo "selected"; }?>>6 Monthly</option>
		<option value='Yearly' <?php if($periode == "Yearly") { echo "selected"; }?>>Yearly</option>
		<option value='2 Yearly' <?php if($periode == "2 Yearly") { echo "selected"; }?>>2 Yearly</option>
		<option value='3 Yearly' <?php if($periode == "3 Yearly") { echo "selected"; }?>>3 Yearly</option>
		<option value='5 Yearly' <?php if($periode == "5 Yearly") { echo "selected"; }?>>5 Yearly</option>
		<option value='6 Yearly' <?php if($periode == "6 Yearly") { echo "selected"; }?>>6 Yearly</option>
		<option value='10 Yearly' <?php if($periode == "10 Yearly") { echo "selected"; }?>>10 Yearly</option>
		</select><br><br>
		<a href="index.php?halaman=datapreventive" class="btn btn-danger"></i>Kembali</a>
    <tr></tr><button type="submit" class="btn btn-primary" name="save"><i class="fa fa-check"></i>Simpan</button><br><br>
</div></form>