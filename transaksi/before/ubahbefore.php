<h2> Ubah Kerusakan In Process </h2>
<?php
$kd_laporanbefore = $_GET['kd_laporanbefore'];
$sql = mysql_query("SELECT * from laporan_beforeprocess where kd_laporanbefore='$kd_laporanbefore'");
if($data = mysql_fetch_array($sql)){
    $kd_laporanbefore = $data['kd_laporanbefore'];
    $tanggal = $data['tanggal'];
    $kd_komponen = $data['kd_komponen'];
    $kd_jeniskerusakan = $data['kd_jeniskerusakan'];
    $kd_liniproduksi = $data['kd_liniproduksi'];
    $kd_tipeengine = $data['kd_tipeengine'];
    $kd_asalmasalah = $data['kd_asalmasalah'];
    $jumlah = $data['jumlah'];
    $kd_petugas = $data['kd_petugas'];
    }
?>
<form action="index.php?halaman=ubahbeforeprocess" method="POST">
   <div class="form-group">
   <table width='100%' align='center'>
    <tr>
      <td width='30%'>
      <input type="hidden" name="kd_laporanbefore" value="<?php echo $data['kd_laporanbefore'];?>">
        <label>Tanggal</label>
        <input type="date" name="tanggal" class="form-control" value="<?php echo $data['tanggal'];?>">
    </br>
        <label>Kode Komponen</label>
        <select name="kd_komponen" class="form-control" value="<?php echo $data['kd_komponen'];?>>
            <option value="">Pilih Kode Komponen</option>
                    <?php
                    include 'connect.php';
                    $sqlopt = "SELECT kd_komponen,nama_komponen FROM mst_komponen ";
                    $queryopt = mysql_query($sqlopt);
                    while($result=mysql_fetch_array($queryopt))
                    {
                        if($result['kd_komponen'] == $row['kd_komponen']) {
                        echo "<option value='$result[kd_komponen]' selected='selected'>$result[kd_komponen]</option>";
                        }else{
                        echo "<option value='$result[kd_komponen]'>$result[kd_komponen]</option>";
                        }
                    }
                    ?>                  
        </select>
    </br>
        <label>Jenis Kerusakan</label>
        <select name="kd_jeniskerusakan" class="form-control" value="<?php echo $data['kd_jeniskerusakan']; ?>>
            <option value="">Pilih Jenis Kerusakan</option>
                    <?php
                    include 'connect.php';
                    $sqlopt = "SELECT kd_jeniskerusakan,jenis_kerusakan FROM mst_jeniskerusakan where kategori_kerusakan='Before Process'";
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
        <label>Lokasi Reject</label>
        <select name="kd_asalmasalah" class="form-control" value="<?php echo $data['kd_asalmasalah']; ?>>
            <option value="">Pilih Lokasi Reject</option>
                    <?php
                    include 'connect.php';
                    $sqlopt = "SELECT kd_asalmasalah,nama_lokasiasalmasalah FROM mst_asal_masalah_komponen ";
                    $queryopt = mysql_query($sqlopt);
                    while($result=mysql_fetch_array($queryopt))
                    {
                        if($result['kd_komponen'] == $row['kd_asalmasalah']) {
                        echo "<option value='$result[kd_asalmasalah]' selected='selected'>$result[nama_lokasiasalmasalah]</option>";
                        }else{
                        echo "<option value='$result[kd_asalmasalah]'>$result[nama_lokasiasalmasalah]</option>";
                        }
                    }
                    ?>                  
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