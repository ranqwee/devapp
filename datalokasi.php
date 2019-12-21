<?php
include('connect.php');
?>
<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             <h2>Data Asal Masalah Komponen</h2>
                        </div>
                        <div class="panel-body">
                        <a href="index.php?halaman=tambahformlokasi" class="btn btn-primary"><i class="fa fa-plus"></i> tambah</a>
                        </br></br>
<form name="form1" method="post" action="">
    <input type="text" name="tcari" id="tcari" placeholder="Lokasi Asal Masalah">
    <input type="submit" name="button" id="button" value="cari" class="btn btn-info">
                            <div class="table-responsive">
</br>
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
        <tr>
            <th>Kode Asal Masalah</th>
            <th>Nama Lokasi Masalah</th>
            <th>Aksi</th>
        </tr>
    </tread>
    <tbody>
        <?php
        if(isset($_POST['button'])){
            $tcari=$_POST['tcari'];
            $us = mysql_query("SELECT * FROM mst_asal_masalah_komponen WHERE nama_lokasiasalmasalah LIKE '%$tcari%'");
        }else{
            $us = mysql_query("SELECT * FROM mst_asal_masalah_komponen order by nama_lokasiasalmasalah ASC ");
        }
        while($data=mysql_fetch_array($us))
        {
        ?>
        <tr>
            <td><?php echo $data['kd_asalmasalah'] ?></td>
            <td><?php echo $data['nama_lokasiasalmasalah'] ?></td>
            <td>
                <a href="index.php?halaman=ubahformlokasi&kd_asalmasalah=<?php echo $data['kd_asalmasalah']; ?>" class="btn btn-info"><i class="fa fa-edit"></i>ubah</a>
                <a href="index.php?halaman=hapuslokasi&kd_asalmasalah=<?php echo $data['kd_asalmasalah']; ?>" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" class="btn btn-danger"><i class="fa fa-remove"></i>hapus</a>
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