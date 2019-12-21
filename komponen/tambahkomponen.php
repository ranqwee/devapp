<head>
<h2> Tambah Komponen </h2>
<form action="index.php?halaman=save" method="POST">
    <div class="form-group">
        <label>Kode Komponen</label>
        <input type="text" name="kd_komponen" class="form-control" required maxlength="4">
    </br>
        <label>Nama Komponen</label>
        <input type="text" name="nama_komponen" class="form-control" required maxlength="25">
    </br>
    </div>
    <button type="submit" class="btn btn-primary" name="save"><i class="fa fa-check"></i>Simpan</button>
</form>