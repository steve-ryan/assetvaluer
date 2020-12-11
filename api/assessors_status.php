<?php
    include ("./../database/config.php");

    $_POST['val'];
    $_POST['assessor_id'];

    $query = mysqli_query($db,"UPDATE `assessor` set `status` = '".$_POST['val']."'WHERE `assessor_id`='".$_POST['assessor_id']."'");
    if ($query) {
        $query1=mysqli_query($db,"SELECT * FROM `assessor` WHERE `assesor_id`='".$_POST['assessor_id']."'");
        $row = mysqli_fetch_assoc($query1);
        echo $row['status'];
    } 

 
?>