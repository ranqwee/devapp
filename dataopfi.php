<?php
include('connect.php');
$id='';
$searching="";
if(ISSET($_GET['id']))
{
	$id=$_GET['id'];
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
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             <h2>Detail Permintaan | No OP - <?php echo $id ; ?></h2>
                        </div>
						
						<div class="panel-body">
						<div class="panel-group" id="accordion">
						</br></br>

                            <div class="table-responsive">
</br>

<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
        <tr>
            <th>No Order</th>
			<th>Tanggal Order</th>			
            <th>Kode Barang</th>
			<th>Nama Barang</th>
            <th>Keterangan Order</th>
			<th>Waktu Kirim</th>
			<th>QTY</th>
			<th>Mata Uang</th>
			<th>Harga Barang</th>
            <th>Jumlah</th>
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
            $us = mysql_query("SELECT * FROM order_pemesanan JOIN op ON order_pemesanan.nop = op.nop JOIN ms_brg ON order_pemesanan.kode_brg = ms_brg.kode_brg WHERE no_order LIKE '%".$_POST['tcari']. "'");
        }else{
   
            $us = mysql_query("SELECT * FROM order_pemesanan JOIN op ON order_pemesanan.nop = op.nop JOIN ms_brg ON order_pemesanan.kode_brg = ms_brg.kode_brg $conditions");
        }
        while($data=mysql_fetch_array($us))
        {
        ?>
        <tr>
			<td><?php echo $data['no_order'] ?></td>
			<td><?php echo $data['tggl_order'] ?></td>
            <td><?php echo $data['kode_brg'] ?></td>
            <td><?php echo $data['nama_brg'] ?></td>
			<td><?php echo $data['ktrgn_order'] ?></td>
			<td><?php echo $data['waktu_kirim'] ?></td>
			<td><?php echo $data['qty'] ?></td>
			<td><?php echo $data['mata_uang'] ?></td>
			<td><?php echo $data['harga_brg'] ?></td>
			<td><?php echo $data['jml_order'] ?></td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>

<br><a href="index.php?halaman=datanopfi" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Kembali</a><br>
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