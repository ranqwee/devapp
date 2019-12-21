<?php
    $kd_tipeengine = $_POST['kd_tipeengine'];
    $tipe_engine = $_POST['tipe_engine'];

$sql = mysql_query ("UPDATE mst_tipeengine SET tipe_engine='$tipe_engine' WHERE kd_tipeengine='$kd_tipeengine'");
    if($sql){
    echo "<script>alert('data berhasil diubah');</script>";
    echo "<script>window.location='index.php?halaman=tipe';</script>";
}
?>