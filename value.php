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
                         <option selected="true" disabled="disabled">Choose..</option>
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

             <button class="btn btn-primary " type="submit" id="generateBtn" onclick=function report() disabled>Download Report</button>
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
                $('#generateBtn').removeAttr("disabled");
                console.log(input); 
                {
                    input.val(data);
                }
            }
        });
    });
    // Generate a report
    $('#generateBtn').on('click', function() {
        var finalvalue = $('#finalvalue').val();
        var vehicle_id = $('#reg_no').val();
        if (vehicle_id != "" && finalvalue != "") {
            $.ajax({
                url: "./api/report.php",
                type: "POST",
                data: {
                    vehicle_id: vehicle_id,
                    finalvalue: finalvalue
                },
                cache: false,
                success: function(dataResult) {
                    var dataResult = JSON.parse(dataResult)
                    if (dataResult.statusCode == 200) {
                        console.log(finalvalue, vehicle_id);
                    } else if (dataResult.statusCode == 201) {
                        alert("failed")
                    }
                }
            });
        } else {
            alert('Please fill all the fields');
        }
    });
    
});

//crazy
// function report(){
//     //variables needed
//     var vehicle_id = $(this).val();
//     var input = $("#finalvalue");

//     //post to php using jquery
//     $.post('report.php'{
//         vehicle_id:vehicle_id,
//         input:input,
//         generateBtn:"#generateBtn"
//     },
//     function(){
//         window.open('report.php');
//     });

// }
 </script>