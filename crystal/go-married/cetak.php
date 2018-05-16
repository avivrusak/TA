<?php

//sertakan library fpdf
require_once ("fpdf/fpdf.php");
$pdf = new FPDF();
$pdf->AddPage();

//koneksi ke database
$host = "localhost"; 
$user = "root"; 
$pass = ""; 
$dbnm = "tpu"; 
  
$conn = mysqli_connect($host, $user, $pass,$dbnm);
    if (!$conn) {
        die("Koneksi Gagal: " . mysqli_connect_error());
    }else
        echo "";
//akhir koneksi
//Query
$query = "SELECT * FROM `data_ahli_waris`
            JOIN `data_jenazah` ON data_ahli_waris.ID_JENAZAH=data_jenazah.ID_JENAZAH
            JOIN `data_lokasi_tpu` ON data_ahli_waris.ID_TPU=data_lokasi_tpu.ID_TPU
            ORDER BY data_ahli_waris.ID_AHLI_WARIS DESC
            LIMIT 1";
$sql = mysqli_query ($conn, $query);
$data = array(); 
while ($row = mysqli_fetch_assoc($sql)) { 
    array_push($data, $row); 
}

//akhir Query

$header = array( 
    array("label"=>"FORMULIR PENCATATAN PEMAKAMAN", "length"=>0, "align"=>"C"),
    array("label"=>"DINAS KEBERSIHAN dan RUANG TERBUKA HIJAU Kota SURABAYA", "length"=>0, "align"=>"C")
);

$pdf->SetFont('Arial','B','12');
$pdf->SetFillColor(255);
$pdf->SetTextColor(0,0,0);
$pdf->SetDrawColor(255);
foreach ($header as $kolom) {
    $pdf->Cell($kolom['length'], 5, $kolom['label'], 1, '0', $kolom['align'], true);
    $pdf->Ln();
}

$header = array( 
    array("label"=>"email: go-married@gmail.com fax: 0317998678 web: http://go-married.com/", "length"=>0, "align"=>"C")
);

$pdf->SetFont('Arial','I','10');
$pdf->SetFillColor(255);
$pdf->SetTextColor(0,0,0);
$pdf->SetDrawColor(255);
foreach ($header as $kolom) {
    $pdf->Cell($kolom['length'], 5, $kolom['label'], 1, '0', $kolom['align'], true);
    $pdf->Ln();
}


$pdf->SetDrawColor(0,0,0);
$pdf->Cell(0,1, "", 1, 0, 'C');
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();

$header = array( 
    array("label"=>"", "length"=>15, "align"=>"L"),
    array("label"=>"", "length"=>55, "align"=>""),
    array("label"=>"", "length"=>60, "align"=>"C"),
    array("label"=>"", "length"=>60, "align"=>"C")
);

$pdf->SetFont('Arial','I','9');
$pdf->SetFillColor(255);
$pdf->SetTextColor(0,0,0);
$pdf->SetDrawColor(255);
$pdf->Cell(53,5, "I. Biodata Ahli Waris", 1, '0', 'L');
$pdf->Ln();
foreach ($header as $kolom) {
    $pdf->Cell($kolom['length'], 5, $kolom['label'], 1, '0', $kolom['align'], true);
}
$pdf->Ln();
$pdf->Ln();


