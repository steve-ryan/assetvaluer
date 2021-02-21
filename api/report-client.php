<?php
	include ("./../database/config.php");
    require ("./../includes/company-check.php");
    $cid=$_SESSION['cid'];
	$sql = "
    SELECT distinct r.company_id,v.reg_no,v.vehicle_id,MAX(kdate),v.model,b.name AS brand,t.name AS type,v.yom,v.picture, k.name AS kond,ac.name AS name,v.chassis_no ,r.company_id FROM report r 
    JOIN vehicle v ON r.vehicle_id = v.vehicle_id 
    JOIN kondition k on k.condition_id = v.condition_id 
    JOIN accident_status as ac ON v.acc_id = ac.acc_id 
    JOIN brand b ON v.brand_id = b.brand_id 
    JOIN type t ON v.type_id = t.type_id WHERE r.company_id ='$cid' GROUP BY vehicle_id
    ";
	$result = $db->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {

?>
<tr class="tblRows" data="<?=$row['reg_no'];?>" name="row-data">
    <td><input type="hidden" name="reg" id="reg" value=""><?=$row['reg_no'];?></td>
    <td><?=$row['model'];?></td>
    <td><?=$row['brand'];?></td>
    <td><?=$row['type'];?></td>
    <td><?=$row['yom'];?></td>
    <td><img src="<?=$row['picture'];?>" width="80" height="40"></td>
    <td><?=$row['chassis_no'];?></td>
    <td><?=$row['kond'];?></td>
    <td><?=$row['name'];?></td>
    <td>
    <div class="d-flex justify-content-center">
        <button class="btn btn-sm btn-default"  type="submit" id="postbtn" ><a href=./../api/general-report.php?id=<?=$row['vehicle_id'];?> style="text-decoration:none"> Download</a></button>
    </div>
    </td>

</tr>
<?php	
	}
	}
	else {
		echo "0 results";
	}
	mysqli_close($db);
?>
