<h2> Ubah User </h2>
<?php
$id_user = $_GET['id_user'];
$sql = mysql_query("SELECT * from user_login where id_user='$id_user'");
if($data = mysql_fetch_array($sql)){
    $id_user = $data['id_user'];
    $username = $data['username'];
    $password = $data['password'];
	$departemen = $data['departemen'];
    $hak_akses = $data['hak_akses'];
    }
?>
<form action="index.php?halaman=ubahuser" method="POST">
	<div class="form-group">
		<label>Kode User</label>
		<input type="text" name="id_user" name="id_user" class="form-control" readonly value="<?php echo $data['id_user']; ?>"> </br>
		<label>Username</label>
		<input type="text" name="username" name="kd_user" class="form-control" value="<?php echo $data['username']; ?>"> </br>
        <label>Password</label>
        <input type="text" name="password" class="form-control" value="<?php echo $data['password']; ?>">
		<label>Departemen</label>
        <input type="text" name="departemen" class="form-control" value="<?php echo $data['departemen']; ?>">
		<label>Hak Akses</label>
        <select name="hak_akses" class="form-control" required>
            <option value="">--- Silahkan pilih ---</option>
            <option value="ADMIN">Admin</option>
            <option value="USER">User</option> 
			</select></br>
			
			</div>
	<a href="index.php?halaman=datauser" class="btn btn-danger"></i>Kembali</a>
	<button type="submit" class="btn btn-primary" name="ubah"><i class="fa fa-pencil"></i>Simpan</button>
</form>	
</form>