<?php
include('connect.php');
$no=0;
?>
<title>Laporan Persediaan Aset</title>
<style>
 @media print {
   .noPrint{
      display: none !important;
   }
}
</style>
<table width="100%" class="table" border="1">
  <tr bgcolor="#87CEEB">
    <td width="79%"><div align="center"><h3>Laporan Persediaan Aset</h3>
      <p>PT Astra UD Trucks</p>
    </div></td>
  </tr>
</table>
<table width="100%" class="table" border="1" >
   <thead>
   <tr bgcolor="#B0E0E6">
      <th width="3%" >No</th>
    <th width="15%">No Aset</th>
    <th width="15%">Deskripsi Aset</th>
    <th width="5%">Satuan</th>
    <th width="10%">Stock Minimal</th>
    <th width="10%">Stock Terkini</th>
    <th width="15%">Lokasi</th>
</tr></thead><tbody>
<?php
        if(isset($_POST['button'])){
            $tcari=$_POST['tcari'];            
            $us = mysql_query("SELECT * FROM aset_brg JOIN ms_brg ON aset_brg.kode_brg = ms_brg.kode_brg WHERE no_aset LIKE '%$tcari%'");
        }else{
            $us = mysql_query("SELECT * FROM aset_brg JOIN ms_brg ON aset_brg.kode_brg = ms_brg.kode_brg order by no_aset");
        }
		while($data=mysql_fetch_array($us))
		{
			$no++;
		?>
		
   <tr>
		<td><center><b><?php echo $no ; ?></b></center></td>
            <td><center><?php echo $data['no_aset'] ?></center></td>
            <td><center><?php echo $data['nama_brg'] ?></center></td>
			<td><center><?php echo $data['satuan'] ?></center></td>
			<td><center><?php echo $data['stock_min'] ?></center></td>
			<td><center><?php echo $data['stock'] ?></center></td>
			<td><center><?php echo $data['lokasi'] ?></center></td></tr></tbody><?php } ?>
			
<table width="100%" class="table" align="center"><tr>
<div style="text-align:center;padding:20px;">		
	<td><input class="noPrint" type="button" value="Cetak Halaman" onclick='window.print();' >
	<input class="noPrint" type="button" value="Tutup" onclick='window.close();' >
		</div></td></tr></table>