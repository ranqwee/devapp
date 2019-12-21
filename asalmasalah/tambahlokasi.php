<h2> Tambah Asal Masalah </h2>
<form action="index.php?halaman=savelokasi" method="POST">
    <div class="form-group">
        <label>Kode Lokasi</label>
        <input type="text" name="kd_asalmasalah" class="form-control" required maxlength="2">
    </br>
        <label>Lokasi Reject</label>
        <input type="text" name="nama_lokasiasalmasalah" class="form-control" required maxlength="20">
    </br>
    </div>
    <button type="submit" class="btn btn-primary" name="save"><i class="fa fa-check"></i>Simpan</button>
</form>