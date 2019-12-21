<?php
include('connect.php');
$no=0;
?>
<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-info" align="center">
                        <div class="panel-heading" align="center">
                             <h3> Laporan Aset</h3>
                        </div>
                        <div class="panel-body">
						<tr><a href="javascript:void(0);" plain="true" onclick="window.open('cetak-aset.php?')" class="btn btn-success"><i class="fa fa-rocket"></i> Cetak Laporan Aset</a></tr>

                            <div class="table-responsive">
</br>
<table class="table table-hover" id="dataTables-example">
    <thead>
        <tr bgcolor="#ADE8E6">	
			<th>No</th>
            <th>Nomor Aset</th>
			<th>Deskripsi Aset</th>
            <th>Satuan</th>
			<th>Stock Minimal</th>
			<th>Stock Terkini</th>
			<th>Lokasi</th>
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
			<td><?php echo $data['nama_brg']; ?></td>
			<td><?php echo $data['satuan']; ?></td>
			<td><?php echo $data['stock_min']; ?></td>
			<td><?php echo $data['stock']; ?></td>
			<td><?php echo $data['lokasi']; ?></td>
			
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
    
