<?php
    $id_user = $_POST['id_user'];
    $username = $_POST['username'];
    $password = $_POST['password'];
	$departemen = $_POST['departemen'];
    $hak_akses = $_POST['hak_akses'];


$sql = mysql_query ("UPDATE user_login SET username='$username', password='$password' , departemen='$departemen' , hak_akses='$hak_akses' WHERE id_user='$id_user'");
    if($sql){
    echo "<script>alert('data berhasil diubah');</script>";
    echo "<script>window.location='index.php?halaman=datauser';</script>";
}
?>