<?php
 include ("./../database/config.php");

$vehicle_id = mysqli_real_escape_string($db,$_POST['vehicle_id']); 

$sql1 = "SELECT model,cost,datediff(CURDATE(),yom)/365.25 as age, b.pers+ t.per as perc FROM vehicle as v JOIN brand b ON v.brand_id = b.brand_id JOIN type as t ON v.type_id = t.type_id WHERE vehicle_id = '$vehicle_id'";
if ($result = $db -> query($sql1)) {
  while ($obj = $result -> fetch_object()) {
    $per = $obj->perc;
    $n = $obj->age;
    $cost = $obj->cost;
    $depreciation=1-$per;
    // percentage times n years
    $b = pow($depreciation,$n);
    $value=$cost * $b;
    //round to two decimals
    $total=number_format($value, 2);

  }
  $result -> free_result();
}
//echo total cost vehicle
echo "$total";
$db -> close();
 ?>