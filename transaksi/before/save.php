<?php
    $tanggal = $_POST['tanggal'];
    $kd_komponen = $_POST['kd_komponen'];
    $kd_jeniskerusakan = $_POST['kd_jeniskerusakan'];
    $kd_liniproduksi = $_POST['kd_liniproduksi'];
    $kd_tipeengine = $_POST['kd_tipeengine'];
    $kd_asalmasalah = $_POST['kd_asalmasalah'];
    $jumlah = $_POST['jumlah'];
    $kd_petugas = $_POST['kd_petugas'];

    $sql = mysql_query("INSERT INTO laporan_beforeprocess (tanggal, kd_komponen, 
        kd_jeniskerusakan, kd_liniproduksi, kd_tipeengine, kd_asalmasalah, jumlah, kd_petugas) 
        VALUES ('$tanggal', '$kd_komponen', '$kd_jeniskerusakan','$kd_liniproduksi', 
        '$kd_tipeengine', '$kd_asalmasalah', '$jumlah', '$kd_petugas' )");
    if($sql){
    echo "<script>alert('data telah tersimpan');</script>";
    echo "<script>window.location='index.php?halaman=laporanbefore';</script>";
}
?>