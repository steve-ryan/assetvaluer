<?php
	include ("./../database/config.php");
	$sql = "SELECT company_id,company_name,email,status FROM company;";
	$result = $db->query($sql);
    $no=1;
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {

?>
<tr>
    <td><?php echo "$no"?></td>
    <td><?=$row['company_name'];?></td>
    <td><?=$row['email'];?></td>
    <td>
    <?php

    if ($row['status']== 1) {
        echo "<p id=sts".$row['company_id']." style='color:green'>Active</p>";
    } else {
    echo "<p id=id=sts".$row['company_id']." style='color:red'>Inactive</p>";
    }
    ?>
    </td>
    <td>
        <select class=" border-warning" onchange="active_inactive_company(this.value,<?php echo $row['company_id'];?>)">
            <option value="">Select</option>
            <option value="1">Active</option>
            <option value="0">Inactive</option>

        </select>
    </td>
    <td><button type="button" class="btn btn-danger btn-sm delete" data-id=<?=$row['company_id'];?>>Delete</button></td>
</tr>
<?php	
$no++;
	}
	}
	else {
		echo "0 results";
	}
	mysqli_close($db);
?>