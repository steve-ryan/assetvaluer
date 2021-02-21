<?php
	include ("./../database/config.php");
	$sql = "SELECT acc_id,name,pers FROM accident_status";
	$result = $db->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {

?>
<tr >
    <td><?=$row['name'];?></td>
    <td><?=$row['pers'];?></td>
    <td><button type="button" class="btn btn-danger btn-sm delete" data-id=<?=$row['acc_id'];?>>Delete</button></td>
	<td><button type="button" class="btn btn-success btn-sm editbtn" data-toggle="modal" data-keyboard="false" data-backdrop="static" data-target="#update_condition" data-id="<?=$row['acc_id'];?>"data-name="<?=$row['name'];?>"data-per="<?=$row['pers'];?>">Edit</button></td>
</tr>
<?php	
	}
	}
	else {
		echo "0 results";
	}
	mysqli_close($db);
?>