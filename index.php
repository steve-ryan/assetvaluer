<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title></title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="./css/bootstrap.min.css" />
    <link rel="stylesheet" href="./css/form.css" />
    <script src="./js/jquery.js"></script>
</head>

<body>
    <div class="wrapper">
        <div class="title-text">
            <div class="title login">Login Form</div>
            <div class="title signup">Signup Form</div>
        </div>
        <div class="form-container">
            <div class="alert alert-success alert-dismissible" id="success" style="display:none;">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">x</a>
            </div>

            <div class="alert alert-danger alert-dismissible" id="error" style="display:none;">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">x</a>
            </div>
            <div class="slide-controls">
                <input type="radio" name="slide" id="login" checked />
                <input type="radio" name="slide" id="signup" />
                <label for="login" class="slide login">Login</label>
                <label for="signup" class="slide signup">Signup</label>
                <div class="slider-tab"></div>
            </div>
            <div class="form-inner">
                <form action="" class="login" method="POST">
                    <div class="field">
                        <input type="text" placeholder="Email Address" name="email-l" id="email-l" required />
                    </div>
                    <div class="field">
                        <input type="password" placeholder="Password" name="password-l" id="password-l" required />
                    </div>

                    <div class="field btn">
                        <div class="btn-layer"></div>
                        <input type="submit" value="Login" id="btnLogin" />
                    </div>
                    <div class="signup-link">
                        Not an assessor? <a href="">Signup now</a>
                    </div>
                </form>
                <form id="register_form" method="POST" class="signup">
                    <div class="field">
                        <input type="text" placeholder="Name" name="name" id="name" required />
                    </div>
                    <div class="field">
                        <input type="text" placeholder="Email Address" name="email" id="email" required />
                    </div>
                    <div class="field">
                        <input type="password" placeholder="Password" name="password" id="password" required />
                    </div>
                    <div class="field">
                        <input type="password" placeholder="Confirm password" required />
                    </div>
                    <div class="field btn">
                        <div class="btn-layer"></div>
                        <input type="submit" value="Signup" id="btnRegister" />
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
    const loginText = document.querySelector(".title-text .login");
    const loginForm = document.querySelector("form.login");
    const loginBtn = document.querySelector("label.login");
    const signupBtn = document.querySelector("label.signup");
    const signupLink = document.querySelector("form .signup-link a");
    signupBtn.onclick = () => {
        loginForm.style.marginLeft = "-50%";
        loginText.style.marginLeft = "-50%";
    };
    loginBtn.onclick = () => {
        loginForm.style.marginLeft = "0%";
        loginText.style.marginLeft = "0%";
    };
    signupLink.onclick = () => {
        signupBtn.click();
        return false;
    };
    </script>
    <script>
    $(document).ready(function() {
        $('#btnRegister').on('click', function() {
            $("#btnRegister").attr("disabled", "disabled");
            var name = $('#name').val();
            var email = $('#email').val();
            var password = $('#password').val();

            console.log(name, email, password);
            if (name != "" && email != "" && password != "") {
                $.ajax({
                    url: "./api/assessor_login_register.php",
                    type: "POST",
                    data: {
                        type: 1,
                        name: name,
                        email: email,
                        password: password
                    },
                    cache: false,
                    success: function(dataResult) {
                        var dataResult = JSON.parse(dataResult);
                        if (dataResult.statusCode == 200) {
                            $("#btnRegister").removeAttr("disabled");
                            $('#register_form')[0].reset();
                            $("#success").show();
                            $('#success').html('Registration successful !').delay(3000)
                                .fadeOut(3000);
                                location.href = "assessor.php";
                        } else if (dataResult.statusCode == 201) {
                            $("#error").show();
                            $('#error').html('Email ID already exists !').delay(3000)
                                .fadeOut(3000);
                        }

                    }
                });
            } else {
                alert('Please fill all the field !');
            }
        });
        $('#btnLogin').on('click', function() {
          $("#btnLogin").attr("disabled", "disabled");
            var email = $('#email-l').val();
            var pwd = $('#password-l').val();
            // console.log(email,password);
            if (email != "" && password != "") {
                $.ajax({
                    url: "./api/assessor_login_register.php",
                    type: "POST",
                    data: {
                        type: 2,
                        email: email,
                        password: password
                    },
                    cache: false,
                    success: function(dataResult) {
                        var dataResult = JSON.parse(dataResult);
                        if (dataResult.statusCode == 200) {
                            location.href = "assessor.php";
                            // alert("You are crazy!!");
                        } else if (dataResult.statusCode == 201) {
                            $("#error").show();
                            $('#error').html(
                                'Invalid EmailId or Password or account is inactive !').delay(3000).fadeOut(3000);
                        }

                    }
                });
            } else {
                $("#error").show();
                $('#error').html('Please fill all the field !').delay(3000).fadeOut(3000);
            }
        });
    });
    </script>
    <script src="./js/popper.min.js"></script>
    <script src="./js/bootstrap.js"></script>
</body>
</html>