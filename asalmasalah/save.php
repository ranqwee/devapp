<?php
    $kd_asalmasalah = $_POST['kd_asalmasalah'];
    $nama_lokasiasalmasalah = $_POST['nama_lokasiasalmasalah'];

    $sql = mysql_query("INSERT INTO mst_asal_masalah_komponen (kd_asalmasalah, nama_lokasiasalmasalah) VALUES ('$kd_asalmasalah', '$nama_lokasiasalmasalah')");
    if($sql){
    echo "<script>alert('data telah tersimpan');</script>";
    echo "<script>window.location='index.php?halaman=dataasalmasalah';</script>";
}
?>