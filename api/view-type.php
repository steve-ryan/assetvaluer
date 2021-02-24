<?php
	include ("./../database/config.php");
	$sql = "SELECT type_id,tname,tper FROM type";
	$result = $db->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {

?>
<tr >
    <td><?=$row['tname'];?></td>
    <td><?=$row['tper'];?></td>
    <td><button type="button" class="btn btn-danger btn-sm delete" data-id=<?=$row['type_id'];?>>Delete</button></td>
	<td><button type="button" class="btn btn-success btn-sm editbtn" data-toggle="modal" data-keyboard="false" data-backdrop="static" data-target="#update_type" data-id="<?=$row['type_id'];?>"data-name="<?=$row['tname'];?>"data-per="<?=$row['tper'];?>">Edit</button></td>
</tr>
<?php	
	}
	}
	else {
		echo "0 results";
	}
	mysqli_close($db);
?>