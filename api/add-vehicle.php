<?php 
include ("./../database/config.php");


$valid_extensions = array('jpeg', 'jpg', 'png'); // valid extensions
$path = './../uploads/'; // upload directory

if(!empty($_POST['client']) || !empty($_POST['brand']) ||!empty($_POST['type']) || !empty($_POST['model'])|| $_FILES['picture'])
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

if(move_uploaded_file($tmp,$path)) 
{

$client = $_POST['client1'];
$brand = $_POST['brand'];
$type = $_POST['type'];
$model = $_POST['model'];
$reg_no = $_POST['reg_no'];
$chassis_no = $_POST['chassis_no'];
$yom = $_POST['yom'];
// $cost = $_POST['cost'];


$sql="INSERT vehicles (`client`,`brand`,`type`,`model`,`reg_no`,`chassis_no`,`yom`,`picture`)
 VALUES ('".$client."','".$brand."','".$type."','".$model."','".$reg_no."','".$chassis_no."','".$yom."','".$path."')";
  if(mysqli_query($db,$sql)){
        echo json_encode(array("statusCode"=>200));

    }else{
                echo json_encode(array("statusCode"=>201));
    }
   }
  }  
}
mysqli_close($db);
?>