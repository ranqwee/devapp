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
                    <div class="panel panel-info">
                        <div class="panel-heading" align="center">
                             <h3>DETAIL PERMINTAAN | No DP - <?php echo $id ; ?></h3>
                        </div>
						<div class="panel-body">
						<div class="panel-group" id="accordion">
	
<a href="index.php?halaman=datandp" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Kembali</a><br>
</br>
                            <div class="table-responsive">
<table class="table table-hover" id="dataTables-example">
    <thead>
        <tr bgcolor="#ADE8E6">
			<th>No</th>
			<th>No Aset</th>
            <th>Nama Barang</th>
			<th>QTY Permintaan</th>
			<th bgcolor="#FFA500">Stock Terkini</th>
			<th bgcolor="#FF1000">Stock Minimal</th>
        </tr>
    </thead>
    <tbody>
        <?php
		$conditions="";
		if(ISSET($_GET['id']))
{
	$conditions = " and dp.ndp='".$_GET['id']."'";
}
if(ISSET($_POST['hddID']))
{
	$conditions = "  and dp.ndp='".$_POST['hddID']."'";
}
if(ISSET($_GET['data']))
{
	$conditions = "  and dp.ndp='".$_GET['id']."' AND (nama_brg LIKE '%".$_GET['data']."%')";
}
        if(isset($_POST['button'])){
            $tcari=$_POST['tcari'];
            $us = mysql_query("SELECT * FROM daftar_permintaan JOIN dp ON daftar_permintaan.ndp = dp.ndp JOIN aset_brg ON daftar_permintaan.no_aset = aset_brg.no_aset JOIN ms_brg ON aset_brg.kode_brg = ms_brg.kode_brg WHERE no_dp LIKE '%".$_POST['tcari']. "'");
        }else{
            $us = mysql_query("SELECT * FROM daftar_permintaan JOIN dp ON daftar_permintaan.ndp = dp.ndp JOIN aset_brg ON daftar_permintaan.no_aset = aset_brg.no_aset JOIN ms_brg ON aset_brg.kode_brg = ms_brg.kode_brg $conditions");
        }
        while($data=mysql_fetch_array($us))
        {
		$no++;
        ?>
        <tr align="center">
			<td><b><?php echo $no ; ?></b></td>
            <td><?php echo $data['no_aset'] ?></td>
            <td><?php echo $data['nama_brg'] ?></td>
			<td><?php echo $data['qty'] ?></td>
			<td bgcolor="#FFA500"><b><?php echo $data['stock'] ?></b></td>
			<td bgcolor="#FF1000"><b><?php echo $data['stock_min'] ?></b></td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>
</form>     
</div></div>
                            
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