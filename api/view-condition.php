<?php
	include ("./../database/config.php");
	$sql = "SELECT condition_id,name,pers FROM kondition";
	$result = $db->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {

?>
<tr >
    <td><?=$row['name'];?></td>
    <td><?=$row['pers'];?></td>
    <td><button type="button" class="btn btn-danger btn-xs delete" data-id=<?=$row['condition_id'];?>>Delete</button></td>
	<td><button type="button" class="btn btn-success btn-xs editbtn" data-toggle="modal" data-keyboard="false" data-backdrop="static" data-target="#update_condition" data-id="<?=$row['condition_id'];?>"data-name="<?=$row['name'];?>"data-per="<?=$row['pers'];?>">Edit</button></td>
</tr>
<?php	
	}
	}
	else {
		echo "0 results";
	}
	mysqli_close($db);
?>