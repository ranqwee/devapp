<?php
    $kd_komponen = $_POST['kd_komponen'];
    $nama_komponen = $_POST['nama_komponen'];

$sql = mysql_query ("UPDATE mst_komponen SET nama_komponen='$nama_komponen' WHERE kd_komponen='$kd_komponen'");
    if($sql){
    echo "<script>alert('data berhasil diubah');</script>";
    echo "<script>window.location='index.php?halaman=komponen';</script>";
}
?>