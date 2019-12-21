<?php
include('connect.php');
$no=0;
?>
<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             <h2>Daftar Surat Pengantar </h2>
                        </div>
                        <div class="panel-body">
						<a href="index.php?halaman=tambahnsp" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Pengantar</a>
                        </br></br>
<tr> 
<form name="form1" method="post" action="">
<input type="text" name="tcari" placeholder="ID SP / Tanggal"></tr>
    <input type="submit" name="button" id="button" value="CARI" class="btn btn-info">
	<!--		<button onclick="javascript:printDiv('id-elemen-yang-ingin-di-print');" class="btn btn-info">Cetak</button> -->
	<a href="javascript:void(0);" class="btn btn-info" plain="true" onclick="window.open('cetakop.php?tcari=<?php echo $_POST['tcari']; ?>
','Purchashing Order','size=800,height=800,scrollbars=yes,resizeable=no')">CETAK</a>
                            <div class="table-responsive">
</br>
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
        <tr bgcolor="#f2f2f2">
			<th>No</th>
            <th>No SP</th>
            <th>Tanggal</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if(isset($_POST['button'])){
			$tcari=$_POST['tcari'];
            $us = mysql_query("SELECT * FROM sp WHERE nsp LIKE '%".$_POST['tcari']."' or tgl_sp LIKE '%".$_POST['tcari']."'");
        }else{
            $us = mysql_query("SELECT * FROM sp order by nsp asc");
        }
        while($data=mysql_fetch_array($us))
        {
			$no++;
        ?>
        <tr>
			<td><b><?php echo $no ; ?></b></td>
            <td><?php echo $data['nsp'] ?></td>
            <td><?php echo $data['tgl_sp'] ?></td>
	
            <td>
                <a href="index.php?halaman=datasp&id=<?php echo $data['nsp'] ;?>&tgl_op=<?php echo $data['tgl_sp']; ?>" class="btn btn-success	"><i class="fa fa-pencil"></i> Detail</a>
                <a href="index.php?halaman=hapusnsp&nsp=<?php echo $data['nsp']; ?>" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a>
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