<?php
include ("./../database/config.php");

$company_id =mysqli_real_escape_string($db,$_POST['company']); 

$sql = "SELECT reg_no,vehicle_id FROM vehicle WHERE company_id=".$company_id;

$result = mysqli_query($db,$sql);

$reg_arr = array();

while( $row = mysqli_fetch_array($result) ){
    $reg = $row['reg_no'];
    $vehicle_id = $row['vehicle_id'];
   
    $reg_arr[] = array("reg_no" => $reg,"vehicle_id"=>$vehicle_id);
}

// encoding array to json format
echo json_encode($reg_arr);