foreach ($data as $baris) {
	$i=0;
    $pdf->SetFont('Arial','','10');
    $pdf->Cell(7,5, "", 1, '0', 'C');
    $pdf->Cell(8,5, "1.", 1, '0', 'C');
    $pdf->Cell(53,5, "Nama", 1, '0', 'L');
    $pdf->Cell(2,5, ":", 1, '0', 'L');
    $pdf->Cell(60,5, $baris["nama_ahli_waris"], 1, '0', 'L');
   

    $pdf->Ln();
    $pdf->Cell(7,5, "", 1, '0', 'C');
    $pdf->Cell(8,5, "2.", 1, '0', 'C');
    $pdf->Cell(53,5, "Tempat, Tanggal Lahir", 1, '0', 'L');
    $pdf->Cell(2,5, ":", 1, '0', 'L');
    $pdf->Cell(60,5, $baris["tempat_lahir_w"].", ".date("d F Y", strtotime($baris["tanggal_lahir_w"]))."", 1, '0', 'L');


    
    $pdf->Ln();
    $pdf->Cell(7,5, "", 1, '0', 'C');
    $pdf->Cell(8,5, "3.", 1, '0', 'C');
    $pdf->Cell(53,5, "Alamat", 1, '0', 'L');
    $pdf->Cell(2,5, ":", 1, '0', 'L');
    $pdf->Cell(60,5, $baris["alamat_w"], 1, '0', 'L');

    $pdf->Ln();
    $pdf->Cell(7,5, "", 1, '0', 'C');
    $pdf->Cell(8,5, "4.", 1, '0', 'C');
    $pdf->Cell(53,5, "No Telepon", 1, '0', 'L');
    $pdf->Cell(2,5, ":", 1, '0', 'L');
    $pdf->Cell(60,5, $baris["no_telp"], 1, '0', 'L');
    

    $pdf->Ln();
    $pdf->Cell(7,5, "", 1, '0', 'C');
    $pdf->Cell(8,5, "5.", 1, '0', 'C');
    $pdf->Cell(53,5, "Jenis Kelamin", 1, '0', 'L');
    $pdf->Cell(2,5, ":", 1, '0', 'L');
    $pdf->Cell(60,5, $baris["jenis_kelamin_w"], 1, '0', 'L');
    
   

    $pdf->Ln();
    $pdf->Cell(7,5, "", 1, '0', 'C');
    $pdf->Cell(8,5, "6.", 1, '0', 'C');
    $pdf->Cell(53,5, "Tanggal Sewa", 1, '0', 'L');
    $pdf->Cell(2,5, ":", 1, '0', 'L');
    $pdf->Cell(60,5, date("d F Y"), 1, '0', 'L');
   
 
    
    
    
    $pdf->Ln();
}


$header2 = array( 
    array("label"=>"", "length"=>15, "align"=>"L"),
    array("label"=>"", "length"=>55, "align"=>""),
    array("label"=>"", "length"=>60, "align"=>"C"),
    array("label"=>"", "length"=>60, "align"=>"C")
);

$pdf->SetFont('Arial','I','9');
$pdf->SetFillColor(255);
$pdf->SetTextColor(0,0,0);
$pdf->SetDrawColor(255);
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(53,5, "II. Biodata Jenazah", 1, '0', 'L');
$pdf->Ln();
foreach ($header2 as $kolom) {
    $pdf->Cell($kolom['length'], 5, $kolom['label'], 1, '0', $kolom['align'], true);
}
$pdf->Ln();
$pdf->Ln();

foreach ($data as $baris) {
	$i=0;
    $pdf->SetFont('Arial','','10');
    $pdf->Cell(7,5, "", 1, '0', 'C');
    $pdf->Cell(8,5, "1.", 1, '0', 'C');
    $pdf->Cell(53,5, "Nama", 1, '0', 'L');
    $pdf->Cell(2,5, ":", 1, '0', 'L');
    $pdf->Cell(60,5, $baris["nama_jenazah"], 1, '0', 'L');
    
    $pdf->Ln();
    $pdf->Cell(7,5, "", 1, '0', 'C');
    $pdf->Cell(8,5, "2.", 1, '0', 'C');
    $pdf->Cell(53,5, "Alamat", 1, '0', 'L');
    $pdf->Cell(2,5, ":", 1, '0', 'L');
    $pdf->Cell(60,5, $baris["alamat"], 1, '0', 'L');

    $pdf->Ln();
    $pdf->Cell(7,5, "", 1, '0', 'C');
    $pdf->Cell(8,5, "3.", 1, '0', 'C');
    $pdf->Cell(53,5, "Tempat Lahir", 1, '0', 'L');
    $pdf->Cell(2,5, ":", 1, '0', 'L');
    $pdf->Cell(60,5, $baris["tempat_lahir"], 1, '0', 'L');
    
    $pdf->Ln();
    $pdf->Cell(7,5, "", 1, '0', 'C');
    $pdf->Cell(8,5, "4.", 1, '0', 'C');
    $pdf->Cell(53,5, "Tanggal lahir", 1, '0', 'L');
    $pdf->Cell(2,5, ":", 1, '0', 'L');
    $pdf->Cell(60,5, $baris["tanggal_lahir"], 1, '0', 'L');


    $pdf->Ln();
    $pdf->Cell(7,5, "", 1, '0', 'C');
    $pdf->Cell(8,5, "5.", 1, '0', 'C');
    $pdf->Cell(53,5, "Jenis Kelamin", 1, '0', 'L');
    $pdf->Cell(2,5, ":", 1, '0', 'L');
    $pdf->Cell(60,5, $baris["jenis_kelamin"], 1, '0', 'L');

   

    $pdf->Ln();
}


