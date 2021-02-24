<div class="card border-success ">
    <?php
require("./includes/assessor-check.php");
require("./database/config.php");
?>
    <div class="card-body ">
        <div class="alert alert-success alert-dismissible" id="success" style="display:none;">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">x</a>
        </div>

        <div class="alert alert-danger alert-dismissible" id="error" style="display:none;">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">x</a>
        </div>

        <form action="" method="post" id="vehicleForm" name="vehicleForm" enctype="multipart/form-data">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for=""><strong>Select Client:</strong></label>
                    <select name="client" id="client" class="form-control">
                        <option selected="true" disabled="disabled">Choose..</option>
                        <?php
                      $query = mysqli_query($db, "SELECT client_id ,name,email FROM client ORDER BY client_id ASC");
                         $row = mysqli_num_rows($query);
                       while ($row = mysqli_fetch_array($query)){
                      echo "<option value='". $row['client_id'] ."'>" .$row['name'] ." </option>" ;

                       }
                       
                    ?>
                    </select>
                </div>
                 <div class="form-group col-md-6">
                    <label for=""><strong>Select Company:</strong></label>
                    <select name="company" id="company" class="form-control">
                        <option selected="true" disabled="disabled">Choose..</option>
                        <?php
                      $company = mysqli_query($db, "SELECT company_id, company_name FROM company ORDER BY company_name ASC");
                         $row = mysqli_num_rows($company);
                       while ($row = mysqli_fetch_array($company)){
                      echo "<option value='". $row['company_id'] ."'>" .$row['company_name'] ." </option>" ;

                       }
                       
                    ?>
                    </select>
                </div>

            </div>
            <div class="form-row">
                <div class="form-check form-check-inline form-group col-md-4 ">
                    <label for=""><strong>Select Condition:</strong></label>
                    <?php
                        include ("./database/config.php");
                        
                      $query = mysqli_query($db, "SELECT condition_id ,name,pers FROM kondition");
                         $row = mysqli_num_rows($query);
                       while ($row = mysqli_fetch_array($query)){
                      echo '<input type="radio" class="form-check-input" id="kondition" name="kondition" placeholder="crazy" value="'.$row['condition_id'].'"/> ' . $row['name'] ;

                       }
                    ?>
                </div>
            </div>

            <div class="form-row">
                <div class="form-check form-check-inline form-group col-md-6 ">
                    <label for=""><strong>Select Accident Cond':</strong></label>
                    <?php
                        include ("./database/config.php");
                        
                      $query = mysqli_query($db, "SELECT acc_id ,name,pers FROM accident_status");
                         $row = mysqli_num_rows($query);
                       while ($row = mysqli_fetch_array($query)){
                      echo '<input type="radio" class="form-check-input" id="accident" name="accident" value="'.$row['acc_id'].'"/> ' . $row['name'] ;

                       }
                    ?>
                </div>
            </div>
            <div class="form-row">

                <div class="form-group col-md-4 ">
                    <label for="name"><strong>Brand:</strong></label>
                    <select name="brand" id="brand" class="form-control">
                        <option selected="true" disabled="disabled">Choose..</option>
                        <?php
                        
                        
                      $brand = mysqli_query($db, "SELECT brand_id ,bname FROM brand ORDER BY brand_id ASC");
                         $row = mysqli_num_rows($brand);
                       while ($row = mysqli_fetch_array($brand)){
                      echo "<option value='". $row['brand_id'] ."'>" .$row['bname'] ." </option>" ;

                       }
                       
                    ?>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="name"><strong>Type:</strong></label>
                    <select name="type" id="type" class="form-control">
                        <option selected="true" disabled="disabled">Choose..</option>
                        <?php
                        
                        
                      $type = mysqli_query($db, "SELECT type_id ,tname FROM type ORDER BY tname ASC");
                         $row = mysqli_num_rows($type);
                       while ($row = mysqli_fetch_array($type)){
                      echo "<option value='". $row['type_id'] ."'>" .$row['tname'] ."</option>" ;

                       }
                       
                    ?>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="name"><strong>Model:</strong></label>
                    <input type="text" class="form-control border-info" id="model" name="model" pattern="[a-zA-Z0-9]+"
                        value="" placeholder="Vehicle Model">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="name"><strong>Reg No:</strong></label>
                    <input type="text" class="form-control border-info" id="reg_no" name="reg_no" value=""
                        placeholder="Registration No">
                </div>
                <div class="form-group col-md-4">
                    <label for="name"><strong>Chassis No:</strong></label>
                    <input type="text" class="form-control border-info" id="chassis_no" name="chassis_no" value=""
                        placeholder="Chassis No">
                </div>
                <div class="form-group col-md-4">
                    <label for="name"><strong>YOM:</strong></label>
                    <input type="date" class="form-control border-info" id="yom" name="yom"
                        max="<?php echo date("Y-m-d"); ?>" value="">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="name"><strong>Intial Cost:</strong></label>
                    <input type="number" class="form-control border-info" id="cost" name="cost" value="">
                </div>

                <div class="form-group col-md-6">
                    <label for="name"><strong>Upload images:</strong></label>
                    <input id="picture" name="picture" accept="image/*" type="file" class="file"
                        data-show-upload="false" data-show-caption="true" multiple>
                </div>
                <div class="form-group col-md-1">
                    <!-- Get hidden assessor ID -->
                    <?php
                    $assessor_id=$_SESSION['aid'];
                    echo '<input type="hidden" class="form-control" id="assessor_id" name="assessor_id" value="'.$assessor_id.'"';
                    ?>
                </div>
            </div>
    </div>

    <button class="btn btn-primary" type="submit" id="submitBtn">Submit</button>
    </form>
</div>
</div>

<script>
$(document).ready(function() {
    $("#vehicleForm").on('submit', function() {
        // e.preventDefault();
        var assessor_id = $('#assessor_id').val();
        var brand = $('#brand').val();
        var condition = $('#kondition').val();
        var company = $('#company').val();
        var accident = $('#accident').val();
        var type = $('#type').val();
        var client = $('#client').val();
        var model = $('#model').val();
        var yom = $('#yom').val();
        var reg_no = $('#reg_no').val();
        var chassis_no = $('#chassis_no').val();
        var cost = $('#cost').val();


        //  console.log(company, assessor_id, brand, condition,accident,type, client, model, yom, reg_no,chassis_no, cost );
        console.log(client);
        console.log(company);

        if (company != "" && brand != "" && assessor_id != "" && condition != "" && accident != "" && type != "" && client != "" && model != "" && yom !=
            "" && reg_no != "" &&
            chassis_no != "" && cost != "") {
            $.ajax({
                type: 'POST',
                url: "./api/add-vehicle.php",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                    $('.submitBtn').attr("disabled", "disabled");
                    $('#vehicleForm').css("opacity", ".5");
                },
                success: function(data) {
                    var data = JSON.parse(data);
                    console.log(data);
                
                    if (data.statusCode == 200) {
                        $('#vehicleForm')[0].reset();
                        $('#vehicleForm').css("opacity", "");
                        $('.submitBtn').removeAttr("disabled");
                        $("#success").show();
                        $('#success').html('Vehicle details uploaded successfully').delay(
                            3000).fadeOut(3000);
                        $("#vehicle").load(" #vehicle");
                    } else {
                        (data.statusCode == 201)
                        console.log("failed");
                        $("#error").show();
                        $('#error').html('upload not successful  !').delay(3000).fadeOut(
                            3000);
                    }
                }
            });
        } else {
            $("#error").show();
            $('#error').html('Fill all details !').delay(3000).fadeOut(3000);
        }

    });
});
</script>