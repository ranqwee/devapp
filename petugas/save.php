<?php
    $kd_petugas = $_POST['kd_petugas'];
    $nama_petugas = $_POST['nama_petugas'];

    if ((strlen($_POST['kd_petugas']))<7) {
    echo "<script>alert('Kode Petugas Kurang Dari 7 karakter');</script>";
    echo "<script>window.location='index.php?halaman=tambahformpetugas';</script>";
    }
    else{

    $sql = mysql_query("INSERT INTO mst_petugas (kd_petugas, nama_petugas) VALUES ('$kd_petugas', '$nama_petugas')");
    if($sql){
    echo "<script>alert('data telah tersimpan');</script>";
    echo "<script>window.location='index.php?halaman=petugas';</script>";
}
}
?>