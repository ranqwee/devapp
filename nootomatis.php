<?php
    date_default_timezone_set("Asia/Jakarta");
    $y_stamp = date("my");

    $query = mysql_query("select max(kd_laporanbefore) as KdMaks From laporan_beforeprocess") or die (mysql_error());
    $hasil = mysql_fetch_array ($query);
    $id = $hasil ['KdMaks'];

    $no_Urut = (int) substr($id, 6,4 );
    $no_Urut++;

    $char = "LB".$y_stamp;
    $IDbaru = $char . sprintf("%04s", $no_Urut);
?>

<h2> Input Kerusakan Before Process </h2>
</br>
<form action="index.php?halaman=savebeforeprocess" method="POST">
    <div class="form-group">
   <table width='100%' align='center'>
    <tr>
        <td width='40%'>
        <label>Kode Laporan</label>
        <input type="hidden" name="kd_laporanbefore">
        <input type="text" name="kd_laporanbefore" id="kd_laporanbefore" value="<?php echo $IDbaru;?>" disabled="disabled" class="form-control" required>
        <label>Tanggal</label>
        <input type="date" name="tanggal" class="form-control" required>
    </br>
        <label>Nama Komponen</label>
        <select name="kd_komponen" class="form-control" required>
            <option value="">Pilih Komponen</option>
                    <?php
                    include 'connect.php';
                    $sqlopt = "SELECT kd_komponen,nama_komponen FROM mst_komponen ";
                    $queryopt = mysql_query($sqlopt);
                    while($result=mysql_fetch_array($queryopt))
                    {
                        if($result['kd_komponen'] == $row['kd_komponen']) {
                        echo "<option value='$result[kd_komponen]' selected='selected'>$result[nama_komponen]</option>";
                        }else{
                        echo "<option value='$result[kd_komponen]'>$result[nama_komponen]</option>";
                        }
                    }
                    ?>                  
        </select>

    </br>
        <label>Jenis Kerusakan</label>
        <select name="kd_jeniskerusakan" class="form-control" required>
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
        <select name="kd_liniproduksi" class="form-control" required>
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
        <select name="kd_tipeengine" class="form-control" required>
            <option value="">Pilih Tipe Engine</option>
                    <?php
                    include 'connect.php';
                    $sqlopt = "SELECT kd_tipeengine,tipe_engine FROM mst_tipeengine order by tipe_engine asc";
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
        <select name="kd_asalmasalah" class="form-control" required>
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
        <input type="text" name="jumlah" class="form-control" required>
    </br>
        <label>Nama Petugas</label>
        <select name="kd_petugas" class="form-control" required>
            <option value="">Pilih Petugas</option>
                    <?php
                    include 'connect.php';
                    $sqlopt = "SELECT kd_petugas,nama_petugas FROM mst_petugas";
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
    <button type="submit" class="btn btn-primary" name="save"><i class="fa fa-check"></i>Simpan</button>
</form>