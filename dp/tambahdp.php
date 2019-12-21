
<h2> Tambah daftar permintaan </h2>
<div class="panel-body">
<div class="form-group">
<form action="index.php?halaman=savedp" method="POST">
    <table width='100%' align='center'>
    <tr>
		<label>No DP</label>
	   <input type='text' name='ndp' value="<?php echo $id ; ?>" class="form-control" readonly><br>
	   <label>Nama Barang</label>
        <select name="kode_brg" class="form-control" required>
            <option value=""></option>
			        <?php
                    include 'connect.php';
                    $sqlopt = "SELECT kode_brg,nama_brg FROM ms_brg order by nama_brg asc";
                    $queryopt = mysql_query($sqlopt);
                    while($result=mysql_fetch_array($queryopt))
					{
                        if($result['kode_brg'] == $row['nama_brg']) {
                        echo "<option value='$result[kode_brg]' selected='selected'>$result[nama_brg]</option>";
                        }else{
                        echo "<option value='$result[kode_brg]'>$result[nama_brg]</option>";
                        }
                    }	
                    ?>  
        </select><br>
		<label>QTY</label>
        <input type="text" name="qty" class="form-control" required>
	<tr></tr><a href="index.php?halaman=datadp" class="btn btn-danger"></i>Kembali</a>
    <tr></tr><button type="submit" class="btn btn-primary" name="save"><i class="fa fa-check"></i>Simpan</button>
</form>    </div>
</div>
