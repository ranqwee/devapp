<?php
include "connect.php";
$id='';
if(ISSET($_GET['id']))
{
	$id=$_GET['id'];
}
require('fpdf17/fpdf.php');

//Menampilkan data dari tabel di database
$filter=$_GET['tcari'];

$result=mysql_query("SELECT * FROM order_pemesanan JOIN op ON order_pemesanan.nop = op.nop JOIN ms_brg ON order_pemesanan.kode_brg = ms_brg.kode_brg
WHERE $id LIKE '%' '$filter' or tgl_op LIKE '%' '$filter' ORDER BY nop ASC"); 

//Inisiasi untuk membuat header kolom
$column_filter = "";
$column_nop = "";
$column_tgl_op = "";
$column_kode_brg = "";
$column_nama_brg = "";
$column_mata_uang = "";
$column_harga_brg = "";
$column_qty = "";
$column_jml_order = "";
$column_ktrgn_order = "";
$column_waktu_kirim = "";


//For each row, add the field to the corresponding column
while($rows = mysql_fetch_array($result))
{
	$filter=$_GET['tcari'];
    $nop=$rows['nop'];
    $tgl_op=$rows['tgl_op'];
	$kode_brg=$rows['kode_brg'];
	$nama_brg=$rows['nama_brg'];
	$mata_uang=$rows['mata_uang'];
	$harga_brg=$rows['harga_brg'];
    $qty=$rows['qty'];
    $jml_order=$rows['jml_order'];
    $ktrgn_order=$rows['ktrgn_order'];
	$waktu_kirim=$rows['waktu_kirim'];
    
	$column_filter = $column_filter.$filter. "\n";
	$column_nop = $column_nop.$nop."\n";
    $column_tgl_op = $column_tgl_op.$tgl_op."\n";
	$column_kode_brg = $column_kode.$kode_brg. "\n";
	$column_nama_brg = $column_nama_brg.$nama_brg. "\n";
	$column_mata_uang = $column_mata_uang.$mata_uang."\n";
    $column_harga_brg = $column_harga_brg.$harga_brg."\n";
    $column_qty = $column_qty.$qty."\n";
    $column_jml_order = $column_jml_order.$jml_order."\n";
	$column_ktrgn_order = $column_ktrgn_order.$ktrgn_order."\n";
	$column_waktu_kirim = $column_waktu_kirim.$waktu_kirim."\n";
    


//Create a new PDF file
$pdf = new FPDF('L','mm',array(210,450)); //L For Landscape / P For Portrait
$pdf->AddPage();

//Menambahkan Gambar

$pdf->Image('images/apapk.png',5,10,-85);
$pdf->SetFont('Arial','B',23);
$pdf->Cell(200);
$pdf->Cell(80,10,'Purchasing Order',0,0,'C');
$pdf->Ln();
$pdf->SetFont('Arial','B',13);
$pdf->Cell(200);
$pdf->Cell(80,10,'PT AI UD',0,0,'C');
$pdf->Ln();

}
//Fields Name position
$Y_Fields_Filter_position = 30;

//First create each Field Name
//Gray color filling each Field Name box
$pdf->SetFillColor(110,180,360);
//Bold Font for Field Name
$pdf->SetFont('Arial','B',10);
$pdf->SetY($Y_Fields_Filter_position);
$pdf->SetX(5);
$pdf->Cell(545,8,'Filter Berdasarkan	:',1,0,'L',1);

$pdf->SetY($Y_Fields_Filter_position);
$pdf->SetX(50);
$pdf->Cell(30,8,$column_filter,2,'C');
//Fields Name position
$Y_Fields_Name_position = 38;

//First create each Field Name
//Gray color filling each Field Name box
$pdf->SetFillColor(110,180,360);
//Bold Font for Field Name
$pdf->SetFont('Arial','B',10);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(5);
$pdf->Cell(35,8,'No OP',1,0,'C',1);
$pdf->SetX(40);
$pdf->Cell(30,8,'Tanggal Order',1,0,'C',1);
$pdf->SetX(70);
$pdf->Cell(40,8,'Kode Barang',1,0,'C',1);
$pdf->SetX(110);
$pdf->Cell(50,8,'Nama Barang',1,0,'C',1);
$pdf->SetX(160);
$pdf->Cell(80,8,'Keterangan Order',1,0,'C',1);
$pdf->SetX(240);
$pdf->Cell(30,8,'Waktu Kirim',1,0,'C',1);
$pdf->SetX(270);
$pdf->Cell(20,8,'QTY',1,0,'C',1);
$pdf->SetX(290);
$pdf->Cell(20,8,'Mata Uang',1,0,'C',1);
$pdf->SetX(310);
$pdf->Cell(60,8,'Harga Barang',1,0,'C',1);
$pdf->SetX(370);
$pdf->Cell(60,8,'Jumlah',1,0,'C',1);
$pdf->Ln();

//Table position, under Fields Name
$Y_Table_Position = 46;

//Now show the columns
$pdf->SetFont('Arial','',10);

$pdf->SetY($Y_Table_Position);
$pdf->SetX(5);
$pdf->MultiCell(35,6,$column_nop,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(40);
$pdf->MultiCell(30,6,$column_tgl_op,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(70);
$pdf->MultiCell(40,6,$column_kode_brg,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(110);
$pdf->MultiCell(50,6,$column_nama_brg,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(160);
$pdf->MultiCell(80,6,$column_ktrgn_order,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(240);
$pdf->MultiCell(30,6,$column_waktu_kirim,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(270);
$pdf->MultiCell(20,6,$column_qty,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(290);
$pdf->MultiCell(20,6,$mata_uang,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(310);
$pdf->MultiCell(60,6,$column_harga_brg,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(370);
$pdf->MultiCell(60,6,$column_jml_order,1,'C');

$pdf->Output();
?>
