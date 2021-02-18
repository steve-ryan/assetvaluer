<?php
    include ("./../database/config.php");
   
    if (count($_POST) > 0) {
    $companyid=$_POST['id'];

    $result = mysqli_query($db, "SELECT * FROM `company` WHERE company_id='$companyid'");
    $row = mysqli_fetch_array($result);
    if (md5($_POST["currentPassword"]) == $row["password"]) {
        mysqli_query($db, "UPDATE `company` SET `password`='".md5($_POST["newPassword"])."' WHERE company_id='$companyid'");
        echo json_encode(array("statusCode"=>200));
    } else{
       echo json_encode(array("statusCode"=>201));
       
    }
}

mysqli_close($db);
?>