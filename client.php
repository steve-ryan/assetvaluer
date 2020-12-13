<div class="container h-100">
    <div class="row h-100 justify-content-center align-items-center">
        <div class="col-12 col-md-12 col-lg-6">
        
            <div class="card-body ">
                <div class="alert alert-success alert-dismissible" id="success" style="display:none;">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">x</a>
                </div>

                <div class="alert alert-danger alert-dismissible" id="error" style="display:none;">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">x</a>
                </div>
                <form method="post" action="" id="clientForm">
                    <div class="form-row">

                        <div class="form-group col-md-12 ">
                            <label for="name"><strong>Name:</strong></label>
                            <input type="text" class="form-control border-info" id="name" name="name" value="" required>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="name"><strong>Email:</strong></label>
                            <input type="text" class="form-control border-info" id="email" name="email" value="">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="name"><strong>Phone:</strong></label>
                            <input type="text" class="form-control border-info" id="phone_no" name="phone_no" value="">
                        </div>
                    </div>

                    <br />
                    <button type="submit" class="btn btn-success" id="client_btn">Add Client</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    //Adding client
    $(document).ready(function() {
        $('#client_btn').on('click', function() {
            $("#client_btn").attr("disabled", "disabled");
            var name = $('#name').val();
            var email = $('#email').val();
            var phone_no = $('#phone_no').val();

            if (name != "" && email != "" && phone_no != "") {
                $.ajax({
                    url: "./api/add-client.php",
                    type: "POST",
                    data: {
                        name: name,
                        email: email,
                        phone_no: phone_no
                    },
                    cache: false,
                    success: function(dataResult) {
                        var dataResult = JSON.parse(dataResult);
                        console.log(dataResult);
                        if (dataResult.statusCode == 200) {
                            $("#client_btn").removeAttr("disabled");
                            $('#clientForm')[0].reset();
                            $("#success").show();
                            $('#success').html(
                                    'Client details added successfully !').delay(3000)
                                .fadeOut(
                                    3000);
                            $("#client").load(" #client");
                        } else if (dataResult.statusCode == 201) {
                            // alert("Error occured !");
                            $("#error").show();
                            $('#error').html('Client email already exists !').delay(3000)
                                .fadeOut(
                                    3000);
                        }

                    }
                });
            } else {
                alert('Please fill speciality name field !');
            }
        });
    });
    </script>
