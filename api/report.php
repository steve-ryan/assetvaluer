<?php
include_once("./../database/config.php");
require("./../fpdf182/fpdf.php");
$value=mysqli_real_escape_string($db,$_POST['finalvalue']);
$vehicle=mysqli_real_escape_string($db,$_POST['sel_reg']);
$date=date('Y-m-d');


$pdf = new FPDF();

//Image
$result =mysqli_query($db,"SELECT picture FROM vehicle WHERE vehicle_id='$vehicle'");

//get row
$row = mysqli_fetch_row($result);
$imagePath = $row[0];


$pdf->AddPage();

$pdf->SetFillColor(69, 171, 82);
$pdf->SetDrawColor(209, 212, 255);
$pdf->SetFont('Arial', '', 12);


$query = mysqli_query($db,"SELECT c.name AS owner,v.reg_no,v.yom,k.name AS conditionname,ac.name AS accident, v.chassis_no,v.model,v.cost,b.name AS bname,t.name as tname,a.name AS aname FROM vehicle as v JOIN assessor as a ON v.assessor_id = a.assessor_id JOIN kondition  as k ON v.condition_id = k.condition_id JOIN accident_status as ac ON v.acc_id = ac.acc_id JOIN brand as b ON v.brand_id = b.brand_id JOIN type as t ON v.type_id = t.type_id JOIN client as c ON v.client_id = c.client_id WHERE v.vehicle_id='$vehicle'");
while($data=mysqli_fetch_array($query)){
$pdf->Cell(80,10,'Report For Vehicle ::'.$data['reg_no'],1,1,'C',true);

$pdf->Ln(10);

$pdf->Cell(55, 5, 'Registration No::', 0, 0);
$pdf->Cell(58, 5,  $data['reg_no'], 0, 0);
$pdf->Cell(25, 5, 'Date::', 0, 0);
$pdf->Cell(52, 5, $date, 0, 1);

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
$pdf->Cell(58, 5, $value, 0, 1);


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

$reg = $data['reg_no'].$date;
}
$reg = $data['reg_no'].$date;

$pdf->Output();
$pdf->Output($reg.'.pdf','D');

?>