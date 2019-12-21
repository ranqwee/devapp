<?php
include('connect.php');
$no=0;
?>
<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             <h2>Daftar Permintaan </h2>
                        </div>
                        <div class="panel-body">
						
                        </br></br>
<form name="form1" method="post" action="">
    <input type="text" name="tcari" id="tcari" placeholder="No OP / Tanggal">
    <input type="submit" name="button" id="button" value="cari" class="btn btn-info">
                            <div class="table-responsive">
</br>
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
        <tr bgcolor="#f2f2f2">
			<th>No</th>
            <th>No OP</th>
            <th>Tanggal</th>
			<th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if(isset($_POST['button'])){
            $us = mysql_query("SELECT * FROM op WHERE nop LIKE '%".$_POST['tcari']."' or tgl_op LIKE '%".$_POST['tcari']."'");
        }else{
            $us = mysql_query("SELECT * FROM op order by nop asc");
        }
        while($data=mysql_fetch_array($us))
        {
			$no++;
        ?>
        <tr>
			<td><b><?php echo $no ; ?></b></td>
            <td><?php echo $data['nop'] ?></td>
            <td><?php echo $data['tgl_op'] ?></td>
			<?php if($data['status'] == "Disetujui") {echo "<td align='center' bgcolor='#66ff66'><strong>Disetujui</strong></td>";}
												else if($data['status'] == "Menunggu Persetujuan") {echo "<td align='center' bgcolor='#b3c6d7'><strong>Menunggu Persetujuan</strong></td>";} 
												else if($data['status'] == "Ditolak") {echo "<td align='center' bgcolor='#FFCC33'><strong>Ditolak</strong></td>";}?>
            <td>
                <a href="index.php?halaman=dataopfi&id=<?php echo $data['nop'] ;?>" class="btn btn-success	"><i class="fa fa-pencil"></i> Detail</a>
				 <a href="index.php?halaman=ubahdatanop&nop=<?php echo $data['nop'] ;?>" class="btn btn-info	"><i class="fa fa-edit"></i> Ubah</a>
            </td>
        </tr>
        <?php
    }
    ?>
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