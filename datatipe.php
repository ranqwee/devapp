<?php
include('connect.php');
?>
<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             <h2>Data Tipe Engine</h2>
                        </div>
                        <div class="panel-body">
                        <a href="index.php?halaman=tambahformtipe" class="btn btn-primary"><i class="fa fa-plus"></i> tambah</a>
                        </br></br>
<form name="form1" method="post" action="">
    <input type="text" name="tcari" id="tcari" placeholder="tipe engine">
    <input type="submit" name="button" id="button" value="cari" class="btn btn-info">
                            <div class="table-responsive">
</br>
<table width= "50%" class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
        <tr>
            <th>Tipe Engine</th>
            <th WIDTH = "50%">Aksi</th>
        </tr>
    </tread>
    <tbody>
        <?php
        if(isset($_POST['button'])){
            $tcari=$_POST['tcari'];            
            $us = mysql_query("SELECT * FROM mst_tipeengine WHERE tipe_engine LIKE '%$tcari%'");
        }else{
            $us = mysql_query("SELECT * FROM mst_tipeengine order by tipe_engine asc");
        }
        while($data=mysql_fetch_array($us))
        {
        ?>
        <tr>
            <td><?php echo $data['tipe_engine'] ?></td>
            <td>
                <a href="index.php?halaman=ubahformtipe&kd_tipeengine=<?php echo $data['kd_tipeengine']; ?>" class="btn btn-info"><i class="fa fa-edit"></i>ubah</a>
                <a href="index.php?halaman=hapustipe&kd_tipeengine=<?php echo $data['kd_tipeengine']; ?>" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" class="btn btn-danger"><i class="fa fa-remove"></i>hapus</a>
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