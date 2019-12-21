<?php
include('connect.php');
$no=0;
?>
<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-info">
                        <div class="panel-heading" align="center">
                             <h3>Daftar Permintaan </h3>
                        </div>
                        <div class="panel-body">
                        <br><a href="index.php?halaman=tambahndp" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Daftar Permintaan</a>
                        </br></br>
						
						                <div class="table-responsive">
</br>
<form name="form1" method="post" action="">
    <input type="text" name="tcari" id="tcari" placeholder="Periode">
    <input type="submit" name="button" id="button" value="cari" class="btn btn-info">
                            <div class="table-responsive"><br>
<table class="table table-hover" id="dataTables-example">
    <thead>
        <tr bgcolor="#ADE8E6">
			<th>No</th>
            <th>No DP</th>
            <th>Tanggal</th>
			<th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if(isset($_POST['button'])){
            $tcari=$_POST['tcari'];
            $us = mysql_query("SELECT * FROM dp WHERE ndp LIKE '%$tcari%' or tgl LIKE '%$tcari%'");
        }else{
            $us = mysql_query("SELECT * FROM dp order by ndp asc");
        }
        while($data=mysql_fetch_array($us))
        {
			$no++;
        ?>
        <tr align="center">
			<td><b><?php echo $no ; ?></b></td>
            <td><?php echo $data['ndp'] ?></td>
            <td><?php echo $data['tgl'] ?></td>
			<?php if($data['status'] == "Diterima") {echo "<td align='center' bgcolor='#66ff66'><strong>Diterima</strong></td>";} 
												else if($data['status'] == "Dibatalkan") {echo "<td align='center' bgcolor='#33CCFF'><strong>Dibatalkan</strong></td>";} 
												else if($data['status'] == "Ditunda") {echo "<td align='center' bgcolor='#FFCC33'><strong>Ditunda</strong></td>";} 
												else if($data['status'] == "Baru Dikirimkan") {echo "<td align='center' bgcolor='#b3c6d7'><strong>Baru Dikirimkan</strong></td>";} ?>
            <td>
                <a href="index.php?halaman=datadpuser&id=<?php echo $data['ndp'] ;?>" class="btn btn-default"><i class="fa fa-bell-o"></i> Detail</a>
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