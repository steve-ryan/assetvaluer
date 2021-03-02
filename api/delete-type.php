<?php
    include ("./../database/config.php");

	$tid=mysqli_real_escape_string($db,$_POST['type_id']);
    $sql = "DELETE FROM `type` WHERE type_id=$tid";
    

	if (mysqli_query($db, $sql)) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($db);
?>