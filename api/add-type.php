<?php
include ("./../database/config.php");

$type =mysqli_real_escape_string($db,$_POST['name']);
$pers = mysqli_real_escape_string($db,$_POST['per']/100);
$typeduplicate=mysqli_query($db,"select * from type where name='$type'");
	if (mysqli_num_rows($typeduplicate)>0)
	{
		echo json_encode(array("statusCode"=>201));
	}
	else{
$query="INSERT INTO `type`( `tname`,`tper`) 
	VALUES ('$type','$pers')";
if (mysqli_query($db, $query)) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
    }
}
   mysqli_close($db);
?>