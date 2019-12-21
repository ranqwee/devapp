<h2> Tambah User </h2>
<form action="index.php?halaman=saveuser" method="POST">
    <div class="form-group">
        <input type="hidden" name="id_user">
    </br>
        <label>Username</label>
        <input type="text" name="username" class="form-control" required>
    </br>
         <label>Password</label>
        <input type="text" name="password" class="form-control" required>
    </br>
	<label>Departemen</label>
        <input type="text" name="departemen" class="form-control" required>
    </br>
        <label>Hak Akses</label>
        <select name="hak_akses" class="form-control" required>
            <option value="">Silahkan Pilih</option>
            <option value="ADMIN">Admin</option>
            <option value="USER">User</option>   
         
        </select>
        <br>
    </div>
	<tr></tr><a href="index.php?halaman=datauser" class="btn btn-danger"></i>Kembali</a>
    <button type="submit" class="btn btn-primary" name="save"><i class="fa fa-check"></i>Simpan</button>
</form>