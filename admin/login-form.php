<?php
//Starting session
//session_start();

    include ("./../database/config.php");
     
     if($stmt = $db->prepare('SELECT admin_id,admin_password FROM admin WHERE admin_name= ?')){
        $stmt->bind_param('s',$_POST['username']);
        $stmt->execute();
        //store result so we can check if account exists in db
        $stmt->store_result();

        if($stmt->num_rows > 0){
            $stmt ->bind_result($admin_id, $admin_password);
            $stmt->fetch();

            if((md5($_POST['password'])== $admin_password)){
                session_regenerate_id();
                $_SESSION['loggedin'] = TRUE;
                $_SESSION['name']= $_POST['username'];
                $_SESSION['admin_id'] = $admin_id;
                // echo 'Welcome'.$_SESSION['name'].'!';
            //    header('Location:./../admin/dashboard.php');

            }else{
                $_SESSION['message'] = "Invalid username or password!!";
                
                // echo 'Incorrect password!';
            }
            if(isset($_SESSION["admin_id"])){
                header('Location:./dashboard.php');
                
            }
        }

        $stmt->close();
     }
?>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title></title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="./../css/bootstrap.min.css" />
    <link rel="stylesheet" href="./../css/form.css" />
</head>

<body>
    <div class="wrapper">
        <div class="form-container">
            <?php 
                if(isset($_SESSION["message"])) {
                ?>
            <div class="error-msg"><?php echo $_SESSION["message"]; ?></div>
            <?php 
                unset($_SESSION["message"]);
                } 
                ?>
            </div>
            <div class="form-inner">
                
                <form action="" class="login" method="post">
                    <h6 class="text-black-50  text-center">Admin Login</h6>
                    <div class="field">
                        <input type="text" placeholder="Username" name="username" id="username" required />
                    </div>
                    <div class="field">
                        <input type="password" placeholder="Password" name="password" id="password" required />
                    </div>
                    <div class="field btn">
                        <div class="btn-layer"></div>
                        <input type="submit" value="Login" />
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="./../js/jquery.js"></script>
    <script src="./../js/popper.min.js"></script>
    <script src="./../js/bootstrap.js"></script>
</body>

</html>