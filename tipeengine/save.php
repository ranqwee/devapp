<?php
    $kd_tipeengine = $_POST['kd_tipeengine'];
    $tipe_engine = $_POST['tipe_engine'];


	$cek=mysql_num_rows(mysql_query
             ("SELECT tipe_engine FROM mst_tipeengine 
               WHERE tipe_engine='$_POST[tipe_engine]'"));
    if ($cek > 0){
        echo "<script>alert('Tipe Engine sudah ada');</script>";
        echo "<script>window.location='index.php?halaman=tambahformtipe';</script>";
    }
    else{

    $sql = mysql_query("INSERT INTO mst_tipeengine (kd_tipeengine, tipe_engine) VALUES ('$kd_tipeengine', '$tipe_engine')");
    if($sql){
    echo "<script>alert('data telah tersimpan');</script>";
    echo "<script>window.location='index.php?halaman=tipe';</script>";
}
}
?>