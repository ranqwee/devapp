<?php
include "connect.php";
require('fpdf17/fpdf.php');

//Menampilkan data dari tabel di database
$tgl_awal=$_GET['dt1cari'];
$tgl_akhir=$_GET['dt2cari'];
$result=mysql_query("SELECT * FROM pemeliharaan JOIN ms_mesin on pemeliharaan.id_mesin = ms_mesin.id_mesin JOIN ms_shop on pemeliharaan.id_shop = ms_shop.id_shop
			JOIN ms_personil on pemeliharaan.id_personil = ms_personil.id_personil where 
                tgl BETWEEN '$tgl_awal' AND '$tgl_akhir' ORDER BY tgl ASC"); 

//Inisiasi untuk membuat header kolom
$column_id_pemeliharaan = "";
$column_id_joborder = "";
$column_nama_personil = "";
$column_shift = "";
$column_jam = "";
$column_job = "";
$column_material = "";
$column_nama_mesin = "";
$column_nama_shop = "";
$column_job_type = "";
$column_job_status = "";

//For each row, add the field to the corresponding column
while($rows = mysql_fetch_array($result))
{
    $id_pemeliharaan=$rows['id_pemeliharaan'];
    $id_joborder=$rows['id_joborder'];
    $nama_personil=$rows['nama_personil'];
    $shift=$rows['shift'];
    $jam=$rows['jam'];
    $job=$rows['job'];
    $material=$rows['material'];
	 $nama_mesin=$rows['nama_mesin'];
	  $nama_shop=$rows['nama_shop'];
	   $job_type=$rows['job_type'];
	    $job_status=$rows['job_status'];
    

	$column_id_pemeliharaan = $column_id_pemeliharaan.$id_pemeliharaan."\n";
    $column_id_joborder = $column_id_joborder.$id_joborder."\n";
    $column_nama_personil = $column_nama_personil.$nama_personil."\n";
    $column_shift = $column_shift.$shift."\n";
    $column_jam = $column_jam.$jam."\n";
    $column_job = $column_job.$job."\n";
    $column_material = $column_material.$material."\n";
	$column_nama_mesin = $column_nama_mesin.$nama_mesin."\n";
	$column_nama_shop = $column_nama_shop.$nama_shop."\n";
	$column_job_type = $column_job_type.$job_type."\n";
	$column_job_status = $column_job_status.$job_status."\n";


//Create a new PDF file
$pdf = new FPDF('L','mm',array(210,395)); //L For Landscape / P For Portrait
$pdf->AddPage();

//Menambahkan Gambar
//$pdf->Image('..images/logo.png',10,10,-175);

$pdf->SetFont('Arial','B',25);
$pdf->Cell(150);
$pdf->Cell(80,10,'Laporan Hasil Pemeliharaan',0,0,'C');
$pdf->Ln();
$pdf->SetFont('Arial','B',13);
$pdf->Cell(150);
$pdf->Cell(80,10,'PT Topjaya Antariksa Electronics',0,0,'C');
$pdf->Ln();


$pdf->Cell(80);
$pdf->Cell(100,10,'',0,0,'C');
$pdf->Ln();

}
//Fields Name position
$Y_Fields_Name_position = 30;

//First create each Field Name
//Gray color filling each Field Name box
$pdf->SetFillColor(110,180,360);
//Bold Font for Field Name
$pdf->SetFont('Arial','B',10);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(5);
$pdf->Cell(35,8,'ID Pemeliharaan',1,0,'C',1);
$pdf->SetX(40);
$pdf->Cell(30,8,'ID Job Order',1,0,'C',1);
$pdf->SetX(70);
$pdf->Cell(40,8,'Nama Personil',1,0,'C',1);
$pdf->SetX(110);
$pdf->Cell(25,8,'Shift',1,0,'C',1);
$pdf->SetX(135);
$pdf->Cell(25,8,'Jam',1,0,'C',1);
$pdf->SetX(160);
$pdf->Cell(60,8,'Job',1,0,'C',1);
$pdf->SetX(220);
$pdf->Cell(40,8,'Material',1,0,'C',1);
$pdf->SetX(260);
$pdf->Cell(40,8,'Nama Mesin',1,0,'C',1);
$pdf->SetX(300);
$pdf->Cell(30,8,'Shop',1,0,'C',1);
$pdf->SetX(330);
$pdf->Cell(30,8,'Job Type',1,0,'C',1);
$pdf->SetX(360);
$pdf->Cell(30,8,'Job Status',1,0,'C',1);
$pdf->Ln();

//Table position, under Fields Name
$Y_Table_Position = 38;

//Now show the columns
$pdf->SetFont('Arial','',10);

$pdf->SetY($Y_Table_Position);
$pdf->SetX(5);
$pdf->MultiCell(35,6,$column_id_pemeliharaan,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(40);
$pdf->MultiCell(30,6,$column_id_joborder,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(70);
$pdf->MultiCell(40,6,$column_nama_personil,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(110);
$pdf->MultiCell(25,6,$column_shift,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(135);
$pdf->MultiCell(25,6,$column_jam,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(160);
$pdf->MultiCell(60,6,$column_job,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(220);
$pdf->MultiCell(40,6,$column_material,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(260);
$pdf->MultiCell(40,6,$column_nama_mesin,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(300);
$pdf->MultiCell(30,6,$column_nama_shop,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(330);
$pdf->MultiCell(30,6,$column_job_type,1,'C');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(360);
$pdf->MultiCell(30,6,$column_job_status,1,'C');

$pdf->Output();
?>
