<?php
    $kd_liniproduksi = $_POST['kd_liniproduksi'];
    $nama_liniproduksi = $_POST['nama_liniproduksi'];

    $sql = mysql_query("INSERT INTO mst_liniproduksi (kd_liniproduksi, nama_liniproduksi) VALUES ('$kd_liniproduksi', '$nama_liniproduksi')");
    if($sql){
    echo "<script>alert('data telah tersimpan');</script>";
    echo "<script>window.location='index.php?halaman=lini';</script>";
}
?>