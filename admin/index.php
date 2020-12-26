<?php
session_start();
if(!empty($_SESSION["adid"])){
    require_once './dashboard.php';
}
?>
<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <div class="main-container">
        <?php require_once "login-form.php";?>
    </div>

</body>

</html>