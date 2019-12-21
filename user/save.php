<?php
	
    $id_user = $_POST['id_user'];
    $username = $_POST['username'];
    $password = $_POST['password'];
	$departemen = $_POST['departemen'];
    $hak_akses = $_POST['hak_akses'];

    $sql = mysql_query("INSERT INTO user_login (id_user, username, password, departemen, hak_akses) VALUES ('$id_user', '$username', '$password', '$departemen', '$hak_akses')");
    if($sql){
    echo "<script>alert('data telah tersimpan');</script>";
    echo "<script>window.location='index.php?halaman=datauser';</script>";
}
?>