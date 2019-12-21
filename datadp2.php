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
                             <h2>Detail Permintaan | No DP - <?php echo $id ; ?></h2>
                        </div>
						<div class="panel-body">
						<div class="panel-group" id="accordion">
<div class="panel-body">
<br><a href="index.php?halaman=datandp" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Kembali</a><br>
</br></br>
<form name="form1" method="post" action="">
    <input type="text" name="tcari" id="tcari" placeholder="Nomor DP ">
    <input type="submit" name="button" id="button" value="cari" class="btn btn-info">
                            <div class="table-responsive">
</br>
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
        <tr>
			<th>No</th>
			<th>Kode Barang</th>
            <th>Nama Barang</th>
			<th>qty</th>
			<th>Mata Uang</th>
			<th>Harga Satuan</th>
			 <th>aksi</th>
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
            $us = mysql_query("SELECT * FROM daftar_permintaan JOIN dp ON daftar_permintaan.ndp = dp.ndp JOIN ms_brg ON daftar_permintaan.kode_brg = ms_brg.kode_brg WHERE no_dp LIKE '%".$_POST['tcari']. "'");
        }else{
            $us = mysql_query("SELECT * FROM daftar_permintaan JOIN dp ON daftar_permintaan.ndp = dp.ndp JOIN ms_brg ON daftar_permintaan.kode_brg = ms_brg.kode_brg $conditions");
        }
        while($data=mysql_fetch_array($us))
        {
		$no++;
        ?>
        <tr>
			<td><b><?php echo $no ; ?></b></td>
            <td><?php echo $data['kode_brg'] ?></td>
            <td><?php echo $data['nama_brg'] ?></td>
			<td><?php echo $data['qty'] ?></td>
			<td><?php echo $data['mata_uang'] ?></td>
			<td><?php echo $data['harga_brg'] ?></td>
            <td>
                <a href="index.php?halaman=ubahdp&no_dp=<?php echo $data['no_dp']; ?>" class="btn btn-info"><i class="fa fa-edit"></i>ubah</a>
                <a href="index.php?halaman=hapusdp&no_dp=<?php echo $data['no_dp']; ?>" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" class="btn btn-danger"><i class="fa fa-remove"></i>hapus</a>
            </td>
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