<?php 
include ("./../database/config.php");


$valid_extensions = array('jpeg', 'jpg', 'png'); // valid extensions
$path = './../uploads/'; // upload directory

if(!empty($_POST['client1']) || !empty($_POST['brand']) ||!empty($_POST['type']) || !empty($_POST['model'])|| $_FILES['picture'])
{
$img = $_FILES['picture']['name']; // stores the original filename from the client
$tmp = $_FILES['picture']['tmp_name']; //stores the name of the designated temporary file

// get uploaded file's extension
$ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));

// can upload same image using rand function
$final_image = rand(1000,1000000).$img;

// check's valid format
if(in_array($ext, $valid_extensions)) 
{ 
$path = $path.strtolower($final_image); 

if(move_uploaded_file($tmp,$path)){

          $client = mysqli_real_escape_string($db,$_POST['client1']);
          $company = mysqli_real_escape_string($db,$_POST['company']);
          $brand = mysqli_real_escape_string($db,$_POST['brand']);
          $type = mysqli_real_escape_string($db,$_POST['type']);
          $kondition = mysqli_real_escape_string($db,$_POST['kondition']);
          $accident = mysqli_real_escape_string($db,$_POST['accident']);
          $model = mysqli_real_escape_string($db,$_POST['model']);
          $reg_no = mysqli_real_escape_string($db,$_POST['reg_no']);
          $chassis_no = mysqli_real_escape_string($db,$_POST['chassis_no']);
          $yom = mysqli_real_escape_string($db,$_POST['yom']);
          $cost = mysqli_real_escape_string($db,$_POST['cost']);
          $id=mysqli_real_escape_string($db,$_POST['assessor_id']);

        // Duplicate reg_no
        $reg_no =mysqli_real_escape_string($db,$_POST['reg_no']);
	
	      $regduplicate=mysqli_query($db,"select * from vehicle where reg_no='$reg_no' AND company_id ='$company'");
	  if (mysqli_num_rows($regduplicate)>0){
		echo json_encode(array("statusCode"=>201));
	  }
	else {
         $sql2="INSERT INTO `vehicle`(`company_id`,`model`, `chassis_no`, `yom`, `reg_no`, `picture`, `cost`, `client_id`, `brand_id`, `type_id`, `assessor_id`, `condition_id`, `acc_id`) VALUES ('".$company."','".$model."','".$chassis_no."','".$yom."','".$reg_no."','".$path."','".$cost."','".$client."','".$brand."','".$type."','".$id."','".$kondition."','".$accident."')";
        if(mysqli_query($db,$sql2)){
            echo json_encode(array("statusCode"=>200));
        }
        else{
             echo json_encode(array("statusCode"=>201));
        }
  }
   }
  }  
}
mysqli_close($db);
?>