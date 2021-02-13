<?php
	include ("./../database/config.php");
    require ("./../includes/company-check.php");
    $cid=$_SESSION['cid'];
	$sql = "SELECT  DISTINCT c.client_id,c.name ,c.email,c.phone_no ,company_id FROM vehicle v JOIN client c ON v.client_id = c.client_id WHERE company_id =  '$cid'";
	$result = $db->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {

?>
<tr>
    <td><?=$row['name'];?></td>
    <td><?=$row['email'];?></td>
    <td><?=$row['phone_no'];?></td>
</tr>
<?php	
	}
	}
	else {
		echo "0 results";
	}
	mysqli_close($db);
?>