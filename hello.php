<?php
//include connection file 
// include_once("./database/connection.php");
include_once("./database/config.php");
include_once('fpdf.php');

class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    // $this->Image('logo.png',10,-1,70);
    
    
    $this->SetFont('Arial','B',13);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(80,10,'Vehicle Report',1,0,'C');
    // Line break
    $this->Ln(25);


        /* Colors, line width and bold font */
		$this->SetFillColor(69, 171, 82);
		$this->SetTextColor(255);
		$this->SetDrawColor(209, 212, 255);
		$this->SetLineWidth(.3);
		$this->SetFont('','B');

		$this->Cell(95,5,'Picture',1,0,'',true);   
		$this->Cell(15,5,'Model',1,0,'',true);
		$this->Cell(25,5,'Cost',1,0,'',true);
        $this->Cell(30,5,'YOM',1,1,'',true);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

$pdf = new PDF();
//header
$pdf->AddPage();
//foter page
$pdf->AliasNbPages();
$pdf->SetFont('Arial','B',12);

//fetch query
$query = mysqli_query($db,"SELECT vehicle_id, model, cost,yom,picture FROM `vehicle` WHERE vehicle_id='40'");
while($data=mysqli_fetch_array($query)){
	$pdf->Cell(95,5,$data['picture'],'LR',0);
	$pdf->Cell(15,5,$data['model'],'LR',0);
	$pdf->Cell(25,5,$data['cost'],'LR',0);
    $pdf->Cell(30,5,$data['yom'],'LR',1);
    
}
$pdf->Output();
?>
    