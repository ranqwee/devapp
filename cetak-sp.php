<?php
include('connect.php');
$no = 0;
$no_sp = $_GET['no_sp'];
$sql = mysql_query("SELECT * FROM srt_pgntr JOIN dp ON srt_pgntr.ndp = dp.ndp WHERE no_sp='$no_sp'");
if($data = mysql_fetch_array($sql)){
    $no_sp = $data['no_sp'];
    $ndp = $data['ndp'];
	$tggl_sp = $data['tggl_sp'];
	$kpd_sp = $data['kpd_sp'];
	$ket = $data['ket'];
	}
?>
<title>Surat Pengantar</title>
<style>
 @media print {
   .noPrint{
      display: none !important;
   }
}
</style>
<table width="100%" class="table" border="1">
  <tr bgcolor="#87CEEB">
  <td width="21%"><div style="text-align: center;"><img src="../images/as.png" width="171" height="40">
</div></td>
    <td width="79%"><div align="center"><h3>Surat Pengantar</h3>
      <p>PT Astra UD Trucks</p>
    </div></td>
  </tr>
  <tr bgcolor="#B0E0E6">
    <td colspan="2">No DP : <strong><?php echo $ndp ; ?></strong></td>	
  </tr>  
  <tr bgcolor="#B0E0E6">
    <td colspan="2">Tanggal : <strong><?php echo $tggl_sp ; ?></strong></td>	
  </tr>
</table>
<p></p>
<table width="100%" class="table" border="1" >
   <thead>
   <tr bgcolor="#87CEEB">
      <th width="3%" >No</th>
    <th width="7%">No SP</th>
    <th width="15%">Kepada</th>
    <th width="15%">Keterangan</th>
</tr></thead><tbody>
<?php
            $us = mysql_query("SELECT * FROM srt_pgntr JOIN dp ON srt_pgntr.ndp = dp.ndp order by no_sp");
        while($data=mysql_fetch_array($us))
        {
			$no++;
        ?>
		
   <tr>
		<td><b><?php echo $no ; ?></b></td>
            <td><?php echo $data['no_sp'] ?></td>
            <td><?php echo $data['kpd_sp'] ?></td>
			<td><?php echo $data['ket'] ?></td></tr></tbody>
			<?php } ?>
        
<table width="100%" class="table" align="center"><tr>
<div style="text-align:center;padding:20px;">		
	<td><input class="noPrint" type="button" value="Cetak Halaman" onclick='window.print();' >
	<input class="noPrint" type="button" value="Tutup" onclick='window.close();' >
	</div></td></tr></table>