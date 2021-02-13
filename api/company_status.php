<?php
    include ("./../database/config.php");

    $_POST['val'];
    $_POST['company_id'];

    $query = mysqli_query($db,"UPDATE `company` set `status` = '".$_POST['val']."'WHERE `company_id`='".$_POST['company_id']."'");
    if ($query) {
        $query1=mysqli_query($db,"SELECT * FROM `company` WHERE `company_id`='".$_POST['company_id']."'");
        $row = mysqli_fetch_assoc($query1);
        echo $row['status'];
    } 

 
?>