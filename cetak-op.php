<?php
include('connect.php');
$jumlah=0;
$total=0;
$id='';
$tgl_op='';
$searching="";
if(ISSET($_GET['id']))
{
	$id=$_GET['id'];
}
if(ISSET($_GET['tgl_op']))
{
	$tgl_op=$_GET['tgl_op'];
}
if(ISSET($_POST['hddID']))
{
	$id=$_POST['hddID'];
	$searching = $_POST['searching'];
}
if(ISSET($_GET['data']))
{
	$id=$_GET['id'];
	$searching = $_GET['data'];
}
$no = 0;
?>
<title>Order Pemesanan</title>
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
    <td width="79%"><div align="center"><h3>Order Pemesanan</h3>
      <p>PT Astra UD Trucks</p>
    </div></td>
  </tr>
  <tr bgcolor="#B0E0E6">
    <td colspan="2">No OP : <strong><?php echo $id ; ?></strong></td>	
  </tr>  
  <tr bgcolor="#B0E0E6">
    <td colspan="2">Tanggal : <strong><?php echo $tgl_op ; ?></strong></td>	
  </tr>
</table>
<p></p>
<table width="100%" class="table" border="1" >
   <thead>
   <tr bgcolor="#87CEEB">
      <th width="3%" >No</th>
    <th width="7%">Kode Barang</th>
    <th width="15%">Nama Barang</th>
    <th width="15%">Keterangan Order</th>
    <th width="10%">Waktu Kirim</th>
    <th width="5%">QTY</th>
    <th width="5%">Mata Uang</th>
	<th width="10%">Harga Barang</th>
	<th width="10%">Jumlah</th>
</tr></thead><tbody>
<?php
		$conditions="";
		if(ISSET($_GET['id']))
{
	$conditions = " and op.nop='".$_GET['id']."'";
}
if(ISSET($_POST['hddID']))
{
	$conditions = "  and op.nop='".$_POST['hddID']."'";
}
if(ISSET($_GET['data']))
{
	$conditions = "  and op.nop='".$_GET['id']."' AND (no_order LIKE '%".$_GET['data']."%')";
}
        if(isset($_POST['button'])){
            $tcari=$_POST['tcari'];
            $us = mysql_query("SELECT * FROM order_pemesanan JOIN op ON order_pemesanan.nop = op.nop JOIN ms_brg ON order_pemesanan.kode_brg = ms_brg.kode_brg WHERE $id LIKE '%".$_POST['tcari']. "' or $tgl_op LIKE '%".$_POST['tcari']. "'");
        }else{
   
            $us = mysql_query("SELECT * FROM order_pemesanan JOIN op ON order_pemesanan.nop = op.nop JOIN ms_brg ON order_pemesanan.kode_brg = ms_brg.kode_brg $conditions");
        }
        while($data=mysql_fetch_array($us))
        {
			$jumlah=$data['qty']*$data['harga_brg'];
			$total+=$jumlah ;
			$no++;
        ?>
		
   <tr>
		<td><b><?php echo $no ; ?></b></td>
            <td><?php echo $data['kode_brg'] ?></td>
            <td><?php echo $data['nama_brg'] ?></td>
			<td><?php echo $data['ktrgn_order'] ?></td>
			<td><?php echo $data['waktu_kirim'] ?></td>
			<td><?php echo $data['qty'] ?></td>
			<td><?php echo $data['mata_uang'] ?></td>
			<td><?php echo $data['harga_brg'] ?></td>
			<td><center><?php echo $jumlah ; ?></center></td></tr></tbody>
			<tr><?php } ?>
        <td colspan='8' align='center' bgcolor="#B0E0E6">Total</td>
        <td colspan='2' align='center' bgcolor="#B0E0E6"><b><?php echo $total ?></b></td></tr>
		
<table width="100%" class="table" align="center"><tr>
<div style="text-align:center;padding:20px;">		
	<td><input class="noPrint" type="button" value="Cetak Halaman" onclick='window.print();' >
	<input class="noPrint" type="button" value="Tutup" onclick='window.close();' >
	</div></td></tr></table>