<?php
include_once("./../database/config.php");
require ("./../includes/company-check.php");
$cid=$_SESSION['cid'];
require("./../fpdf182/fpdf.php");
$date=date('Y-m-d');


$vehicle=mysqli_real_escape_string($db,$_GET['id']);
if(!is_numeric($vehicle)){ // Checking data it is a number or not
echo "Data Error";    
exit;
}

$pdf = new FPDF();

//Image
$result =mysqli_query($db,"SELECT picture FROM vehicle WHERE vehicle_id='$vehicle' AND company_id='$cid'");

//get row
$row = mysqli_fetch_row($result);
$imagePath = $row[0];


$pdf->AddPage();

$pdf->SetFillColor(69, 171, 82);
$pdf->SetDrawColor(209, 212, 255);
$pdf->SetFont('Arial', '', 12);


$query = mysqli_query($db,"SELECT distinct r.vehicle_id, c.name AS owner,r.final_cost AS value,MAX(r.kdate) AS kdate,r.company_id,v.reg_no,v.yom,k.name AS conditionname,
ac.name AS accident, v.chassis_no,v.model,v.cost,b.bname AS bname,
t.tname as tname,a.name AS aname FROM report r
JOIN vehicle as v ON r.vehicle_id = v.vehicle_id
JOIN assessor as a ON v.assessor_id = a.assessor_id 
JOIN kondition  as k ON v.condition_id = k.condition_id 
JOIN accident_status as ac ON v.acc_id = ac.acc_id 
JOIN brand as b ON v.brand_id = b.brand_id 
JOIN type as t ON v.type_id = t.type_id 
JOIN client as c ON v.client_id = c.client_id WHERE r.vehicle_id='$vehicle' AND r.company_id='$cid'");
while($data=mysqli_fetch_array($query)){
$pdf->Cell(80,10,'Report For Vehicle ::'.$data['reg_no'],1,1,'C',true);

$pdf->Ln(10);

$pdf->Cell(55, 5, 'Registration No::', 0, 0);
$pdf->Cell(58, 5,  $data['reg_no'], 0, 0);
$pdf->Cell(25, 5, 'Date::', 0, 0);
$pdf->Cell(52, 5, $data['kdate'], 0, 1);

$pdf->Cell(55, 5, 'Brand::', 0, 0);
$pdf->Cell(58, 5, $data['bname'], 0, 0);
$pdf->Cell(25, 5, 'Chassis No::', 0, 0);
$pdf->Cell(52, 5, $data['chassis_no'], 0, 1);

$pdf->Cell(55, 5, 'Model::', 0, 0);
$pdf->Cell(58, 5, $data['model'], 0, 0);
$pdf->Cell(25, 5, 'Type::', 0, 0);
$pdf->Cell(52, 5, $data['tname'], 0, 1);

$pdf->Line(10, 30, 200, 30);

$pdf->Ln(10);
$pdf->Cell(55, 5, 'Final Value::', 0, 0);
$pdf->Cell(58, 5, $data['value'], 0, 1);


$pdf->Cell(55, 5, 'YOM::', 0, 0);
$pdf->Cell(58, 5, $data['yom'], 0, 1);

$pdf->Cell(55, 5, 'Intial Cost::', 0, 0);
$pdf->Cell(58, 5, $data['cost'], 0, 1);

$pdf->Cell(55, 5, 'Car Condition::', 0, 0);
$pdf->Cell(58, 5, $data['conditionname'], 0, 1);

$pdf->Cell(55, 5, 'Accident Status::', 0, 0);
$pdf->Cell(58, 5, $data['accident'], 0, 1);

$pdf->Line(10, 60, 200, 60);

$pdf->Ln(10);//Line break
$pdf->Cell(55, 5, 'Assessed by::', 0, 0);
$pdf->Cell(58, 5, $data['aname'], 0, 1);


$pdf->Line(10, 60, 200, 60);
$pdf->Ln(5);//Line break

$pdf->Cell(55, 5, 'Owned by:: ', 0, 0);
$pdf->Cell(58, 5, $data['owner'], 0, 1);

$pdf->Line(155, 75, 195, 75);
$pdf->Ln(5);//Line break
$pdf->Image("$imagePath",130,60,70);


$message = "Thank you for doing your evaluation with AssetEvaluater"; 
$pdf->MultiCell(0, 15, $message);

$reg = $data['reg_no'].$data['kdate'];
}
$reg = $data['reg_no'].$data['kdate'];

$pdf->Output();
$pdf->Output($reg.'.pdf','D');

?>