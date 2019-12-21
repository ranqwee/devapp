<?php
    $nama_shop	= $_POST['nama_shop'];

    $sql = mysql_query("INSERT INTO ms_shop (nama_shop) VALUES ('$nama_shop')");
    if($sql){
    echo "<script>alert('data telah tersimpan');</script>";
    echo "<script>window.location='index.php?halaman=datashop';</script>";
}
?>