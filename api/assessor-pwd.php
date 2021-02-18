<?php
    include ("./../database/config.php");
   
    if (count($_POST) > 0) {
    $assessorid=$_POST['id'];

    $result = mysqli_query($db, "SELECT * FROM `assessor` WHERE assessor_id='$assessorid'");
    $row = mysqli_fetch_array($result);
    if (md5($_POST["currentPassword"]) == $row["password"]) {
        mysqli_query($db, "UPDATE `assessor` SET `password`='".md5($_POST["newPassword"])."' WHERE assessor_id='$assessorid'");
        echo json_encode(array("statusCode"=>200));
    } else{
       echo json_encode(array("statusCode"=>201));
       
    }
}

mysqli_close($db);
?>