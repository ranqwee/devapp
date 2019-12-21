<?php
include('connect.php');
?>
<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             <h2>Data Hasil Pemeliharaan</h2>
                        </div>
                        <div class="panel-body">
                        <a href="index.php?halaman=tambahpemeliharaan" class="btn btn-primary"><i class="fa fa-plus"></i> tambah</a>
                        </br></br>
<form name="form1" method="post" action="">
    <input type="text" name="tcari" id="tcari" placeholder="ID Job Order">
    <input type="submit" name="button" id="button" value="cari" class="btn btn-info">
                            <div class="table-responsive">
</br>
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
        <tr>
		<th>ID Pemeliharaan</th>
			<th>ID Job Order</th>
            <th>Tanggal</th>
			<th>Mesin</th>
			<th>Shop</th>
			<th>Personil</th>
			<th>Shift</th>
			<th>Job Description</th>
			<th>Penyebab</th>
			<th>Total Loss</th>
			<th>Material</th>
			<th>Job Type</th>
			<th>Job Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if(isset($_POST['button'])){
            $us = mysql_query("SELECT * FROM pemeliharaan JOIN ms_mesin on pemeliharaan.id_mesin = ms_mesin.id_mesin JOIN ms_shop on pemeliharaan.id_shop = ms_shop.id_shop
			JOIN ms_personil on pemeliharaan.id_personil = ms_personil.id_personil WHERE id_joborder LIKE '%".$_POST['tcari']."'");
        }else{
            $us = mysql_query("SELECT * FROM pemeliharaan JOIN ms_mesin on pemeliharaan.id_mesin = ms_mesin.id_mesin JOIN ms_shop on pemeliharaan.id_shop = ms_shop.id_shop
			JOIN ms_personil on pemeliharaan.id_personil = ms_personil.id_personil order by id_pemeliharaan asc");
        }
        while($data=mysql_fetch_array($us))
        {
        ?>
        <tr>
			<td><?php echo $data['id_pemeliharaan'] ?></td>
			<td><?php echo $data['id_joborder'] ?></td>
            <td><?php echo $data['tgl'] ?></td>
			<td><?php echo $data['nama_mesin'] ?></td>
			<td><?php echo $data['nama_shop'] ?></td>
			<td><?php echo $data['nama_personil'] ?></td>
			<td><?php echo $data['shift'] ?></td>
			<td><?php echo $data['job'] ?></td>
			<td><?php echo $data['penyebab'] ?></td>
			<td><?php echo $data['loss'] ?></td>
			<td><?php echo $data['material'] ?></td>
			<td><?php echo $data['job_type'] ?></td>
			<?php if($data['job_status'] == "Open") {echo "<td align='center' bgcolor='#66ff66'><strong>Open</strong></td>";} 
												else if($data['job_status'] == "Close") {echo "<td align='center' bgcolor='#33CCFF'><strong>Close</strong></td>";} 
												else if($data['job_status'] == "Waiting Part") {echo "<td align='center' bgcolor='#FFCC33'><strong>Waiting Part</strong></td>";} 
												else if($data['job_status'] == "Cancel") {echo "<td align='center' bgcolor='#b3c6d7'><strong>Cancel</strong></td>";} ?>
            <td>
                <a href="index.php?halaman=ubahdatapel&id_pemeliharaan=<?php echo $data['id_pemeliharaan']; ?>" class="btn btn-info"><i class="fa fa-edit"></i>ubah</a>
                <a href="index.php?halaman=hapuspemeliharaan&id_pemeliharaan=<?php echo $data['id_pemeliharaan']; ?>" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" class="btn btn-danger"><i class="fa fa-remove"></i>hapus</a>
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