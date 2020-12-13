<?php
include ("./../database/config.php");

$name =mysqli_real_escape_string($db,$_POST['name']);
$email = mysqli_real_escape_string($db,$_POST['email']);
$phone_no = mysqli_real_escape_string($db,$_POST['phone_no']);

$emailduplicate=mysqli_query($db,"select * from client where email='$email'");
	if (mysqli_num_rows($emailduplicate)>0)
	{
		echo json_encode(array("statusCode"=>201));
	}
	else{
$query="INSERT INTO `client`( `name`,`email`,`phone_no`) 
	VALUES ('$name','$email','$phone_no')";
if (mysqli_query($db, $query)) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
    }
}
   mysqli_close($db);
?>