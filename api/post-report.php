<?php
include ("./../database/config.php");
$value=$_POST['finalvalue'];
$vehicle=$_POST['vehicle_id'];
$query="INSERT INTO `report`( `date`,`value`,`vehicle_id`) 
	VALUES (NOW(),'$value','$vehicle')";
if (mysqli_query($db, $query)) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
    }

   mysqli_close($db);
?>