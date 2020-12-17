 <head>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
 </head>

 <div class="card border-success ">

     <!-- <div class="card-header"> Dashboard</div> -->

     <div class="card-body ">
         <form action="" method="GET" id="valueForm" name="valueForm">
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
            console.log(vehicle_id);
            $.ajax({
                url: './api/computation.php',
                type: 'post',
                data: {
                    vehicle_id: vehicle_id
                },
                success: function(data) {
                    console.log(input);
                   { input.val(data); }  
                }
            });
        });

    });
    </script>