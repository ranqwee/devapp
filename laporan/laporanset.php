<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             <h2>Laporan Aplikasi Persediaan Peralatan Kantor
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
<a href="javascript:void(0);" class="btn btn-info" plain="true" onclick="window.open('converthint.php?dt1cari=<?php echo $_POST['dt1cari']; ?>
&dt2cari=<?php echo $_POST['dt2cari']; ?>
','Laporan Kerusakan','size=800,height=800,scrollbars=yes,resizeable=no')">CETAK</a>

		</div>
<div class="table-responsive" id="id-elemen-yang-ingin-di-print">
</br>
<table width = "100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
	<thead>
		<tr>
			<th>ID Pemeliharaan</th>
			<th>ID Job Order</th>
            <th>Tanggal</th>
			<th>Mesin</th>
			<th>Shop</th>
			<th>Personil</th>
			<th>Shift</th>
			<th>Job Description</th>
			<th>Penyebab</th>
			<th>Total Loss</th>
			<th>Material</th>
			<th>Job Type</th>
			<th>Job Status</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if(isset($_POST['button'])){
            $us = mysql_query("SELECT * FROM pemeliharaan JOIN ms_mesin on pemeliharaan.id_mesin = ms_mesin.id_mesin JOIN ms_shop on pemeliharaan.id_shop = ms_shop.id_shop
			JOIN ms_personil on pemeliharaan.id_personil = ms_personil.id_personil WHERE id_joborder LIKE '%".$_POST['tcari']."'");
        }else{
            $us = mysql_query("SELECT * FROM pemeliharaan JOIN ms_mesin on pemeliharaan.id_mesin = ms_mesin.id_mesin JOIN ms_shop on pemeliharaan.id_shop = ms_shop.id_shop
			JOIN ms_personil on pemeliharaan.id_personil = ms_personil.id_personil order by id_pemeliharaan asc");
        }
        while($data=mysql_fetch_array($us))
        {
        ?>
        <tr>
			<td><?php echo $data['id_pemeliharaan'] ?></td>
			<td><?php echo $data['id_joborder'] ?></td>
            <td><?php echo $data['tgl'] ?></td>
			<td><?php echo $data['nama_mesin'] ?></td>
			<td><?php echo $data['nama_shop'] ?></td>
			<td><?php echo $data['nama_personil'] ?></td>
			<td><?php echo $data['shift'] ?></td>
			<td><?php echo $data['job'] ?></td>
			<td><?php echo $data['penyebab'] ?></td>
			<td><?php echo $data['loss'] ?></td>
			<td><?php echo $data['material'] ?></td>
			<td><?php echo $data['job_type'] ?></td>
			<td><?php echo $data['job_status'] ?></td>
    	</tr>
		<?php } ?>
        <tr>
        <td colspan='12' align='right'>Total</td>
        <td align='right'><?php echo $data ?></td> 
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