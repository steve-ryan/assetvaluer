<?php
include ("./database/config.php");
require("./includes/assessor-check.php");
?>


<div class="card border-success ">
    <div class="alert alert-success alert-dismissible" id="success" style="display:none;">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">x</a>
    </div>
    <div class="alert alert-success alert-dismissible" id="error" style="display:none;">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">x</a>
    </div>
    <div class="card-body ">
        <form action="" method="post" id="valueForm" name="valueForm">
            <div class="form-row">
                <div class="form-group col-md-4 ">
                    <label for="name"><strong>Company:</strong></label>
                    <select name="company" id="company" class="form-control">
                        <option selected="true" disabled="disabled">Choose..</option>
                        <?php
                      $sql="SELECT * FROM company ORDER BY company_name ASC";
                      $data= mysqli_query($db,$sql);
                      while ($row = mysqli_fetch_assoc($data)) {
                                                        # code...
                        $id = $row['company_id'];
                        $name = $row['company_name'];
                         //option
                         echo "<option value='".$id."' >".$name."</option>";
                                                    }
                    ?>
                    </select>
                </div>

                <div class="form-group col-md-4 ">
                    <label for="name"><strong>Registration No:</strong></label>
                    <select name="sel_reg" id="sel_reg" class="form-control">
                        <option selected="true" disabled="disabled">Choose..</option>

                    </select>
                </div>

                <div class="form-group col-md-4">
                    <label for="name"><strong>Final Value:</strong></label>
                    <input type="text" class="form-control border-info" id="finalvalue" name="finalvalue" value=""
                        readonly>
                </div>
            </div>

            <button class="btn btn-primary " formaction="./api/report.php" type="submit" id="generateBtn" disabled>Download Report</button>
            <button class="btn btn-primary "  type="submit" id="postbtn" >Post Report</button>
        </form>
    </div>
</div>


<script>
$(document).ready(function() {
    // value computation
    $("#sel_reg").change(function() {
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
                $("#postBtn").removeAttr("disabled");
                console.log(input); {
                    input.val(data);
                }
            }
        });
    });
    
   //get reg no
    $("#company").change(function() {
        var company_id = $(this).val();

        $.ajax({
            url: './api/getReg.php',
            type: 'post',
            data: {
                company: company_id
            },
            dataType: 'json',
            success: function(result) {

                var len = result.length;

                $("#sel_reg").empty();
                for (var j = 0; j < len; j++) {
                    var id = result[j]['reg_no'];
                    var vehicle_id = result[j]['vehicle_id'];


                    $('#sel_reg').append("<option value='"+ vehicle_id +"'>"+id+"</option>");

                }
            }
        });
    });

});
</script>

<script >
    $(document).ready(function() {
	$("#postbtn").on('click', function(e) {
        e.preventDefault();
		$("#postbtn").attr("disabled", "disabled");
		var company = $('#company').val();
		var reg = $('#sel_reg').val();
		var final = $('#finalvalue').val();
     
		if(company!="" && reg!="" && final!="" ){
            console.log(final);
			$.ajax({
				url: "./api/post-report.php",
				type: "POST",
				data: {
					company_id: company,
					vehicle_id: reg,
					finalvalue: final			
				},
				cache: false,
				success: function(dataResult){
					var dataResult = JSON.parse(dataResult);
                    console.log(dataResult);
					if(dataResult.statusCode==200){
						$("#postBtn").removeAttr("disabled");
						$("#success").show();
						$('#success').html('Report added successfully !').delay(3000).fadeOut(3000); 						
					}
					else if(dataResult.statusCode==201){
					   alert("Error occured !");
					}
					
				}
			});
		}
		else{
			alert('Please fill all the fields!');
		}
	});
});

</script>
