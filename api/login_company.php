<?php
	include ("./../database/config.php");
	session_start();
	// company register
	if($_POST['type']==1){
		$name=mysqli_real_escape_string($db,$_POST['name']);
        $email=mysqli_real_escape_string($db,$_POST['email']);
        $pwd=md5(mysqli_real_escape_string($db,$_POST['password']));
		$password=$pwd;
		
		$duplicate=mysqli_query($db,"select * from company where email='$email'");
		if (mysqli_num_rows($duplicate)>0)
		{
			echo json_encode(array("statusCode"=>201));
		}
		else{
			$sql = "INSERT INTO `company`( `company_name`, `email`, `password`) 
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

	//company login
	if($_POST['type']==2){
		if($stmt = $db->prepare('SELECT password,company_name,company_id FROM company WHERE email = ?')){
			$stmt->bind_param('s',$_POST['email']);
			$stmt->execute();
			//	store result so we can check if account exist
			$stmt->store_result();
			if($stmt->num_rows > 0){
				$stmt->bind_result($password,$name,$company_id);
				$stmt->fetch();

				if((md5($_POST['password']) == $password)){
				session_regenerate_id();
				$_SESSION['loggedin'] = TRUE;
				$_SESSION['cname'] = $name;
				$_SESSION['email']=$_POST['email'];
				$_SESSION['cid'] = $company_id;
				echo json_encode(array("statusCode"=>200));
				}
				else{
					echo json_encode(array("statusCode"=>201));
				}
			}
			$stmt->close();

		}
	}
    


	// Admin login
	if($_POST['type']==3){
        if($stmt = $db->prepare('SELECT password,company_name,company_id FROM company WHERE email = ?')){
			$stmt->bind_param('s',$_POST['email']);
			$stmt->execute();
			//	store result so we can check if account exist
			$stmt->store_result();
			if($stmt->num_rows > 0){
				$stmt->bind_result($password,$company_name,$company_id);
				$stmt->fetch();

				if((md5($_POST['password']) == $password)){
				session_regenerate_id();
				$_SESSION['loggedin'] = TRUE;
				$_SESSION['cname'] = $company_name;
				$_SESSION['email']=$_POST['email'];
				$_SESSION['cid'] = $company_id;
				echo json_encode(array("statusCode"=>200));
				}
				else{
					echo json_encode(array("statusCode"=>201));
				}
			}
			$stmt->close();

		}
	}
 ?>