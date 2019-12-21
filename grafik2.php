<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<head>
<title>Grafik Penduduk Indonesia</title>
<script src="js/jquery-1.9.1.min.js" type="text/javascript"></script>
<script src="js/highcharts.js" type="text/javascript"></script>
<script src="js/exporting.js" type="text/javascript"></script>
<script type="text/javascript">
	var chart1; // globally available
$(document).ready(function() {
      chart1 = new Highcharts.Chart({
         chart: {
            renderTo: 'container',
            type: 'column'
         },   
         title: {
            text: 'Data Penduduk Provinsi Indonesia '
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
// file koneksi php
include('connect.php')
         $sql   = mysql_query ("SELECT * FROM laporan_beforeprocess join  
          mst_asal_masalah_komponen on laporan_beforeprocess.kd_asalmasalah = mst_asal_masalah_komponen.kd_asalmasalah
          GROUP BY tanggal, kd_asalmasalah"); // file untuk mengakses ke tabel database
      $query = mysql_query( $sql ) or die(mysql_error());         
         while($ambil = mysql_fetch_array($query)){
	$nama_lokasiasalmasalah=$ambil['nama_lokasiasalmasalah'];
	$sql_jumlah   = "SELECT sum (jumlah) as jumlah FROM laporan_beforeprocess GROUP BY tanggal, kd_asalmasalah";
	$query_jumlah = mysql_query( $sql_jumlah ) or die(mysql_error());
	while( $data = mysql_fetch_array( $query_jumlah ) ){
	   $jumlahx = $data['jumlah'];                 
	  }             
	  
	  ?>
	  {
		  name: '<?php echo $nama_lokasiasalmasalah; ?>',
		  data: [<?php echo $jumlahx; ?>]
	  },
	  <?php } ?>
]
});
});	
</script>
</head>
<body>
<!-- fungsi yang di tampilkan dibrowser  -->
<div id="container" style="min-width: 200px; height: 400px; margin: 0 auto"></div>

</body>
</html>
