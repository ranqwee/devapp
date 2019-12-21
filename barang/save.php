<?php
    $kode_brg = $_POST['kode_brg'];
	$nama_brg = $_POST['nama_brg'];
	$mata_uang = $_POST['mata_uang'];
	$harga_brg = $_POST['harga_brg'];
	$ktrg_brg = $_POST['ktrg_brg'];
	
    $sql = mysql_query("INSERT INTO ms_brg (kode_brg, nama_brg, mata_uang, harga_brg, ktrg_brg) VALUES ('$kode_brg', '$nama_brg', '$mata_uang', '$harga_brg', '$ktrg_brg')");
    if($sql){
    echo "<script>alert('data telah tersimpan');</script>";
    echo "<script>window.location='index.php?halaman=databrg';</script>";
}
?>