<?php
include('connect.php');
?>
<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             <h2>Shop</h2>
                        </div>
                        <div class="panel-body">
                        <a href="index.php?halaman=tambahshop" class="btn btn-primary"><i class="fa fa-plus"></i> tambah</a>
                        </br></br>
<form name="form1" method="post" action="">
    <input type="text" name="tcari" id="tcari" placeholder="shop">
    <input type="submit" name="button" id="button" value="cari" class="btn btn-info">
                            <div class="table-responsive">
</br>
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
        <tr>
            <th>Shop</th>
            <th>Aksi</th>
        </tr>
    </tread>
    <tbody>
        <?php
        if(isset($_POST['button'])){
            $tcari=$_POST['tcari'];
            $us = mysql_query("SELECT * FROM ms_shop WHERE nama_shop LIKE '%$tcari%'");
        }else{
            $us = mysql_query("SELECT * FROM ms_shop");
        }
        while($data=mysql_fetch_array($us))
        {
        ?>
        <tr>
            <td><?php echo $data['nama_shop'] ?></td>
            <td>
                <a href="index.php?halaman=ubahdatashop&id_shop=<?php echo $data['id_shop']; ?>" class="btn btn-info"><i class="fa fa-edit"></i>ubah</a>
                <a href="index.php?halaman=hapusshop&id_shop=<?php echo $data['id_shop']; ?>" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" class="btn btn-danger"><i class="fa fa-remove"></i>hapus</a>
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