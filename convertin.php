<?php
include "connect.php";
require('fpdf17/fpdf.php');

//Menampilkan data dari tabel di database
$tgl_awal=$_GET['dt1cari'];
$tgl_akhir=$_GET['dt2cari'];
$result=mysql_query("SELECT * FROM laporan_inprocess join mst_jeniskerusakan on laporan_inprocess.kd_jeniskerusakan = mst_jeniskerusakan.kd_jeniskerusakan 
                join mst_liniproduksi on laporan_inprocess.kd_liniproduksi=mst_liniproduksi.kd_liniproduksi 
                join mst_tipeengine on laporan_inprocess.kd_tipeengine=mst_tipeengine.kd_tipeengine 
                join mst_petugas on laporan_inprocess.kd_petugas=mst_petugas.kd_petugas where tanggal BETWEEN '$tgl_awal' AND '$tgl_akhir' ORDER BY tanggal ASC") or die(mysql_error());

//Inisiasi untuk membuat header kolom
$column_tanggal = "";
$column_noengine = "";
$column_jeniskerusakan = "";
$column_namaliniproduksi = "";
$column_tipeengine = "";
$column_jenisperbaikan = "";
$column_jumlah = "";
$column_namapetugas = "";

//For each row, add the field to the corresponding column
while($rows = mysql_fetch_array($result))
{
    $tanggal=$rows['tanggal'];
    $no_engine=$rows['no_engine'];
    $jenis_kerusakan=$rows['jenis_kerusakan'];
    $nama_liniproduksi=$rows['nama_liniproduksi'];
    $tipe_engine=$rows['tipe_engine'];
    $jenis_perbaikan=$rows['jenis_perbaikan'];
    $jumlah=$rows['jumlah'];
    $nama_petugas=$rows['nama_petugas'];
    

	$column_tanggal = $column_tanggal.$tanggal."\n";
    $column_noengine = $column_noengine.$no_engine."\n";
    $column_jeniskerusakan = $column_jeniskerusakan.$jenis_kerusakan."\n";
    $column_namaliniproduksi = $column_namaliniproduksi.$nama_liniproduksi."\n";
    $column_tipeengine = $column_tipeengine.$tipe_engine."\n";
    $column_jenisperbaikan = $column_jenisperbaikan.$jenis_perbaikan."\n";
    $column_jumlah = $column_jumlah.$jumlah."\n";
    $column_namapetugas = $column_namapetugas.$nama_petugas."\n";


//Create a new PDF file
$pdf = new FPDF('L','mm',array(210,297)); //L For Landscape / P For Portrait
$pdf->AddPage();

//Menambahkan Gambar
//$pdf->Image('../foto/logo.png',10,10,-175);

$pdf->SetFont('Arial','B',13);
$pdf->Cell(90);
$pdf->Cell(80,10,'Laporan Kerusakan In Process',0,0,'C');
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
$pdf->Cell(30,8,'No Engine',1,0,'C',1);
$pdf->SetX(60);
$pdf->Cell(80,8,'Jenis Kerusakan',1,0,'C',1);
$pdf->SetX(140);
$pdf->Cell(25,8,'Lini Produksi',1,0,'C',1);
$pdf->SetX(165);
$pdf->Cell(25,8,'Tipe Engine',1,0,'C',1);
$pdf->SetX(190);
$pdf->Cell(35,8,'Jenis Perbaikan',1,0,'C',1);
$pdf->SetX(225);
$pdf->Cell(20,8,'Jumlah',1,0,'C',1);
$pdf->SetX(245);
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
$pdf->MultiCell(30,6,$column_noengine,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(60);
$pdf->MultiCell(80,6,$column_jeniskerusakan,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(140);
$pdf->MultiCell(25,6,$column_namaliniproduksi,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(165);
$pdf->MultiCell(25,6,$column_tipeengine,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(190);
$pdf->MultiCell(35,6,$column_jenisperbaikan,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(225);
$pdf->MultiCell(20,6,$column_jumlah,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(245);
$pdf->MultiCell(30,6,$column_namapetugas,1,'C');

$pdf->Output();
?>
