<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             <h2>Laporan Before Process
                             </h2>
                        </div>

                        <div class="panel-body">
<form name="form1" method="post" action="">
		<div>
			<tr>
			<td>
				<label>Tgl. Awal</label>
				<input type="date" name="dt1cari"> &nbsp&nbsp
				<label>Tgl. Akhir</label>
				<input type="date" name="dt2cari">
			</td>
		</tr>	
		<input type="submit" name="button" id="button" value="CARI" class="btn btn-info">
<!--		<button onclick="javascript:printDiv('id-elemen-yang-ingin-di-print');" class="btn btn-info">Cetak</button> -->
                <a href="javascript:void(0);" class="btn btn-info" plain="true" onclick="window.open('convert.php?dt1cari=<?php echo $_POST['dt1cari']; ?>
&dt2cari=<?php echo $_POST['dt2cari']; ?>
','Laporan Kerusakan','size=800,height=800,scrollbars=yes,resizeable=no')">CETAK</a>

		</div>
<div class="table-responsive" id="id-elemen-yang-ingin-di-print">
</br>
<table width = "100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
	<thead>
		<tr>
			<th>Tanggal</th>
            <th>Kode Komponen</th>
            <th>Nama Komponen</th>
            <th>Jenis Kerusakan</th>
            <th>Lini Produksi</th>
            <th>Tipe Engine</th>
            <th>Lokasi Reject</th>
            <th>Jumlah</th>
            <th>Nama Petugas</th>
        </tr>
	</tread>
	<tbody>
		<?php
        if(isset($_POST['button'])){
$us = mysql_query("SELECT * FROM laporan_beforeprocess join mst_komponen on laporan_beforeprocess.kd_komponen = mst_komponen.kd_komponen join mst_jeniskerusakan on
 				laporan_beforeprocess.kd_jeniskerusakan = mst_jeniskerusakan.kd_jeniskerusakan join 
 				mst_liniproduksi on laporan_beforeprocess.kd_liniproduksi=mst_liniproduksi.kd_liniproduksi join mst_tipeengine 
 				on laporan_beforeprocess.kd_tipeengine=mst_tipeengine.kd_tipeengine join 
 				mst_asal_masalah_komponen on laporan_beforeprocess.kd_asalmasalah = mst_asal_masalah_komponen.kd_asalmasalah
                join mst_petugas on laporan_beforeprocess.kd_petugas=mst_petugas.kd_petugas where 
                tanggal BETWEEN '$_POST[dt1cari]' AND '$_POST[dt2cari]' order by tanggal asc");
        }else{
            $us = mysql_query("SELECT * FROM laporan_beforeprocess join mst_komponen on laporan_beforeprocess.kd_komponen = mst_komponen.kd_komponen join mst_jeniskerusakan on
 				laporan_beforeprocess.kd_jeniskerusakan = mst_jeniskerusakan.kd_jeniskerusakan join 
 				mst_liniproduksi on laporan_beforeprocess.kd_liniproduksi=mst_liniproduksi.kd_liniproduksi join mst_tipeengine 
 				on laporan_beforeprocess.kd_tipeengine=mst_tipeengine.kd_tipeengine join 
 				mst_asal_masalah_komponen on laporan_beforeprocess.kd_asalmasalah = mst_asal_masalah_komponen.kd_asalmasalah
                join mst_petugas on laporan_beforeprocess.kd_petugas=mst_petugas.kd_petugas order by tanggal asc");
        }
        $apa=0;
		while($data=mysql_fetch_array($us))
		{
        $apa+=$data['jumlah'];
		?>
		<tr>
            <td><?php echo $data['tanggal'] ?></td>
            <td><?php echo $data['kd_komponen'] ?></td>
            <td><?php echo $data['nama_komponen'] ?></td>
            <td><?php echo $data['jenis_kerusakan'] ?></td>
            <td><?php echo $data['nama_liniproduksi'] ?></td>
            <td><?php echo $data['tipe_engine'] ?></td>
            <td><?php echo $data['nama_lokasiasalmasalah'] ?></td>            
            <td><?php echo $data['jumlah'] ?></td>            
            <td><?php echo $data['nama_petugas'] ?></td>
            </tr>

        <?php } ?>
        <tr>
        <td colspan='7' align='right'>Total</td>
        <td><?php echo $apa ?></td> 
        </tr>


<textarea id="printing-css" style="display:none;">.no-print{display:none}</textarea>
<iframe id="printing-frame" name="print_frame" src="about:blank" style="display:none;"></iframe>
<script type="text/javascript">
function printDiv(elementId) {
 var a = document.getElementById('printing-css').value;
 var b = document.getElementById(elementId).innerHTML;
 window.frames["print_frame"].document.title = document.title;
 window.frames["print_frame"].document.body.innerHTML = '<style>' + a + '</style>' + b;
 window.frames["print_frame"].window.focus();
 window.frames["print_frame"].window.print();
}
</script>

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