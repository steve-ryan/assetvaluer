<?php
    include ("./../database/config.php");
$condition = mysqli_real_escape_string($db,$_POST['name']);
$per = mysqli_real_escape_string($db,$_POST['pers']/100);

$conditionduplicate = mysqli_query($db,"select * from kondition where name='$condition'");

if(mysqli_num_rows($conditionduplicate) > 0){
echo json_encode(array("statusCode"=>201));
}
else{
    $sql = "INSERT INTO `kondition`(`name`,`pers`) VALUES ('$condition','$per')";
    if(mysqli_query($db,$sql)){
        echo json_encode(array("statusCode"=>200));

    }else{
                echo json_encode(array("statusCode"=>201));
    }
}

	mysqli_close($db);
?>