$header3 = array( 
    array("label"=>"", "length"=>15, "align"=>"L"),
    array("label"=>"", "length"=>55, "align"=>""),
    array("label"=>"", "length"=>60, "align"=>"C"),
    array("label"=>"", "length"=>60, "align"=>"C")
);

$pdf->SetFont('Arial','I','9');
$pdf->SetFillColor(255);
$pdf->SetTextColor(0,0,0);
$pdf->SetDrawColor(255);
$pdf->Ln();
$pdf->Ln();
$pdf->Cell(53,5, "III. Detail Pemesanan Makam", 1, '0', 'L');
$pdf->Ln();
foreach ($header3 as $kolom) {
    $pdf->Cell($kolom['length'], 5, $kolom['label'], 1, '0', $kolom['align'], true);
}
$pdf->Ln();
$pdf->Ln();

foreach ($data as $baris) {
    $i=0;
    $pdf->SetFont('Arial','','10');
    $pdf->Cell(7,5, "", 1, '0', 'C');
    $pdf->Cell(8,5, "1.", 1, '0', 'C');
    $pdf->Cell(53,5, "Nama Pemakaman", 1, '0', 'L');
    $pdf->Cell(2,5, ":", 1, '0', 'L');
    $pdf->Cell(60,5, $baris["nama_lokasi"], 1, '0', 'L');
 
    $pdf->Ln();
    $pdf->Cell(7,5, "", 1, '0', 'C');
    $pdf->Cell(8,5, "2.", 1, '0', 'C');
    $pdf->Cell(53,5, "Alamat Makam", 1, '0', 'L');
    $pdf->Cell(2,5, ":", 1, '0', 'L');
    $pdf->Cell(60,5, $baris["alamat_lokasi"], 1, '0', 'L');   
 
    $pdf->Ln();
}


$header5 = array( 
    array("label"=>"", "length"=>5, "align"=>"L"),
    array("label"=>"*) lampirkan fotocopy akta Kematian", "length"=>65, "align"=>""),
    array("label"=>"", "length"=>50, "align"=>"C"),
    array("label"=>"Surabaya, ".date("d F Y"), "length"=>70, "align"=>"L")
);

$pdf->SetFont('Arial','I','9');
$pdf->SetFillColor(255);
$pdf->SetTextColor(0,0,0);
$pdf->SetDrawColor(255);
$pdf->Ln();
$pdf->Ln();

foreach ($header5 as $kolom) {
    $pdf->Cell($kolom['length'], 2, $kolom['label'], 1, '0', $kolom['align'], true);
}

$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();



$header6 = array( 
    array("label"=>"", "length"=>5, "align"=>"L"),
    array("label"=>"", "length"=>65, "align"=>""),
    array("label"=>"", "length"=>50, "align"=>"C"),
    array("label"=>"Pemohon,", "length"=>70, "align"=>"C")
);

$pdf->SetFont('Arial','I','9');
$pdf->SetFillColor(255);
$pdf->SetTextColor(0,0,0);
$pdf->SetDrawColor(255);
$pdf->Ln();
$pdf->Ln();

foreach ($header6 as $kolom) {
    $pdf->Cell($kolom['length'], 2, $kolom['label'], 1, '0', $kolom['align'], true);
}

foreach ($data as $baris) {

	$pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();
    $pdf->Ln();
    $pdf->SetFont('Arial','','10');
    $pdf->Cell(7,5, "", 1, '0', 'C');
    $pdf->Cell(8,5, "", 1, '0', 'C');
    $pdf->Cell(53,5, "", 1, '0', 'L');
    $pdf->Cell(2,5, "", 1, '0', 'L');
    $pdf->Cell(60,5, "", 1, '0', 'L');
    $pdf->Cell(60,5, $baris["nama_ahli_waris"], 1, '0', 'C');


}


$pdf->Output(); 

?>