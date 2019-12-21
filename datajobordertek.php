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
                        <div class="panel-body">
                        
<form name="form1" method="post" action="">
    <input type="text" name="tcari" id="tcari" placeholder="Nama Personil / ID">
    <input type="submit" name="button" id="button" value="cari" class="btn btn-info">
                            <div class="table-responsive">
</br>
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
        <tr>
            <th>ID Job Order</th>
            <th>Tanggal dan Jam Pelaksanaan</th>
			<th>Personil</th>
			<th>Shift</th>
			<th>Job Description</th>
			<th>Material</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if(isset($_POST['button'])){
            $tcari=$_POST['tcari'];
            $us = mysql_query("SELECT * FROM job_order JOIN ms_personil on job_order.id_personil = ms_personil.id_personil WHERE nama_personil or id_joborder LIKE '%".$_POST['tcari']. "'");
        }else{
   
            $us = mysql_query("SELECT * FROM job_order JOIN ms_personil on job_order.id_personil = ms_personil.id_personil order by id_joborder asc");
        }
        while($data=mysql_fetch_array($us))
        {
        ?>
        <tr>
            <td><?php echo $data['id_joborder'] ?></td>
            <td><?php echo $data['jam'] ?></td>
			<td><?php echo $data['nama_personil'] ?></td>
			<td><?php echo $data['shift'] ?></td>
			<td><?php echo $data['job'] ?></td>
			<td><?php echo $data['material'] ?></td>
            
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