<?php
include ("./../database/config.php");
$company_id =mysqli_real_escape_string($db,$_POST['company_id']); 
$vehicle_id = mysqli_real_escape_string($db,$_POST['vehicle_id']); 
$value=mysqli_real_escape_string($db,$_POST['finalvalue']);
$date=date('Y-m-d');

$query="INSERT INTO `report` (`company_id`,`vehicle_id`,`final_cost`,`kdate`) 
	VALUES ('".$company_id."','".$vehicle_id."','".$value."','".$date."')";
if (mysqli_query($db, $query)) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
    }
   mysqli_close($db);
?>