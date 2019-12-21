<?php
include "connect.php";
require('fpdf17/fpdf.php');

//Menampilkan data dari tabel di database
$tgl_awal=$_GET['dt1cari'];
$tgl_akhir=$_GET['dt2cari'];
$result=mysql_query("SELECT * FROM laporan_beforeprocess join mst_komponen on laporan_beforeprocess.kd_komponen = mst_komponen.kd_komponen join mst_jeniskerusakan on
                laporan_beforeprocess.kd_jeniskerusakan = mst_jeniskerusakan.kd_jeniskerusakan join 
                mst_liniproduksi on laporan_beforeprocess.kd_liniproduksi=mst_liniproduksi.kd_liniproduksi join mst_tipeengine 
                on laporan_beforeprocess.kd_tipeengine=mst_tipeengine.kd_tipeengine join 
                mst_asal_masalah_komponen on laporan_beforeprocess.kd_asalmasalah = mst_asal_masalah_komponen.kd_asalmasalah
                join mst_petugas on laporan_beforeprocess.kd_petugas=mst_petugas.kd_petugas where tanggal BETWEEN '$tgl_awal' AND '$tgl_akhir' ORDER BY tanggal ASC") or die(mysql_error());

//Inisiasi untuk membuat header kolom
$column_tanggal = "";
$column_kodekomponen = "";
$column_nama_komponen = "";
$column_jeniskerusakan = "";
$column_namaliniproduksi = "";
$column_tipeengine = "";
$column_lokasireject = "";
$column_jumlah = "";
$column_namapetugas = "";

//For each row, add the field to the corresponding column
while($rows = mysql_fetch_array($result))
{
    $tanggal=$rows['tanggal'];
    $kd_komponen=$rows['kd_komponen'];
    $nama_komponen=$rows['nama_komponen'];
    $jenis_kerusakan=$rows['jenis_kerusakan'];
    $nama_liniproduksi=$rows['nama_liniproduksi'];
    $tipe_engine=$rows['tipe_engine'];
    $nama_lokasiasalmasalah=$rows['nama_lokasiasalmasalah'];
    $jumlah=$rows['jumlah'];
    $nama_petugas=$rows['nama_petugas'];
    

	$column_tanggal = $column_tanggal.$tanggal."\n";
    $column_kodekomponen = $column_kodekomponen.$kd_komponen."\n";
    $column_nama_komponen = $column_nama_komponen.$nama_komponen."\n";
    $column_jeniskerusakan = $column_jeniskerusakan.$jenis_kerusakan."\n";
    $column_namaliniproduksi = $column_namaliniproduksi.$nama_liniproduksi."\n";
    $column_tipeengine = $column_tipeengine.$tipe_engine."\n";
    $column_lokasireject = $column_lokasireject.$nama_lokasiasalmasalah."\n";
    $column_jumlah = $column_jumlah.$jumlah."\n";
    $column_namapetugas = $column_namapetugas.$nama_petugas."\n";


//Create a new PDF file
$pdf = new FPDF('L','mm',array(210,297)); //L For Landscape / P For Portrait
$pdf->AddPage();

//Menambahkan Gambar
//$pdf->Image('../foto/logo.png',10,10,-175);

$pdf->SetFont('Arial','B',13);
$pdf->Cell(90);
$pdf->Cell(80,10,'Laporan Kerusakan Before Process',0,0,'C');
$pdf->Ln();
$pdf->Cell(80);
$pdf->Cell(100,10,'PT. Suzuki Indomobil Motor',0,0,'C');
$pdf->Ln();

}
//Fields Name position
$Y_Fields_Name_position = 30;

//First create each Field Name
//Gray color filling each Field Name box
$pdf->SetFillColor(110,180,230);
//Bold Font for Field Name
$pdf->SetFont('Arial','B',10);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(5);
$pdf->Cell(25,8,'Tanggal',1,0,'C',1);
$pdf->SetX(30);
$pdf->Cell(30,8,'Kode Komponen',1,0,'C',1);
$pdf->SetX(60);
$pdf->Cell(40,8,'Nama Komponen',1,0,'C',1);
$pdf->SetX(100);
$pdf->Cell(60,8,'Jenis Kerusakan',1,0,'C',1);
$pdf->SetX(160);
$pdf->Cell(25,8,'Lini Produksi',1,0,'C',1);
$pdf->SetX(185);
$pdf->Cell(25,8,'Tipe Engine',1,0,'C',1);
$pdf->SetX(210);
$pdf->Cell(30,8,'Lokasi Reject',1,0,'C',1);
$pdf->SetX(240);
$pdf->Cell(15,8,'Jumlah',1,0,'C',1);
$pdf->SetX(255);
$pdf->Cell(30,8,'Nama Petugas',1,0,'C',1);
$pdf->Ln();

//Table position, under Fields Name
$Y_Table_Position = 38;

//Now show the columns
$pdf->SetFont('Arial','',10);

$pdf->SetY($Y_Table_Position);
$pdf->SetX(5);
$pdf->MultiCell(25,6,$column_tanggal,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(30);
$pdf->MultiCell(30,6,$column_kodekomponen,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(60);
$pdf->MultiCell(40,6,$column_nama_komponen,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(100);
$pdf->MultiCell(60,6,$column_jeniskerusakan,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(160);
$pdf->MultiCell(25,6,$column_namaliniproduksi,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(185);
$pdf->MultiCell(25,6,$column_tipeengine,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(210);
$pdf->MultiCell(30,6,$column_lokasireject,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(240);
$pdf->MultiCell(15,6,$column_jumlah,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(255);
$pdf->MultiCell(30,6,$column_namapetugas,1,'C');

$pdf->Output();
?>
