<?php
    $kd_laporanbefore = $_POST['kd_laporanbefore'];
    $tanggal = $_POST['tanggal'];
    $kd_komponen = $_POST['kd_komponen'];
	$kd_jeniskerusakan = $_POST['kd_jeniskerusakan'];
	$kd_liniproduksi = $_POST['kd_liniproduksi'];
	$kd_tipeengine = $_POST['kd_tipeengine'];
	$kd_asalmasalah = $_POST['kd_asalmasalah'];
	$jumlah = $_POST['jumlah'];
	$kd_petugas = $_POST['kd_petugas'];

$sql = mysql_query ("UPDATE laporan_beforeprocess SET tanggal='$tanggal',kd_komponen='$kd_komponen', kd_jeniskerusakan='$kd_jeniskerusakan',
	kd_liniproduksi='$kd_liniproduksi', kd_tipeengine='$kd_tipeengine', 
	kd_asalmasalah='$kd_asalmasalah', jumlah='$jumlah', 
	kd_petugas='$kd_petugas' WHERE kd_laporanbefore='$kd_laporanbefore'");
    if($sql){
    echo "<script>alert('data berhasil diubah');</script>";
    echo "<script>window.location='index.php?halaman=laporanbefore';</script>";
}
?>