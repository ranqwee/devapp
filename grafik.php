<html>
	<head>
<script src="js/jquery.min.js" type="text/javascript"></script>
<script src="js/highcharts.js" type="text/javascript"></script>
<script type="text/javascript">
	var chart1; // globally available
$(document).ready(function() {
      chart1 = new Highcharts.Chart({
         chart: {
            renderTo: 'container',
            type: 'column'
         },   
         title: {
            text: 'Grafik Penjualan '
         },
         xAxis: {
            categories: ['nama_lokasiasalmasalah']
         },
         yAxis: {
            title: {
               text: 'Jumlah'
            }
         },
              series:             
            [
            <?php 
        	include('connect.php');
          $tgl_awal=$_GET['dt1cari'];
          $tgl_akhir=$_GET['dt2cari'];

          $result=mysql_query ("SELECT * FROM laporan_beforeprocess join  
                mst_asal_masalah_komponen on laporan_beforeprocess.kd_asalmasalah = mst_asal_masalah_komponen.kd_asalmasalah
                 where tanggal BETWEEN '$tgl_awal' AND '$tgl_akhir' GROUP BY tanggal, kd_asalmasalah");
            while( $rows = mysql_fetch_array( $result ) ){
              	 $nama_lokasiasalmasalah=$rows['nama_lokasiasalmasalah'];
                 $sql_jumlah   = "SELECT sum (jumlah) as jumlah FROM laporan_beforeprocess WHERE tanggal BETWEEN '$tgl_awal' AND '$tgl_akhir' GROUP BY tanggal, kd_asalmasalah ";
                 $query_jumlah = mysql_query( $sql_jumlah ) or die(mysql_error());
                 while( $data = mysql_fetch_array( $query_jumlah ) ){
                    $jumlah = $data['jumlah'];                 
                  }             
                  ?>
                  {
                      name: '<?php echo $nama_lokasiasalmasalah; ?>',
                      data: [<?php echo $jumlah; ?>]
                  },
                  <?php } ?>
            ]
      });
   });	
</script>
	</head>
	<body>
		<div id='container'></div>		
	</body>
</html>