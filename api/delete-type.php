<?php
    include ("./../database/config.php");

	$id=$_POST['type_id'];
    $sql = "DELETE FROM `type` WHERE type_id=$id";
    

	if (mysqli_query($db, $sql)) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($db);
?>