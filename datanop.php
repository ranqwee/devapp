<?php
include('connect.php');
$no=0;
?>
<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-info">
                        <div class="panel-heading" align="center">
                             <h3>ORDER PEMESANAN</h3>
                        </div>
                        <div class="panel-body">
						<a href="index.php?halaman=tambahnop" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Pemesanan</a>
                        </br></br>
<tr> 
<form name="form1" method="post" action="">
<input type="text" name="tcari" placeholder="ID OP / Tanggal"></tr>
    <input type="submit" name="button" id="button" value="CARI" class="btn btn-info">
                            <div class="table-responsive">
</br>
<table class="table table-hover" id="dataTables-example">
    <thead>
        <tr bgcolor="#ADE8E6">
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
			$tcari=$_POST['tcari'];
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
												else if($data['status'] == "Ditolak") {echo "<td align='center' bgcolor='#FFCC33'><strong>Ditolak</strong></td>";} ?>
            <td>
                <a href="index.php?halaman=dataop&id=<?php echo $data['nop'] ;?>&tgl_op=<?php echo $data['tgl_op']; ?>" class="btn btn-success	"><i class="fa fa-bell-o"></i> Detail</a>
                <a href="index.php?halaman=hapusnop&nop=<?php echo $data['nop']; ?>" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
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