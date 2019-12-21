<?php
include('connect.php');
$no=0;
?>
<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-info">
                        <div class="panel-heading" align="center">
                             <h3>DATA BARANG</h3>
                        </div>
                        <div class="panel-body">
                        <a href="index.php?halaman=tambahbrg" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Barang</a>
                        </br></br>
<form name="form1" method="post" action="">
    <input type="text" name="tcari" id="tcari" placeholder="nama barang">
    <input type="submit" name="button" id="button" value="cari" class="btn btn-info"><br><br>
                            <div class="table-responsive">
<table class="table table-hover" id="dataTables-example">
    <thead>
        <tr bgcolor="#ADE8E6">
			<th>No</th>
            <th>Kode Barang</th>
			<th>Nama Barang</th>
            <th>Mata Uang</th>
			<th>Harga Barang</th>
			<th>Keterangan</th>
			<th>aksi</th>
			
        </tr>
    </tread>
    <tbody>
        <?php
        if(isset($_POST['button'])){
            $tcari=$_POST['tcari'];            
            $us = mysql_query("SELECT * FROM ms_brg WHERE nama_brg LIKE '%$tcari%'");
        }else{
            $us = mysql_query("SELECT * FROM ms_brg");
        }
		while($data=mysql_fetch_array($us))
        {
			$no++;
        ?>
        <tr align="center">
			<td><b><?php echo $no; ?></b></td>
            <td><?php echo $data['kode_brg'] ?></td>
			<td><?php echo $data['nama_brg'] ?></td>
            <td><?php echo $data['mata_uang'] ?></td>
			<td><?php echo $data['harga_brg'] ?></td>
			<td><?php echo $data['ktrg_brg'] ?></td>
            <td>
                <a href="index.php?halaman=ubahdatabrg&kode_brg=<?php echo $data['kode_brg']; ?>" class="btn btn-default"><i class="fa fa-edit"></i> Ubah</a>
                <a href="index.php?halaman=hapusbrg&kode_brg=<?php echo $data['kode_brg']; ?>" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
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