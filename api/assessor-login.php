<?php
include ("./../database/config.php");
    session_start();
if($_POST['type']==2){
        $email=mysqli_real_escape_string($db,$_POST['email-l']);
        $pwd=mysqli_real_escape_string($db,md5($_POST['password-l']));
		$password=$pwd;
		$check=mysqli_query($db,"select * from assessor where email='$email' and password='$password'");
		if (mysqli_num_rows($check)>0)
		{
            $_SESSION['email']=$email;
            session_regenerate_id();
                $_SESSION['loggedin'] = TRUE;
                $_SESSION['assessor_id'] = $assessor_id;
			echo json_encode(array("statusCode"=>200));
		}
		else{
			echo json_encode(array("statusCode"=>201));
		}
		mysqli_close($db);
	}


    ?>