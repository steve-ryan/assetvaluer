<?php
require("./../includes/admin-check.php");
?>
<div class="types">
    <div class="alert alert-success alert-dismissible text-center" id="success" style="display:none;">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>

    </div>
    <div class="alert alert-danger alert-dismissible text-center" id="error" style="display:none;">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">x</a>
    </div>
    <form method="post" action="" id="typesForm">
        <div class="row">
            <div class="col">
                <input type="text" class="form-control" name="typename" id="typename" value="" placeholder="Types name"
                    required>
            </div>
            <div class="col">
                <input type="number" placeholder="percentage ie 10" name="pername" id="pername" class="form-control"
                    min="0" max="100" placeholder="Last name">
            </div>
            <div class="col">
                <button type="submit" class="btn btn-primary" id="type_btn" name="type_btn">Add Type/Category</button>
            </div>
        </div>

    </form>

    <hr />
    <div class="col-md-12">
        <div class="col-md-12">
            <div class="card border-info">
                <div class="card-header text-black h-100 no-radius text-center"> Manage Types/Categories</div>
                <div class="card-body">

                    <table class="table table-sm table-hover">
                        <thead class="table-success">
                            <tr>

                                <th scope="col">Types/Categories</th>
                                <th scope="col">Per(%)</th>
                                <th colspan="2">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody id="type-table">

                        </tbody>
                    </table>
                </div>

                <!-- type update modal -->
                <div class="modal fade" id="update_type" role="dialog">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header bg-success" style="color:#fff;padding:6px;">
                                <h5 class="modal-title"><i class="fa fa-edit"></i> Update Type</h5>

                            </div>
                            <div class="modal-body">

                                <!--type name-->
                                <div class="row">
                                    <div class="col-md-3">
                                        <label>Type Name</label>
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
                <!-- modal end -->


            </div>
        </div>
    </div>

    <script>
    $(document).ready(function() {
        $('#type_btn').on('click', function() {
            $('#type_btn').attr("disabled", "disabled");
            var name = $('#typename').val();
            var pers = $('#pername').val();

            if (name != "" && pers != "") {
                $.ajax({
                    url: "./../api/add-type.php",
                    type: "POST",
                    data: {
                        name: name,
                        per: pers
                    },
                    cache: false,
                    success: function(dataResult) {
                        var dataResult = JSON.parse(dataResult);
                        if (dataResult.statusCode == 200) {
                            $('#type_btn').removeAttr("disabled");
                            $('#typesForm')[0].reset();
                            $("#success").show();
                            $('#success').html('Type/Category added successfully !').delay(
                                3000).fadeOut(3000);

                        } else if (dataResult.statusCode == 201) {
                            $("#error").show();
                            $('#error').html('Type already exists !').delay(3000).fadeOut(
                                3000);
                        }

                    }
                });
            } else {
                $("#error").show();
               $('#error').html('Fill all type details!').delay(3000).fadeOut(3000);
            }
        });

        //view type
        $.ajax({
            url: "./../api/view-type.php",
            type: "POST",
            cache: false,
            success: function(dataResult) {
                $('#type-table').html(dataResult);
            }
        });
        //update type
        $(function() {
            $('#update_type').on('show.bs.modal', function(event) {
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
                url: "./../api/update-type.php",
                type: "POST",
                cache: false,
                data: {
                    id: $('#id_modal').val(),
                    name: $('#name_modal').val(),
                    per: $('#per_modal').val(),
                },
                success: function(dataResult) {
                    var dataResult = JSON.parse(dataResult);
                    if (dataResult.statusCode == 200) {
                        $('#update_type').modal().hide();
                        alert('Data updated successfully !');
                        location.reload();
                    }
                }
            });
        });


        //Deleting a type
        $(document).on("click", ".delete", function() {
            var $ele = $(this).parent().parent();
            $.ajax({
                url: "./../api/delete-type.php",
                type: "POST",
                cache: false,
                data: {
                    type_id: $(this).attr("data-id")
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