<?php
include('connect.php');
?>
<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             <h2>Data Mesin</h2>
                        </div>
                        <div class="panel-body">
                        <a href="index.php?halaman=tambahmesin" class="btn btn-primary"><i class="fa fa-plus"></i> tambah</a>
                        </br></br>
<form name="form1" method="post" action="">
    <input type="text" name="tcari" id="tcari" placeholder="Daftar Permintaan Yang ingin dicari">
    <input type="submit" name="button" id="button" value="cari" class="btn btn-info">
                            <div class="table-responsive">
</br>
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
        <tr>
            <th>Nomor Daftar Permintaan</th>
			<th>Tanggal</th>
            <th>Nama Mesin</th>
			<th>Type Mesin</th>
			<th>Merek Mesin</th>
			<th>Noseri Mesin</th>
			<th>Tahun</th>
			<th>Jumlah</th>
			<th>Shop</th>
			<th>Controller</th>
			<th>Supplier</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if(isset($_POST['button'])){
            $tcari=$_POST['tcari'];
            $us = mysql_query("SELECT * FROM ms_mesin JOIN ms_shop on ms_mesin.id_shop = ms_shop.id_shop JOIN ms_personil on ms_mesin.id_personil = ms_personil.id_personil WHERE nama_mesin LIKE '%".$_POST['tcari']."'");
        }else{
            $us = mysql_query("SELECT * FROM ms_mesin JOIN ms_shop on ms_mesin.id_shop = ms_shop.id_shop JOIN ms_personil on ms_mesin.id_personil = ms_personil.id_personil order by id_mesin asc");
        }
        while($data=mysql_fetch_array($us))
        {
        ?>
        <tr>
            <td><?php echo $data['id_mesin'] ?></td>
			<td><?php echo $data['tgl_mesin'] ?></td>
            <td><?php echo $data['nama_mesin'] ?></td>
			<td><?php echo $data['type_mesin'] ?></td>
			<td><?php echo $data['merek_mesin'] ?></td>
			<td><?php echo $data['noseri_mesin'] ?></td>
			<td><?php echo $data['tahun_mesin'] ?></td>
			<td><?php echo $data['jml_mesin'] ?></td>
			<td><?php echo $data['nama_shop'] ?></td>
			<td><?php echo $data['nama_personil'] ?></td>
			<td><?php echo $data['supp_mesin'] ?></td>
            <td>
                <a href="index.php?halaman=ubahdatamesin&id_mesin=<?php echo $data['id_mesin']; ?>" class="btn btn-info"><i class="fa fa-edit"></i>ubah</a>
                <a href="index.php?halaman=hapusmesin&id_mesin=<?php echo $data['id_mesin']; ?>" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" class="btn btn-danger"><i class="fa fa-remove"></i>hapus</a>
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