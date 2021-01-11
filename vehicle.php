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
                <div class="form-group col-md-12">
                    <label for=""><strong>Select Client:</strong></label>
                    <select name="client1" id="client1" class="form-control">
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

            </div>
            <div class="form-row">

                <div class="form-group col-md-4 ">
                    <label for="name"><strong>Brand:</strong></label>
                    <select name="brand" id="brand" class="form-control">
                        <option selected="true" disabled="disabled">Choose..</option>
                        <?php
                        
                        
                      $brand = mysqli_query($db, "SELECT brand_id ,name FROM brand ORDER BY brand_id ASC");
                         $row = mysqli_num_rows($brand);
                       while ($row = mysqli_fetch_array($brand)){
                      echo "<option value='". $row['brand_id'] ."'>" .$row['name'] ." </option>" ;

                       }
                       
                    ?>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="name"><strong>Type:</strong></label>
                    <select name="type" id="type" class="form-control">
                        <option selected="true" disabled="disabled">Choose..</option>
                        <?php
                        
                        
                      $type = mysqli_query($db, "SELECT type_id ,name FROM type ORDER BY name ASC");
                         $row = mysqli_num_rows($type);
                       while ($row = mysqli_fetch_array($type)){
                      echo "<option value='". $row['type_id'] ."'>" .$row['name'] ."</option>" ;

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
                    <input type="date" class="form-control border-info" id="yom" name="yom" max="<?php echo date("Y-m-d"); ?>" value="" >
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
$(document).ready(function(e) {
    $("#vehicleForm").on('submit', function(e) {
        e.preventDefault();
        var assessor_id = $('#assessor_id').val();
        var brand = $('#brand').val();
        var type = $('#type').val();
        var client = $('#client1').val();
        var model = $('#model').val();
        var yom = $('#yom').val();
        var reg_no = $('#reg_no').val();
        var chassis_no = $('#chassis_no').val();
        var cost = $('#cost').val();


        if (brand != "" && assessor_id != "" && type != "" && client != "" && model != "" && yom !=
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
                    // console.log(data);
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
                        // console.log(brand,type,client,model,yom,reg_no,chassis_no,cost);
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