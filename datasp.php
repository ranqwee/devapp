
<?php
include('connect.php');
$no = 0;
?>
<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-info">
                        <div class="panel-heading" align="center">
                             <h3>SURAT PENGANTAR</h3>
                        </div>
						<div class="panel-body">
						
<br><a href="index.php?halaman=datasp" class="btn btn-danger"><i class="fa fa-arrow-left"></i> Kembali</a><br>

                <div class="table-responsive">
</br>
                            <div class="table-responsive">
</br>
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
        <tr bgcolor="#f2f2f2">
			<th>No</th>
			<th>Tanggal</th>
			<th>No Sp</th>
			<th>No DP</th>
			<th>Kepada</th>
            <th>Keterangan</th>
			<th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php

        if(isset($_POST['button'])){
            $tcari=$_POST['tcari'];
            $us = mysql_query("SELECT * FROM srt_pgntr WHERE no_sp LIKE '%$tcari%'");
        }else{
            $us = mysql_query("SELECT * FROM srt_pgntr JOIN dp ON srt_pgntr.ndp = dp.ndp order by no_sp");
		}
        while($data=mysql_fetch_array($us))
        {
		$no++;
        ?>
        <tr>
			<td><b><?php echo $no ; ?></b></td>
			<td><?php echo $data['tggl_sp'] ?></td>
			<td><?php echo $data['no_sp'] ?></td>
			<td><?php echo $data['ndp'] ?></td>
            <td><?php echo $data['kpd_sp'] ?></td>
			<td><?php echo $data['ket'] ?></td>
				<td><a href="cetak-sp.php?no_sp=<?php echo $no_sp ; ?>" class="btn btn-warning"><i class="fa fa-rocket"></i> Cetak</a></td>
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