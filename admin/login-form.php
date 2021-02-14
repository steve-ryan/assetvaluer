<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title></title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="./../css/bootstrap.min.css" />
    <link rel="stylesheet" href="./../css/assessor.css" />
    <script src="./../js/jquery.js"></script>
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

                            <form id="login_form" name="form1" method="post">
                                <h4>Admin Login</h4>
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
                                <input type="button" name="save" class="btn btn-primary" value="Login" id="btnlogin" />

                                </button>
                                 <a href="./../#"> <button type="button" class="btn btn-danger" >
                                   Home
                                </button></a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
    $(document).ready(function() {
        $("#btnlogin").on("click", function() {
            var email = $("#email_log").val();
            var password = $("#password_log").val();

            if (email != "" && password != "") {
                
                $.ajax({
                    url: "./../api/login_register.php",
                    type: "POST",
                    data: {
                        type: 3,
                        email: email,
                        password: password,
                    },
                    cache: false,
                    success: function(dataResult) {
                        var dataResult = JSON.parse(dataResult);
                        if (dataResult.statusCode == 200) {
                            location.href = "dashboard.php";
                        } else if (dataResult.statusCode == 201) {
                            $("#login_form")[0].reset();
                            $("#error").show();
                            $("#error").html("Invalid credentials!").delay(3000)
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
    <script src="./../js/popper.min.js"></script>
    <script src="./../js/bootstrap.js"></script>
</body>

</html>