<?php
    $kd_asalmasalah = $_POST['kd_asalmasalah'];
    $nama_lokasiasalmasalah = $_POST['nama_lokasiasalmasalah'];

$sql = mysql_query ("UPDATE mst_asal_masalah_komponen SET nama_lokasiasalmasalah='$nama_lokasiasalmasalah' WHERE kd_asalmasalah='$kd_asalmasalah'");
    if($sql){
    echo "<script>alert('data berhasil diubah');</script>";
    echo "<script>window.location='index.php?halaman=dataasalmasalah';</script>";
}
?>