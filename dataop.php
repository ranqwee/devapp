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
<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-info	">
                        <div class="panel-heading" align="center">
                             <h3>DETAIL PERMINTAAN | No OP - <?php echo $id ; ?></h3>
                        </div>
						
						<div class="panel-body">
						<div class="panel-group" id="accordion">
						
<div class="panel-body">
<div class="panel panel-info">
 <div class="panel-heading">
 <h2 class="panel-title">
<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" class="collapsed">Tambah Order Pemesanan</a></h2></div>
	<div id="collapseOne" class="panel-collapse collapse" style="height: 0px;">
	<form action="index.php?halaman=saveop" method="POST">
	<table width='100%' align='center'>
    <tr>
		<td><br><label>No OP</label>
	   <input type='text' name='nop' value="<?php echo $id ; ?>" class="form-control" readonly><br>
	   <label>Tanggal Pemesanan</label>
	   <input type='date' name='tggl_order' class="form-control" value="<?php echo $tgl_op ; ?>" readonly><br>
		<label>Nama Barang</label>
        <select name="kode_brg" class="form-control" required>
            <option value=""></option>
			        <?php
                    include 'connect.php';
                    $sqlopt = "SELECT kode_brg,nama_brg FROM ms_brg order by nama_brg asc";
                    $queryopt = mysql_query($sqlopt);
                    while($result=mysql_fetch_array($queryopt))
					{
                        if($result['kode_brg'] == $row['nama_brg']) {
                        echo "<option value='$result[kode_brg]' selected='selected'>$result[nama_brg]</option>";
                        }else{
                        echo "<option value='$result[kode_brg]'>$result[nama_brg]</option>";
                        }
                    }	
                    ?>  
        </select><br>
		<label>QTY</label>
        <input type="text" name="qty" class="form-control" required></td><td>
		<label>Waktu Kirim</label>
        <input type="text" name="waktu_kirim" class="form-control" required><br>
		<label>Keterangan Order</label>
        <textarea input rows="6" type="text" name="ktrgn_order" class="form-control" required></textarea><br>
		</table><br><br>
	<tr></tr><button type="reset" class="btn btn-warning">Bersihkan<br><a></a>
    <tr></tr><button type="submit" class="btn btn-primary" name="save"><i class="fa fa-check"></i>Simpan</button><br>
</form></br></div></div><br><br>
	
<tr><a href="index.php?halaman=datanop" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Kembali</a></tr>
<tr><a href="javascript:void(0);" plain="true" onclick="window.open('cetak-op.php?id=<?php echo $id; ?>&tgl_op=<?php echo $tgl_op ; ?>',
'Purchashing Order','size=800,height=800,scrollbars=yes,resizeable=no')" class="btn btn-warning	"><i class="fa fa-rocket"></i> Cetak OP</a></tr>
</br></br>

                            <div class="table-responsive">
</br>
                            <div class="table-responsive">
<table class="table table-hover" id="dataTables-example">
    <thead>
        <tr bgcolor="#ADE8E6">
			<th>No</th>		
            <th>Kode Barang</th>
			<th>Nama Barang</th>
            <th>Keterangan Order</th>
			<th>Waktu Kirim</th>
			<th>QTY</th>
			<th>Mata Uang</th>
			<th>Harga Barang</th>
            <th>Jumlah</th>
			 <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
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
        <tr align="center">
			<td><b><?php echo $no ; ?></b></td>
            <td><?php echo $data['kode_brg'] ?></td>
            <td><?php echo $data['nama_brg'] ?></td>
			<td><?php echo $data['ktrgn_order'] ?></td>
			<td><?php echo $data['waktu_kirim'] ?></td>
			<td><?php echo $data['qty'] ?></td>
			<td><?php echo $data['mata_uang'] ?></td>
			<td><?php echo $data['harga_brg'] ?></td>
			<td><?php echo $jumlah ; ?></td>
            <td>
               <a href="index.php?halaman=ubahdataop&no_order=<?php echo $data['no_order']; ?>" class="btn btn-default"><i class="fa fa-edit"></i> Ubah</a>
               <a href="index.php?halaman=hapusop&no_order=<?php echo $data['no_order']; ?>" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
            </td>
        </tr>
        <?php
    }
    ?>
	<tr>
        <td colspan='8' align='center'>Total</td>
        <td colspan='1' align='center'><?php echo $total ?></td></tr>
    </tbody>
</table>
</form>     
</div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>

     <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
         <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>