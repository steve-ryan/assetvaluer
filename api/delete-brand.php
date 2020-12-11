 <?php
    include ("./../database/config.php");

	$id=$_POST['brand_id'];
    $sql = "DELETE FROM `brand` WHERE brand_id=$id";
    

	if (mysqli_query($db, $sql)) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($db);
?>