<?php
	include ("./../database/config.php");
	$id=$_POST['id'];
	$brand = mysqli_real_escape_string($db,$_POST['name']);
    $per = mysqli_real_escape_string($db,$_POST['per']/100);
	$sql = "UPDATE `brand` 
	SET `bname`='$brand', `persb`='$per' WHERE brand_id=$id";
	if (mysqli_query($db, $sql)) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($db);
?>