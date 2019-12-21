<?php
    $kd_laporanin = $_POST['kd_laporanin'];
    $tanggal = $_POST['tanggal'];
    $no_engine = $_POST['no_engine'];
	$kd_jeniskerusakan = $_POST['kd_jeniskerusakan'];
	$kd_liniproduksi = $_POST['kd_liniproduksi'];
	$kd_tipeengine = $_POST['kd_tipeengine'];
	$jenis_perbaikan = $_POST['jenis_perbaikan'];
	$jumlah = $_POST['jumlah'];
	$kd_petugas = $_POST['kd_petugas'];


$sql = mysql_query ("UPDATE laporan_inprocess SET kd_jeniskerusakan='$kd_jeniskerusakan', 
	kd_liniproduksi='$kd_liniproduksi', kd_tipeengine='$kd_tipeengine', 
	jenis_perbaikan='$jenis_perbaikan', jumlah='$jumlah', 
	kd_petugas='$kd_petugas' WHERE kd_laporanin='$kd_laporanin'");
    if($sql){
    echo "<script>alert('data berhasil diubah');</script>";
    echo "<script>window.location='index.php?halaman=laporanin';</script>";
}
}
?>