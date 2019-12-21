<?php
    $tanggal = $_POST['tanggal'];
    $no_engine = $_POST['no_engine'];
	$kd_jeniskerusakan = $_POST['kd_jeniskerusakan'];
	$kd_liniproduksi = $_POST['kd_liniproduksi'];
	$kd_tipeengine = $_POST['kd_tipeengine'];
	$jenis_perbaikan = $_POST['jenis_perbaikan'];
	$jumlah = $_POST['jumlah'];
	$kd_petugas = $_POST['kd_petugas'];

    if ((strlen($_POST['no_engine']))<6) {
    echo "<script>alert('No Egine Kurang Dari 6 karakter');</script>";
    echo "<script>window.location='index.php?halaman=tambahformlaporanin';</script>";
    }
    else{

    $sql = mysql_query("INSERT INTO laporan_inprocess (tanggal, no_engine, 
    	kd_jeniskerusakan, kd_liniproduksi, kd_tipeengine, jenis_perbaikan, jumlah, kd_petugas) 
    	VALUES ('$tanggal', '$no_engine', '$kd_jeniskerusakan','$kd_liniproduksi', 
    	'$kd_tipeengine', '$jenis_perbaikan', '$jumlah', '$kd_petugas' )");
    if($sql){
    echo "<script>alert('data telah tersimpan');</script>";
    echo "<script>window.location='index.php?halaman=laporanintek';</script>";
}
}
?>