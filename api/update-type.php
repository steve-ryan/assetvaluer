<?php
	include ("./../database/config.php");
	$id=$_POST['id'];
	$type =mysqli_real_escape_string($db,$_POST['name']);
    $pers = mysqli_real_escape_string($db,$_POST['per']);
	$sql = "UPDATE `type` 
	SET `name`='$type', `per`='$pers' WHERE type_id=$id";
	if (mysqli_query($db, $sql)) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($db);
?>