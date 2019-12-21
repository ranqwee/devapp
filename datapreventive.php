<?php
include('connect.php');
?>
<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             <h2>Data Jadwal Preventive</h2>
                        </div>
						<div class="panel-body">
                        <a href="index.php?halaman=tambahpreventive" class="btn btn-primary"><i class="fa fa-plus"></i> tambah</a>
                        </br></br>
<form name="form1" method="post" action="">
    <input type="text" name="tcari" id="tcari" placeholder="Jenis Job">
    <input type="submit" name="button" id="button" value="cari" class="btn btn-info">
                            <div class="table-responsive">
</br>
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
        <tr>
            <th>ID Preventif</th>
			<th>Jenis Job</th>
            <th>Shop</th>
			<th>Jam Operasi</th>
			<th>Periode</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if(isset($_POST['button'])){
            $us = mysql_query("SELECT * FROM preventive JOIN ms_shop on preventive.id_shop = ms_shop.id_shop WHERE jenis_job LIKE '%".$_POST['tcari']."'");
        }else{
            $us = mysql_query("SELECT * FROM preventive JOIN ms_shop on preventive.id_shop = ms_shop.id_shop  order by id_preventive asc");
        }
        while($data=mysql_fetch_array($us))
        {
        ?>
        <tr>
            <td><?php echo $data['id_preventive'] ?></td>
			<td><?php echo $data['jenis_job'] ?></td>
            <td><?php echo $data['nama_shop'] ?></td>
			<td><?php echo $data['jam_kerja'] ?></td>
			<td><?php echo $data['periode'] ?></td>
            <td>
				<a href="index.php?halaman=ubahdatapreventive&id_preventive=<?php echo $data['id_preventive']; ?>" class="btn btn-info"><i class="fa fa-edit"></i>ubah</a>
                <a href="index.php?halaman=hapuspreventive&id_preventive=<?php echo $data['id_preventive']; ?>" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" class="btn btn-danger"><i class="fa fa-remove"></i>hapus</a>
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