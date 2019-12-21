<h2> Tambah Tipe Engine </h2>
<form action="index.php?halaman=savetipe" method="POST">
    <div class="form-group">
        <input type="Hidden" name="kd_tipeengine">
        <br>
        <label>Tipe Engine</label>
        <input type="text" name="tipe_engine" class="form-control" required maxlength="10">
        <br>
    </div>
    <button type="submit" class="btn btn-primary" name="save"><i class="fa fa-check"></i>Simpan</button>
</form>