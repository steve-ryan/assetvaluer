 <head>
      <link rel="stylesheet" href="./css/bootstrap.min.css" />
 </head>

 <div class="card border-success ">
     <div class="alert alert-success alert-dismissible" id="success" style="display:none;">
         <a href="#" class="close" data-dismiss="alert" aria-label="close">x</a>
     </div>
     <div class="alert alert-success alert-dismissible" id="error" style="display:none;">
         <a href="#" class="close" data-dismiss="alert" aria-label="close">x</a>
     </div>
     <div class="card-body ">
         <form action="" method="" id="valueForm" name="valueForm">
             <div class="form-row">

                 <div class="form-group col-md-6 ">
                     <label for="name"><strong>Registration No:</strong></label>
                     <select name="reg_no" id="reg_no" class="form-control">
                         <option disabled="">Choose..</option>
                         <?php
                        include ("./database/config.php");
                        
                      $reg = mysqli_query($db, "SELECT vehicle_id ,reg_no FROM vehicle ORDER BY vehicle_id DESC");
                         $row = mysqli_num_rows($reg);
                       while ($row = mysqli_fetch_array($reg)){
                      echo "<option value='". $row['vehicle_id'] ."'>" .$row['reg_no'] ." </option>" ;

                       }
                    ?>
                     </select>
                 </div>

                 <div class="form-group col-md-6">
                     <label for="name"><strong>Final Value:</strong></label>
                     <input type="text" class="form-control border-info" id="finalvalue" name="finalvalue" value=""
                         readonly>
                 </div>
             </div>

             <button class="btn btn-primary" type="submit" id="reportBtn">Post Report</button>
         </form>
     </div>
 </div>
 <script>
$(document).ready(function() {

    $("#reg_no").change(function() {
        var vehicle_id = $(this).val();
        var input = $("#finalvalue");
        $.ajax({
            url: './api/computation.php',
            type: 'post',
            data: {
                vehicle_id: vehicle_id
            },
            success: function(data) {
                console.log(input); {
                    input.val(data);
                }
            }
        });
    });

    //Posting a report
    $('#reportBtn').on('click', function() {
        $("#reportBtn").attr("disabled", "disabled");
        var finalvalue = $('#finalvalue').val();
        var vehicle_id = $('#reg_no').val();

        if (vehicle_id != "" && finalvalue != "") {
            $.ajax({
                url: "./api/post-report.php",
                type: "POST",
                data: {
                    finalvalue: finalvalue,
                    vehicle_id: vehicle_id
                },
                cache: false,
                success: function(dataResult) {
                    var dataResult = JSON.parse(dataResult)
                    if (dataResult.statusCode == 200) {
                        $("#reportBtn").removeAttr("disabled");
                        $('#valueForm')[0].reset();
                        $("#success").show();
                        $('#success').html('Report generated successfully !').delay(3000).fadeOut(
                            3000);
                    } else if (dataResult.statusCode == 201) {
                        $('#error').show();
                       $('#error').html("Error occured !").delay(3000).fadeOut(
                            3000);
                    }

                }
            });
        } else {
            alert('Please fill all the fields');
        }

    });

});
 </script>