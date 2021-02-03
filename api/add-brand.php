<?php
    include ("./../database/config.php");
$brand = mysqli_real_escape_string($db,$_POST['name']);
$per = mysqli_real_escape_string($db,$_POST['pers']/100);

$brandduplicate = mysqli_query($db,"select * from brand where name='$brand'");

if(mysqli_num_rows($brandduplicate) > 0){
echo json_encode(array("statusCode"=>201));
}
else{
    $sql = "INSERT INTO `brand`(`name`,`pers`) VALUES ('$brand','$per')";
    if(mysqli_query($db,$sql)){
        echo json_encode(array("statusCode"=>200));

    }else{
                echo json_encode(array("statusCode"=>201));
    }
}

	mysqli_close($db);
?>