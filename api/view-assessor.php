<?php
	include ("./../database/config.php");
	$sql = "SELECT assessor_id,name,email,status FROM assessor;";
	$result = $db->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {

?>
<tr>
    <td><?=$row['assessor_id'];?></td>
    <td><?=$row['name'];?></td>
    <td><?=$row['email'];?></td>
    <td>
    <?php

    if ($row['status']== 1) {
        echo "<p id=sts".$row['assessor_id']." style='color:green'>Active</p>";
    } else {
    echo "<p id=id=sts".$row['assessor_id']." style='color:red'>Inactive</p>";
    }
    ?>
    </td>
    <td>
        <select class=" border-warning" onchange="active_inactive_assessor(this.value,<?php echo $row['assessor_id'];?>)">
            <option value="">Select</option>
            <option value="1">Active</option>
            <option value="0">Inactive</option>

        </select>
    </td>
    <td><button type="button" class="btn btn-danger btn-sm delete" data-id=<?=$row['assessor_id'];?>>Delete</button></td>
</tr>
<?php	
	}
	}
	else {
		echo "0 results";
	}
	mysqli_close($db);
?>