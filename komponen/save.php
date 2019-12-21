<?php
	
    $kd_komponen = $_POST['kd_komponen'];
    $nama_komponen = $_POST['nama_komponen'];

	$cek=mysql_num_rows(mysql_query
             ("SELECT kd_komponen, nama_komponen FROM mst_komponen 
               WHERE kd_komponen='$_POST[kd_komponen]' OR nama_komponen='$_POST[nama_komponen]'"));
    if ($cek > 0){
        echo "<script>alert('Komponen sudah ada');</script>";
        echo "<script>window.location='index.php?halaman=tambahkomponen';</script>";
    }
    else{

    $sql = mysql_query("INSERT INTO mst_komponen (kd_komponen, nama_komponen) VALUES ('$kd_komponen', '$nama_komponen')");
    if($sql){
    echo "<script>alert('data telah tersimpan');</script>";
    echo "<script>window.location='index.php?halaman=komponen';</script>";
			}
		}
?>