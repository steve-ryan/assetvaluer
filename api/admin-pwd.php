<?php
    include ("./../database/config.php");
   
    if (count($_POST) > 0) {
    $adminid=$_POST['id'];

    $result = mysqli_query($db, "SELECT * FROM `admin` WHERE admin_id='$adminid'");
    $row = mysqli_fetch_array($result);
    if (md5($_POST["currentPassword"]) == $row["admin_password"]) {
        mysqli_query($db, "UPDATE `admin` SET `admin_password`='".md5($_POST["newPassword"])."' WHERE admin_id='$adminid'");
        echo json_encode(array("statusCode"=>200));
    } else{
       echo json_encode(array("statusCode"=>201));
       
    }
}

mysqli_close($db);
?>