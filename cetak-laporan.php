<?php
include "connect.php" ;

$tgl_awal=$_GET['dt1cari'];
$tgl_akhir=$_GET['dt2cari'];
$result=mysql_query("SELECT * FROM pemeliharaan JOIN ms_mesin on pemeliharaan.id_mesin = ms_mesin.id_mesin JOIN ms_shop on pemeliharaan.id_shop = ms_shop.id_shop
			JOIN ms_personil on pemeliharaan.id_personil = ms_personil.id_personil where 
                tgl BETWEEN '$tgl_awal' AND '$tgl_akhir' ORDER BY tgl ASC"); 
				
?>
<title>Laporan Hasil Pemeliharaan Mesin Produksi</title>
<link rel="shortcut icon" href="../images/favicon.png" type="image/x-icon">
<link rel="stylesheet" href="../css/print.css" type="text/css"  />
<style>
 @media print {
   .noPrint{
      display: none !important;
   }
}
</style>
<table width="100%" class="table" border="1">
  <tr>
    <td width="21%"><div style="text-align: center;">
<img src="../images/logo.png" />
</div></td>
    <td width="79%"><div align="center"><h3>Laporan Hasil Pemeliharaan Mesin Produksi</h3>
      <p>PT Topjaya Antariksa Electronics</p>
    </div></td>
  </tr>
  <tr>
    <td colspan="2">Periode : <strong><?php echo $_GET['dt1cari']; ?> - <?php echo $_GET['dt2cari']; ?></strong></td>
  </tr>  
</table>
<p></p>
<table width="100%" class="table" border="1" >
   <tr>
    <th  style='vertical-align:middle' width="3%" ><small>No</th>
	<th  style='vertical-align:middle' width="15%" ><small>Nama Mesin</th>
	<th  style='vertical-align:middle' width="4%" ><small>Kelas</th>
	<th  style='vertical-align:middle' width="7%" ><small>Id Mtn</th>
	<th  style='vertical-align:middle' width="22%" ><small>Lokasi</th>
    <th  style='vertical-align:middle' width="10%" ><small>Pelaksana</th>
	<th  style='vertical-align:middle' width="25%" ><small>Masalah</th>
	<th  style='vertical-align:middle' width="25%" ><small>Tindakan</th>
	 <th  style='vertical-align:middle' width="7%"><small>Tgl Rencana</th>
	 <th  style='vertical-align:middle' width="7%"><small>Tgl Pelaksanaan</th>
	<th  style='vertical-align:middle' width="7%" ><small>Status</th>
</tr>
<?php while ($data = mysql_fetch_array($result)) { 
?>
   <tr>
      <td style='vertical-align:middle'><small><?php echo $no; ?></td>
	  <td style='vertical-align:middle'><small><?php echo $data['nama_mesin']; ?></td>
	  <td style='vertical-align:middle'><small><?php echo $data['kelas']; ?></td>
	  <td style='vertical-align:middle'><small><?php echo $data['id_mtn']; ?></td>
	  <td style='vertical-align:middle'><small><?php echo $data['lokasi']; ?></td>
	  <td style='vertical-align:middle'><small><?php echo $data['nama']; ?></td>
	  <td style='vertical-align:middle'><small><?php echo $data['masalah']; ?></td>
	  <td style='vertical-align:middle'><small><?php echo $data['tindakan']; ?></td>
	  	<?php
			$sql3=mysql_query("SELECT * FROM detail_perawatan where id_perawatan='".$data['id_perawatan']."' 
			AND month(tgl_rencana)='".$idx."' ");
		$dataVal = "";
			while ($r1=mysql_fetch_array($sql3)){		
					if($r1['tgl_rencana'] == "0000-00-00") {$dataVal = "-";} else { $dataVal = date("d-m-Y",strtotime($r1['tgl_rencana'])) ; } 
			}
			  
			  ?>
			<td style='min-width:120px; vertical-align:middle'>
			<?php echo $dataVal; ?>
			</td>

	  <?php
	  	$sql3=mysql_query("SELECT * FROM detail_perawatan where id_perawatan='".$data['id_perawatan']."' 
		AND month(tgl_rencana)='".$idx."' ");
			while ($r1=mysql_fetch_array($sql3)){		
				   if($r1['tgl_pelaksanaan'] == "0000-00-00") { $dataVal2= "-";} else { $dataVal2= date("d-m-Y",strtotime($r1['tgl_pelaksanaan'])) ; } 
			}	
		?>
		<td style='min-width:120px; vertical-align:middle'>
			<?php echo $dataVal2; ?>
			</td>
		<td style='vertical-align:middle'><small><?php echo $data['status']; ?></td>
		</tr>
 <?php
$no++;
}
?>
<?php
if ($total ==0)
{
?>
 <tr><td colspan="19">Belum ada laporan perawatan mesin</td>
  </tr>
</tr>
<?php	
}
?>
</table>
<table width="100%" class="table" border="1" >
<tr><td colspan="9">Total : <?php echo $total; ?> Mesin</td>
  </tr>
</tr>
</table>
<p></p>
<table width="700" class="table" border="1">
  <tr>
    <td>Dibuat Oleh : </td>
    <td>Mengetahui : </td>
    <td colspan="2">Menyetujui : </td>
  </tr>
  <tr>
    <th height="10">Admin Maintenance</th>
    <th>KK Maintenance</th>
    <th>Foreman Maintenance</th>
    <th>Manager Maintenance</th>
  </tr>  
  <tr>
    <td height="80">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>

</table>
<div style="text-align:center;padding:20px;">
	<input class="noPrint" type="button" value="Cetak Halaman" onclick='window.print();' >
	<input class="noPrint" type="button" value="Tutup" onclick='window.close();' >
	</div>