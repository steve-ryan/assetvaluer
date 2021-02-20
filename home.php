<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(!empty($_SESSION["aid"])){
    require_once './assessor.php';
}
?>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title></title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="./css/bootstrap.min.css" />
    <link rel="stylesheet" href="./css/assessor.css" />
    <script src="./js/jquery.js"></script>
</head>

<body>
    <section id="cover" class="min-vh-100">
        <div id="cover-caption">
            <div class="container">
                <div class="row text-white">
                    <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto text-center form p-4">
                        <div class="px-2">
                            <div class="alert alert-success alert-dismissible" id="success" style="display: none">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                            </div>
                            <div class="alert alert-danger alert-dismissible" id="error" style="display: none">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                            </div>

                            <div class="switch">
                                <button type="button" class="btn btn-success btn-sm" id="register">
                                    Register
                                </button>
                                <button type="button" class="btn btn-success btn-sm" id="login">
                                    Login
                                </button>
                                </button>
                                 <a href="./#"> <button type="button" class="btn btn-danger btn-sm" >
                                   Home
                                </button></a>
                            </div>
                            <form action="" id="register_form" name="form1" class="justify-content-center assessor">
                                <h5 class="text-centre">Assessor Registration</h5>
                                <div class="form-group">
                                    <label for="email" class="sr-only">Name:</label>
                                    <input type="text" class="form-control" id="name" placeholder="Name" name="name" />
                                </div>
                                <div class="form-group">
                                    <label for="pwd" class="sr-only">Email:</label>
                                    <input type="email" class="form-control" id="email" placeholder="Email"
                                        name="email" />
                                </div>
                                <div class="form-group">
                                    <label for="pwd" class="sr-only">Password:</label>
                                    <input type="password" class="form-control" id="password" placeholder="Password"
                                        name="password" />
                                </div>

                                <div class="form-group">
                                    <label for="pwd" class="sr-only">Confirm Password:</label>
                                    <input type="password" class="form-control" id="confpassword"
                                        placeholder="Confirm Password" name="confpassword" />
                                    <small style="display: none" id="error-message" class="text-danger">Both password
                                        fields must match.</small>
                                </div>
                                <input type="button" name="save" class="btn btn-primary" value="Register"
                                    id="butsave" />
                            </form>
                            <form id="login_form" name="form1" method="post" style="display: none">
                                <h4>Assessor Login</h4>
                                <div class="form-group">
                                    <label for="pwd" class="sr-only">Email:</label>
                                    <input type="email" class="form-control" id="email_log" placeholder="Email"
                                        name="email-l" />
                                </div>
                                <div class="form-group">
                                    <label for="pwd" class="sr-only">Password:</label>
                                    <input type="password" class="form-control" id="password_log" placeholder="Password"
                                        name="password-l" />
                                </div>
                                <input type="button" name="save" class="btn btn-primary" value="Login" id="butlogin" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="./js/validation.js"></script>
    <script>
    $(document).ready(function() {
        $("#login").on("click", function() {
            $("#login_form").show();
            $("#register_form").hide();
        });
        $("#register").on("click", function() {
            $("#register_form").show();
            $("#login_form").hide();
        });
        $("#butsave").on("click", function() {
            $("#butsave").attr("disabled", "disabled");
            var name = $("#name").val();
            var email = $("#email").val();
            var password = $("#password").val();
            if (name != "" && email != "" && password != "") {
                $.ajax({
                    url: "./api/login_register.php",
                    type: "POST",
                    data: {
                        type: 1,
                        name: name,
                        email: email,
                        password: password,
                    },
                    cache: false,
                    success: function(dataResult) {
                        var dataResult = JSON.parse(dataResult);
                        if (dataResult.statusCode == 200) {
                            $("#butsave").removeAttr("disabled");
                            $("#register_form")[0].reset();
                            $("#success").show();
                            $("#success").html("Registration successful !").delay(3000)
                                .fadeOut(3000);;
                        } else if (dataResult.statusCode == 201) {
                            $("#error").show();
                            $("#error").html("Email ID already exists !").delay(3000)
                                .fadeOut(3000);
                        }
                    },
                });
            } else {
                $("#butsave").removeAttr("disabled");
                $("#error").show();
                $("#error").html("Please fill all the field !").delay(3000).fadeOut(3000);
            }
        });
        $("#butlogin").on("click", function() {
            var email = $("#email_log").val();
            var password = $("#password_log").val();

            if (email != "" && password != "") {
                console.log(email, password);
                $.ajax({
                    url: "./api/login_register.php",
                    type: "POST",
                    data: {
                        type: 2,
                        email: email,
                        password: password,
                    },
                    cache: false,
                    success: function(dataResult) {
                        var dataResult = JSON.parse(dataResult);
                        if (dataResult.statusCode == 200) {
                            location.href = "assessor.php";

                        } else if (dataResult.statusCode == 201) {
                            $("#login_form")[0].reset();
                            $("#error").show();
                            $("#error").html("Invalid credentials or Suspended account !")
                                .delay(3000)
                                .fadeOut(3000);
                        }
                    },
                });
            } else {
                $("#error").show();
                $("#error").html("Please fill all the field !").delay(3000).fadeOut(3000);
            }
        });
    });
    </script>
    <script src="./js/popper.min.js"></script>
    <script src="./js/bootstrap.js"></script>
</body>

</html>