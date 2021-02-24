<?php
require("./../includes/admin-check.php");
?>
<div class="brand">
    <div class="alert alert-success alert-dismissible text-center" id="success" style="display:none;">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>

    </div>
    <div class="alert alert-danger alert-dismissible text-center" id="error" style="display:none;">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">x</a>
    </div>
    <form action="" method="post" id="brandForm">
        <div class="row">
            <div class="col">
                <input type="text" class="form-control" name="brand" id="brandname" placeholder="Brand name" required>
            </div>
            <div class="col">
                <input type="number" placeholder="percentage ie 10" name="pername" id="pername" class="form-control"
                    min="0" max="100" placeholder="Percentage" background-white>
            </div>
            <div class="col">
                <button type="submit" class="btn btn-primary" id="brand_btn" name="brand_btn">Add Brand</button>
            </div>
        </div>

    </form>

    <hr />
    <div class="col-md-12">
        <div class="col-md-12">
            <div class="card border-info">
                <div class="card-header text-black h-100 no-radius text-center"> Manage Brands</div>
                <div class="card-body">

                    <table class="table table-sm table-hover">
                        <thead class="table-success">
                            <tr>

                                <th scope="col">Brand</th>
                                <th scope="col">Per(%)</th>
                                <th colspan="2">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody id="brand-table">

                        </tbody>
                    </table>
                </div>
                <!-- Brand update modal -->
                <div class="modal fade" id="update_brand" role="dialog">
                    <div class="modal-dialog modal-sm">
                    <div class="alert alert-success alert-dismissible text-center" id="success" style="display:none;">
                         <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                    </div>
                    <div class="alert alert-danger alert-dismissible text-center" id="error" style="display:none;">
                         <a href="#" class="close" data-dismiss="alert" aria-label="close">x</a>
                    </div>
                        <div class="modal-content">
                            <div class="modal-header bg-success" style="color:#fff;padding:6px;">
                                <h5 class="modal-title"><i class="fa fa-edit"></i> Update Brand</h5>

                            </div>
                            <div class="modal-body">

                                <!--Brand name-->
                                <div class="row">
                                    <div class="col-md-3">
                                        <label>Brand Name</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" name="name_modal" id="name_modal" class="form-control-sm"
                                            required>
                                    </div>
                                </div>
                                <!--Percentage-->
                                <div class="row">
                                    <div class="col-md-3">
                                        <label>Percentage</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="number" name="per_modal" id="per_modal" class="form-control-sm"
                                            required>
                                    </div>
                                </div>

                                <input type="hidden" name="id_modal" id="id_modal" class="form-control-sm">
                            </div>
                            <div class="modal-footer"
                                style="padding-bottom:0px !important;text-align:center !important;">
                                <p style="text-align:center;float:center;"><button type="submit" id="update_data"
                                        class="btn btn-default btn-sm btn-sm btn-success"
                                        style="color:#fff;">Save</button>
                                    <button type="button" class="btn btn-default " data-dismiss="modal"
                                        style="background-color: #e35f14; color:#fff;">Close</button>
                                </p>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal End-->

            </div>
        </div>
    </div>

    <script>
    // Adding brand
    $(document).ready(function() {
        $('#brand_btn').on('click', function() {
            $("#brand_btn").attr("disabled", "disabled");
            var name = $('#brandname').val();
            var per = $('#pername').val();

            if (brand != "" && per != "") {
                $.ajax({
                    url: "./../api/add-brand.php",
                    type: "POST",
                    data: {
                        name: name,
                        pers: per
                    },
                    cache: false,
                    success: function(dataResult) {
                        var dataResult = JSON.parse(dataResult);
                        if (dataResult.statusCode == 200) {
                            console.log(dataResult);

                            $("#brand_btn").removeAttr("disabled");
                            $('#brandForm')[0].reset();
                            $("#success").show();
                            $('#success').html(
                                    'Brand details added successfully !').delay(3000)
                                .fadeOut(
                                    3000);
                            $("#brand").load(" #brand");
                        } else if (dataResult.statusCode == 201) {
                            // alert("Error occured !");
                            $("#error").show();
                            $('#error').html('Brand already exists !').delay(3000).fadeOut(
                                3000);
                        }

                    }
                });
            } else {
                 $("#error").show();
            $('#error').html('Fill brand details!').delay(3000).fadeOut(3000);
            }
        });
       
        //view brand
        $.ajax({
            url: "./../api/view-brand.php",
            type: "POST",
            cache: false,
            success: function(dataResult) {
                $('#brand-table').html(dataResult);
            }
        });
        
         //update brand
        $(function () {
		$('#update_brand').on('show.bs.modal', function (event) {
			var button = $(event.relatedTarget); 
			var id = button.data('id');
			var name = button.data('name');
			var per = button.data('per');
            //converting it into whole value by multiplying by 100
            var per2 = (per*100);
			var modal = $(this);
			modal.find('#name_modal').val(name);
			modal.find('#per_modal').val(per2);
			modal.find('#id_modal').val(id);
		});
    });
	$(document).on("click", "#update_data", function() { 
		$.ajax({
			url: "./../api/update-brand.php",
			type: "POST",
			cache: false,
			data:{
				id: $('#id_modal').val(),
				name: $('#name_modal').val(),
				per: $('#per_modal').val(),
			},
			success: function(dataResult){
				var dataResult = JSON.parse(dataResult);
				if(dataResult.statusCode==200){
					$('#update_brand').modal().hide();
                    $("#success").show();
                            $('#success').html(
                                    'Data added successfully !').delay(3000)
                                .fadeOut(
                                    3000);
					$("#brand").load(" #brand");					
				}
			}
		});
	}); 

        //Deleting a brand
        $(document).on("click", ".delete", function() {
            var $ele = $(this).parent().parent();
            $.ajax({
                url: "./../api/delete-brand.php",
                type: "POST",
                cache: false,
                data: {
                    brand_id: $(this).attr("data-id")
                },
                success: function(dataResult) {
                    console.log("success");
                    var dataResult = JSON.parse(dataResult);
                    if (dataResult.statusCode == 200) {
                        $ele.fadeOut().remove();
                        location.reload();
                    }
                }
            });
        });
    });
    </script>
    <script src="./../js/popper.min.js"></script>
    <script src="./../js/bootstrap.min.js"></script>
    </body>