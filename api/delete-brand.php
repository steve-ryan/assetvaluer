 <?php
    include ("./../database/config.php");

	$bid=mysqli_real_escape_string($db,$_POST['brand_id']);
    $sql = "DELETE FROM `brand` WHERE brand_id=$bid";
    

	if (mysqli_query($db, $sql)) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($db);
?>