<?php
	include ("./../database/config.php");
	session_start();
	if($_POST['type']==1){
		$name=mysqli_real_escape_string($db,$_POST['name']);
        $email=mysqli_real_escape_string($db,$_POST['email']);
        $pwd=md5(mysqli_real_escape_string($db,$_POST['password']));
		$password=$pwd;
		
		$duplicate=mysqli_query($db,"select * from assessor where email='$email'");
		if (mysqli_num_rows($duplicate)>0)
		{
			echo json_encode(array("statusCode"=>201));
		}
		else{
			$sql = "INSERT INTO `assessor`( `name`, `email`, `password`) 
			VALUES ('$name','$email','$password')";
			if (mysqli_query($db, $sql)) {
				echo json_encode(array("statusCode"=>200));
			} 
			else {
				echo json_encode(array("statusCode"=>201));
			}
		}
		mysqli_close($db);
	}
	if($_POST['type']==2){
        $email=mysqli_real_escape_string($db,$_POST['email']);
        $pwd=mysqli_real_escape_string($db,md5($_POST['password']));
		$password=$pwd;
		//Check assessor status
		$check=mysqli_query($db,"select * from assessor where email='$email' and password='$password' AND status =1");
		if (mysqli_num_rows($check)>0)
		{
            $_SESSION['email']=$email;
            session_regenerate_id();
                $_SESSION['loggedin'] = TRUE;
                // $_SESSION['assessor_id'] = $assessor_id;
			echo json_encode(array("statusCode"=>200));
		}
		else{
			echo json_encode(array("statusCode"=>201));
		}
		
		mysqli_close($db);
	}
?>