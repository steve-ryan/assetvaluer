<?php
	include ("./../database/config.php");
    require ("./../includes/company-check.php");
    $cid=$_SESSION['cid'];
	$sql = "SELECT  DISTINCT v.reg_no,v.model,b.bname AS brand,t.tname AS type,v.yom,v.picture,k.name AS kond,ac.name AS name,v.chassis_no ,company_id FROM vehicle v JOIN kondition k on k.condition_id = v.condition_id JOIN accident_status as ac ON v.acc_id = ac.acc_id JOIN brand b ON v.brand_id = b.brand_id JOIN type t ON v.type_id = t.type_id WHERE company_id =  '$cid'";
	$result = $db->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {

?>
<tr>
    <td><?=$row['reg_no'];?></td>
    <td><?=$row['model'];?></td>
    <td><?=$row['brand'];?></td>
    <td><?=$row['type'];?></td>
       <td><?=$row['yom'];?></td>
          <td><img src="<?=$row['picture'];?>" width="80" height="40"></td>
             <td><?=$row['chassis_no'];?></td>
             <td><?=$row['kond'];?></td>
             <td><?=$row['name'];?></td>
             
</tr>
<?php	
	}
	}
	else {
		echo "0 results";
	}
	mysqli_close($db);
?>