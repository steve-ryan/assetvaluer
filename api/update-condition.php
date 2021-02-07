<?php
	include ("./../database/config.php");
	$id=$_POST['id'];
	$condition = mysqli_real_escape_string($db,$_POST['name']);
    $per = mysqli_real_escape_string($db,$_POST['per']/100);
	$sql = "UPDATE `kondition` 
	SET `name`='$condition', `pers`='$per' WHERE condition_id=$id";
	if (mysqli_query($db, $sql)) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($db);
?>