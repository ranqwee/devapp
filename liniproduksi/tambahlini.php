<h2> Tambah Lini Produksi </h2>
<form action="index.php?halaman=savelini" method="POST">
    <div class="form-group">
        <label>Kode Lini Produksi</label>
        <input type="text" name="kd_liniproduksi" class="form-control" required maxlength="2">
    </br>
        <label>Nama Lini Produksi</label>
        <input type="text" name="nama_liniproduksi" class="form-control" required maxlength="7">
    </br>
    </div>
    <button type="submit" class="btn btn-primary" name="save"><i class="fa fa-check"></i>Simpan</button>
</form>