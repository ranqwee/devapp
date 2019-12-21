<?php
include('connect.php');
?>
<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             <h2>Kerusakan Before Process</h2>
                        </div>
                        <div class="panel-body">
                        <a href="index.php?halaman=tambahformlaporanbefore" class="btn btn-primary"><i class="fa fa-plus"></i> tambah</a>
                        </br></br>
<form name="form1" method="post" action="">
    <label>Pilih Tanggal Untuk Melakukan Pencarian</label> <br>
    <input type="date" name="tcari" id="tcari">
    <input type="submit" name="button" id="button" value="cari" class="btn btn-info">
<div class="table-responsive">
</br>
<table width = "100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
        <tr>
            <th>Tanggal</th>
            <th>Kode Komponen</th>
            <th>Nama Komponen</th>
            <th>Jenis Kerusakan</th>
            <th>Lini Produksi</th>
            <th>Tipe Engine</th>
            <th>Lokasi Reject</th>
            <th>Jumlah</th>
            <th>Nama Petugas</th>
            <th>Aksi</th>
        </tr>
    </tread>
    <tbody>
        <?php
        if(isset($_POST['button'])){
            $us = mysql_query("SELECT * FROM laporan_beforeprocess join mst_komponen on laporan_beforeprocess.kd_komponen = mst_komponen.kd_komponen join mst_jeniskerusakan on laporan_beforeprocess.kd_jeniskerusakan = mst_jeniskerusakan.kd_jeniskerusakan join mst_liniproduksi on laporan_beforeprocess.kd_liniproduksi=mst_liniproduksi.kd_liniproduksi join mst_tipeengine on laporan_beforeprocess.kd_tipeengine=mst_tipeengine.kd_tipeengine 
                join mst_asal_masalah_komponen on laporan_beforeprocess.kd_asalmasalah = mst_asal_masalah_komponen.kd_asalmasalah
                join mst_petugas on laporan_beforeprocess.kd_petugas=mst_petugas.kd_petugas where tanggal LIKE '%".$_POST['tcari']."' order by tanggal asc");
            }else
            {
                $us = mysql_query("SELECT * FROM laporan_beforeprocess join mst_komponen on laporan_beforeprocess.kd_komponen = mst_komponen.kd_komponen join mst_jeniskerusakan on laporan_beforeprocess.kd_jeniskerusakan = mst_jeniskerusakan.kd_jeniskerusakan join mst_liniproduksi on laporan_beforeprocess.kd_liniproduksi=mst_liniproduksi.kd_liniproduksi join mst_tipeengine on laporan_beforeprocess.kd_tipeengine=mst_tipeengine.kd_tipeengine 
                join mst_asal_masalah_komponen on laporan_beforeprocess.kd_asalmasalah = mst_asal_masalah_komponen.kd_asalmasalah
                join mst_petugas on laporan_beforeprocess.kd_petugas=mst_petugas.kd_petugas order by tanggal asc");
            }
            while($data=mysql_fetch_array($us))
        {
        ?>
        <tr>
            <td><?php echo $data['tanggal'] ?></td>
            <td><?php echo $data['kd_komponen'] ?></td>
            <td><?php echo $data['nama_komponen'] ?></td>
            <td><?php echo $data['jenis_kerusakan'] ?></td>
            <td><?php echo $data['nama_liniproduksi'] ?></td>
            <td><?php echo $data['tipe_engine'] ?></td>
            <td><?php echo $data['nama_lokasiasalmasalah'] ?></td>            
            <td><?php echo $data['jumlah'] ?></td>            
            <td><?php echo $data['nama_petugas'] ?></td>
            <td>
                <a href="index.php?halaman=ubahformbeforeprocess&kd_laporanbefore=<?php echo $data['kd_laporanbefore']; ?>" class="btn btn-info"><i class="fa fa-edit"></i>ubah</a>
                <a href="index.php?halaman=hapusbeforeprocess&kd_laporanbefore=<?php echo $data['kd_laporanbefore']; ?>" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" class="btn btn-danger"><i class="fa fa-remove"></i>hapus</a>
            </td>
        </tr>
        <?php
    }?>
    </tbody>
</table>
</form>     
</div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>

     <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
         <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>