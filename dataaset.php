<?php
include('connect.php');
$no=0;
?>
<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-info">
                        <div class="panel-heading" align="center">
                             <h3>DATA ASET</h3>
                        </div>
                        <div class="panel-body">
                        <a href="index.php?halaman=tambahdataaset" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Aset</a>
                        </br></br>
<form name="form1" method="post" action="">
    <input type="text" name="tcari" id="tcari" placeholder="No Aset">
    <input type="submit" name="button" id="button" value="Cari" class="btn btn-primary"><br><br>
                            <div class="table-responsive">
<table class="table table-hover" id="dataTables-example">
    <thead>
        <tr bgcolor="#ADE8E6">
			<th>No</th>
            <th>Nomor Aset</th>
			<th>Kode Barang</th>
			<th>Nama Barang</th>
			<th>Satuan</th>
			<th>Stock Minimal</th>
			<th>Stock Terkini</th>
			<th>Lokasi</th>
			<th width= "20%">Aksi</th>
        </tr>
    </tr>
	</tread>
	<body>
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
		<tr align="center">
			<td><b><?php echo $no ; ?></b></td>
			<td><?php echo $data['no_aset']; ?></td>
			<td><?php echo $data['kode_brg']; ?></td>
			<td><?php echo $data['nama_brg']; ?></td>
			<td><?php echo $data['satuan']; ?></td>
			<td><?php echo $data['stock_min']; ?></td>
			<td><?php echo $data['stock']; ?></td>
			<td><?php echo $data['lokasi']; ?></td>
			<td>
				<a href="index.php?halaman=ubahdataaset&no_aset=<?php echo $data['no_aset']; ?>" class="btn btn-default"><i class="fa fa-edit"></i> Ubah</a>
				<a href="index.php?halaman=hapusaset&no_aset=<?php echo $data['no_aset']; ?>" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
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
    
