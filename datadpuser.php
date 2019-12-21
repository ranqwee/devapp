
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
                             <h3>Detail Permintaan | No DP - <?php echo $id ; ?></h3>
                        </div>
						<div class="panel-body">
						<div class="panel-group" id="accordion">
<div class="panel-body">
<div class="panel panel-info">
 <div class="panel-heading">
 <h2 class="panel-title">
<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" class="collapsed">Tambah Detail Permintaan</a></h2></div>
	<div id="collapseOne" class="panel-collapse collapse" style="height: 0px;">
    <div class="panel-body">
	<form action="index.php?halaman=savedp" method="POST">
    <table width='100%' align='center'>
    <tr>
		<label>No DP</label>
	   <input type='text' name='ndp' value="<?php echo $id ; ?>" class="form-control" readonly><br>
	   <label>Nama Barang</label>
        <select name="no_aset" class="form-control" required>
            <option value=""></option>
			        <?php
                    include 'connect.php';
                    $sqlopt = "SELECT * FROM aset_brg JOIN ms_brg ON aset_brg.kode_brg = ms_brg.kode_brg order by nama_brg asc";
                    $queryopt = mysql_query($sqlopt);
                    while($result=mysql_fetch_array($queryopt))
					{
                        if($result['no_aset'] == $row['nama_brg']) {
                        echo "<option value='$result[no_aset]' selected='selected'>$result[nama_brg]</option>";
                        }else{
                        echo "<option value='$result[no_aset]'>$result[nama_brg]</option>";
                        }
                    }	
                    ?>  
        </select><br>
		<label>QTY</label>
        <input type="text" name="qty" class="form-control" required></table><br><br>
	<tr><button type="reset" class="btn btn-warning"></i>Bersihkan</a></tr>
    <tr><button type="submit" class="btn btn-primary" name="save"><i class="fa fa-check"></i>Simpan</button></tr>
</form></tr></div></div></div><br>
	
<br><a href="index.php?halaman=datandpuser" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Kembali</a><br>

                <div class="table-responsive">
</br>
                            <div class="table-responsive">
</br>
<table class="table table-hover" id="dataTables-example" align="center">
    <thead>
        <tr bgcolor="#ADE8E6" align="center">
			<th>No</th>
			<th>No Aset</th>
            <th>Nama Barang</th>
			<th>QTY</th>
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
        <tr>
			<td><b><?php echo $no ; ?></b></td>
            <td><?php echo $data['no_aset'] ?></td>
            <td><?php echo $data['nama_brg'] ?></td>
			<td><?php echo $data['qty'] ?></td>
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