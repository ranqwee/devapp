
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
                             <h2>Detail Pengantar | No SP - <?php echo $id ; ?></h2>
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
	<form action="index.php?halaman=savesp" method="POST">
    <table width='100%' align='center'>
    <tr>
		<label>No SP</label>
	   <input type='text' name='nsp' value="<?php echo $id ; ?>" class="form-control" readonly><br>
	   <label>Keterangan</label>
	   <input type='text' name='keterangan' value="<?php echo $id ; ?>" class="form-control"><br>
	   <label>Penerima</label>
	   <input type='text' name='penerima' value="<?php echo $id ; ?>" class="form-control"><br>
	   <label>Pengirim</label>
	   <input type='text' name='pengirim' value="<?php echo $id ; ?>" class="form-control"><br>
			        
                    }	
                    ?  
        </select><br>
		<label>QTY</label>
        <input type="text" name="qty" class="form-control" required></table><br><br>
	<tr></tr><button type="reset" class="btn btn-warning"></i>Bersihkan</a>
    <tr></tr><button type="submit" class="btn btn-primary" name="save"><i class="fa fa-check"></i>Simpan</button>
</form></tr></div></div></div><br>
	
<br><a href="index.php?halaman=datandpuser" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Kembali</a><br>

                <div class="table-responsive">
</br>
                            <div class="table-responsive">
</br>
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
        <tr bgcolor="#f2f2f2">
			<th>No</th>
			<th>No Sp</th>
            <th>Keteranagan</th>
			<th>Penerima</th>
			<th>Pengirim</th>
        </tr>
    </thead>
    <tbody>
        <?php
		$conditions="";
		if(ISSET($_GET['id']))
{
	$conditions = " and sp.nsp='".$_GET['id']."'";
}
if(ISSET($_POST['hddID']))
{
	$conditions = "  and sp.nsp='".$_POST['hddID']."'";
}
if(ISSET($_GET['data']))
{
	$conditions = "  and sp.nsp='".$_GET['id']."' AND (nama_brg LIKE '%".$_GET['data']."%')";
}
        if(isset($_POST['button'])){
            $tcari=$_POST['tcari'];
            $us = mysql_query("SELECT * FROM srt_pgntr JOIN dp ON srt_pgntr.nsp = sp.nsp JOIN aset_brg ON srt_pgntr.no_aset = aset_brg.no_aset JOIN ms_brg ON aset_brg.kode_brg = ms_brg.kode_brg WHERE no_dp LIKE '%".$_POST['tcari']. "'");
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