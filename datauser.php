<?php
include('connect.php');
$no=0;
?>
<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-info">
                        <div class="panel-heading" align="center">
                             <h3>DATA USER</h3>
                        </div>
                        <div class="panel-body">
                        <a href="index.php?halaman=tambahformuser" class="btn btn-success"><i class="fa fa-plus"></i> Tambah User</a>
                        </br></br>
<form name="form1" method="post" action="">
    <input type="text" name="tcari" id="tcari" placeholder="username">
    <input type="submit" name="button" id="button" value="Cari" class="btn btn-primary"></br></br>
                        	<div class="table-responsive">
<table class="table table-hover" id="dataTables-example">
	<thead>
		<tr bgcolor="#ADE8E6">
			<th>No</th>
			<th>Username</th>
			<th>Password</th>
			<th>Departemen</th>
			<th>Hak Akses</th>
			<th width= "20%">Aksi</th>
		</tr>
	</tread>
	<tbody>
		<?php
        if(isset($_POST['button'])){
            $tcari=$_POST['tcari'];            
            $us = mysql_query("SELECT * FROM user_login WHERE username LIKE '%$tcari%'");
        }else{
            $us = mysql_query("SELECT * FROM user_login");
        }
		while($data=mysql_fetch_array($us))
		{
			$no++;
		?>
		<tr align="center">
			<td><b><?php echo $no; ?></b></td>
			<td><?php echo $data['username']; ?></td>
			<td><?php echo $data['password']; ?></td>
			<td><?php echo $data['departemen']; ?></td>
			<td><?php echo $data['hak_akses']; ?></td>
			<td>
				<a href="index.php?halaman=ubahformuser&id_user=<?php echo $data['id_user']; ?>" class="btn btn-default"><i class="fa fa-edit"></i> Ubah</a>
				<a href="index.php?halaman=hapususer&id_user=<?php echo $data['id_user']; ?>" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
			</td>
		</tr>
		<?php } ?>
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
    
