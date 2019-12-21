<?php
include('connect.php');
?>
<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             <h2>Job Order</h2>
                        </div>
                        <br><br>
<form name="form1" method="post" action="">
    <input type="text" name="tcari" id="tcari" placeholder="ID Pemeliharaan">
    <input type="submit" name="button" id="button" value="cari" class="btn btn-info">
                            <div class="table-responsive">
</br>
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
        <tr>
            <th>ID Pemeliharaan</th>
            <th>Tanggal</th>
			<th>Personil</th>
			<th>Shift</th>
			<th>Jam</th>
			<th>Job Desc</th>
			<th>Material</th>
			<th>Mesin</th>
			<th>Shop</th>
			<th>Tipe Pekerjaan</th>
			<th>Status Pekerjaan</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if(isset($_POST['button'])){
            $us = mysql_query("SELECT * FROM pemeliharaan JOIN ms_mesin on pemeliharaan.id_mesin = ms_mesin.id_mesin JOIN ms_shop on pemeliharaan.id_shop = ms_shop.id_shop
			JOIN ms_personil on pemeliharaan.id_personil = ms_personil.id_personil WHERE id_pemeliharaan LIKE '%".$_POST['tcari']."'");
        }else{
            $us = mysql_query("SELECT * FROM pemeliharaan JOIN ms_mesin on pemeliharaan.id_mesin = ms_mesin.id_mesin JOIN ms_shop on pemeliharaan.id_shop = ms_shop.id_shop
			JOIN ms_personil on pemeliharaan.id_personil = ms_personil.id_personil order by id_pemeliharaan asc");
        }
        while($data=mysql_fetch_array($us))
        {
        ?>
        <tr>
            <td><?php echo $data['id_pemeliharaan'] ?></td>
            <td><?php echo $data['tgl'] ?></td>
			<td><?php echo $data['nama_personil'] ?></td>
			<td><?php echo $data['shift'] ?></td>
			<td><?php echo $data['jam'] ?></td>
			<td><?php echo $data['job'] ?></td>
			<td><?php echo $data['material'] ?></td>
			<td><?php echo $data['nama_mesin'] ?></td>
			<td><?php echo $data['nama_shop'] ?></td>
			<td><?php echo $data['job_type'] ?></td>
			<td><?php echo $data['job_status'] ?></td>
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