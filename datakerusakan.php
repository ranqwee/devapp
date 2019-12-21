<?php
include('connect.php');
?>
<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             <h2>Surat Pengantar</h2>
                        </div>
                        </br></br>
<form name="form1" method="post" action="">
    <input type="text" name="tcari" id="tcari" placeholder="ID / Status">
    <input type="submit" name="button" id="button" value="cari" class="btn btn-info">
                            <div class="table-responsive">
</br>
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
        <tr>
            <th>Nomor</th>
			<th>Tanggal</th>
			<th>Keterangan</th>
            <th>Penerima</th>
			<th>Pengirim</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if(isset($_POST['button'])){
            $us = mysql_query("SELECT * FROM kerusakan JOIN ms_shop on kerusakan.id_shop = ms_shop.id_shop JOIN ms_mesin on kerusakan.id_mesin = ms_mesin.id_mesin JOIN ms_personil on kerusakan.id_personil = ms_personil.id_personil WHERE id_kerusakan or status LIKE '%".$_POST['tcari']."'");
        }else{
            $us = mysql_query("SELECT * FROM kerusakan JOIN ms_shop on kerusakan.id_shop = ms_shop.id_shop JOIN ms_mesin on kerusakan.id_mesin = ms_mesin.id_mesin JOIN ms_personil on kerusakan.id_personil = ms_personil.id_personil order by tgl asc");
        }
        while($data=mysql_fetch_array($us))
        {
        ?>
        <tr>
            <td><?php echo $data['no_sp'] ?></td>
			<td><?php echo $data['tgl_sp'] ?></td>
            <td><?php echo $data['kpd_sp'] ?></td>
			<td><?php echo $data['ktrgn_sp'] ?></td>
			<td><?php echo $data['pnrm_sp'] ?></td>
			<td><?php echo $data['pgrm_sp'] ?></td>
			<?php if($data['status'] == "OK") {echo "<td align='center' bgcolor='#66ff66'><strong>OK</strong></td>";} 
												else if($data['status'] == "Proses") {echo "<td align='center' bgcolor='#33CCFF'><strong>Proses</strong></td>";} 
												else if($data['status'] == "Waiting Part") {echo "<td align='center' bgcolor='#FFCC33'><strong>Waiting Part</strong></td>";} 
												else if($data['status'] == "Baru Dikirimkan") {echo "<td align='center' bgcolor='#b3c6d7'><strong>Baru Dikirimkan</strong></td>";} ?>
            <td>
				<a href="index.php?halaman=ubahdatakerusakan&id_kerusakan=<?php echo $data['id_kerusakan']; ?>" class="btn btn-info"><i class="fa fa-edit"></i>ubah</a>
                <a href="index.php?halaman=hapuskerusakan&id_kerusakan=<?php echo $data['id_kerusakan']; ?>" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" class="btn btn-danger"><i class="fa fa-remove"></i>hapus</a>
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