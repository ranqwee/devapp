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


<h2> Ubah Kerusakan In Process </h2>
<?php
$kd_laporanin = $_GET['kd_laporanin'];
$sql = mysql_query("SELECT * from laporan_inprocess where kd_laporanin='$kd_laporanin'");
if($data = mysql_fetch_array($sql)){
	$kd_laporanin = $data['kd_laporanin'];
    $tanggal = $data['tanggal'];
    $no_engine = $data['no_engine'];
	$kd_jeniskerusakan = $data['kd_jeniskerusakan'];
	$kd_liniproduksi = $data['kd_liniproduksi'];
	$kd_tipeengine = $data['kd_tipeengine'];
	$jenis_perbaikan = $data['jenis_perbaikan'];
	$jumlah = $data['jumlah'];
	$kd_petugas = $data['kd_petugas'];
    }
?>
<form action="index.php?halaman=ubahinprocess" method="POST">
   <div class="form-group">
   <table width='100%' align='center'>
    <tr>
      <td width='30%'>
      <input type="hidden" name="kd_laporanin" value="<?php echo $data['kd_laporanin'];?>">
        <label>Tanggal</label>
        <input type="date" name="tanggal" class="form-control" value="<?php echo $data['tanggal'];?>">
    </br>
        <label>No Engine</label>
        <input type="text" name="no_engine" readonly class="form-control" value="<?php echo $data['no_engine'];?>" maxlength="6" onkeypress="return hanyaAngka(event, false)">
    </br>
        <label>Jenis Kerusakan</label>
        <select name="kd_jeniskerusakan" class="form-control" value="<?php echo $data['kd_jeniskerusakan']; ?>>
            <option value="">Pilih Jenis Kerusakan</option>
					<?php
					include 'connect.php';
					$sqlopt = "SELECT kd_jeniskerusakan,jenis_kerusakan FROM mst_jeniskerusakan where kategori_kerusakan='in process'";
					$queryopt = mysql_query($sqlopt);
					while($result=mysql_fetch_array($queryopt))
					{
						if($result['kd_jeniskerusakan'] == $row['kd_jeniskerusakan']) {
						echo "<option value='$result[kd_jeniskerusakan]' selected='selected'>$result[jenis_kerusakan]</option>";
						}else{
						echo "<option value='$result[kd_jeniskerusakan]'>$result[jenis_kerusakan]</option>";
						}
					}
					?>					
        </select>
        <br>
        <label>Lini Produksi</label>
        <select name="kd_liniproduksi" class="form-control" value="<?php echo $data['kd_liniproduksi']; ?>>
            <option value="">Pilih Lini Produksi</option>
                    <?php
                    include 'connect.php';
                    $sqlopt = "SELECT kd_liniproduksi,nama_liniproduksi FROM mst_liniproduksi ";
                    $queryopt = mysql_query($sqlopt);
                    while($result=mysql_fetch_array($queryopt))
                    {
                        if($result['kd_liniproduksi'] == $row['kd_liniproduksi']) {
                        echo "<option value='$result[kd_liniproduksi]' selected='selected'>$result[nama_liniproduksi]</option>";
                        }else{
                        echo "<option value='$result[kd_liniproduksi]'>$result[nama_liniproduksi]</option>";
                        }
                    }
                    ?>                  
        </select>
        <br>
        </td>        
<td>
        <label>Tipe Engine</label>
        <select name="kd_tipeengine" class="form-control" value="<?php echo $data['kd_tipeengine']; ?>>
            <option value="">Pilih Tipe Engine</option>
                    <?php
                    include 'connect.php';
                    $sqlopt = "SELECT kd_tipeengine,tipe_engine FROM mst_tipeengine";
                    $queryopt = mysql_query($sqlopt);
                    while($result=mysql_fetch_array($queryopt))
                    {
                        if($result['kd_tipeengine'] == $row['kd_tipeengine']) {
                        echo "<option value='$result[kd_tipeengine]' selected='selected'>$result[tipe_engine]</option>";
                        }else{
                        echo "<option value='$result[kd_tipeengine]'>$result[tipe_engine]</option>";
                        }
                    }
                    ?>                  
        </select>
        <br>
        <label>Jenis Perbaikan</label>
        <select name="jenis_perbaikan" class="form-control" value="<?php echo $data['jenis_perbaikan']; ?>>
            <option value="">Pilih Jenis Perbaikan</option>
            <option value="Dibersihkan">Dibersihkan</option>
            <option value="Diganti">Diganti</option>
            <option value="Dilengkapi">Dilengkapi</option>
            <option value="Diperbaiki">Diperbaiki</option>
            <option value="Diposisikan">Diposisikan</option>
        </select>
    </br>
        <label>jumlah</label>
        <input type="text" name="jumlah" class="form-control" value="<?php echo $data['jumlah']; ?>">
    </br>
        <label>Nama Petugas</label>
        <select name="kd_petugas" class="form-control" value="<?php echo $data['kd_petugas']; ?>>
         <option value=""></option>
                    <?php
                    include 'connect.php';
                    $sqlopt = "SELECT kd_petugas,nama_petugas FROM mst_petugas ";
                    $queryopt = mysql_query($sqlopt);
                    while($result=mysql_fetch_array($queryopt))
                    {
                        if($result['kd_petugas'] == $row['kd_petugas']) {
                        echo "<option value='$result[kd_petugas]' selected='selected'>$result[nama_petugas]</option>";
                        }else{
                        echo "<option value='$result[kd_petugas]'>$result[nama_petugas]</option>";
                        }
                    }
                    ?>
        </select>
        <br>  
        </td>
</table>                      
	</div>
	<button type="submit" class="btn btn-primary" name="ubah"><i class="fa fa-pencil"></i>Simpan</button>
</form>