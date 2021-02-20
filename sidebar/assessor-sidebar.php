<?php
require("./includes/assessor-check.php");
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <div class="menu-icon">
        <strong> &#9776;</strong>
    </div>
    <header class="header">
        <div class="header_search">Welcome assessor <span
                style="color:green;"><?php echo ''.$_SESSION['aname'].'!';?></div>
        <div class="header_avatar"><a href="./logout.php" class="nav-link logout"> <span class="d-none d-sm-inline confirmation">Logout</span><i class="fa fa-sign-out"></i></a></div>
    </header>
    <aside class="aside">
        <div class="aside_close-icon">
            <strong>&times;</strong>
        </div>
        <ul class="aside_list">
            <li class="aside_list-item" id="client1">Client</li>
            <li class="aside_list-item" id="vehicle">Vehicle</li>
            <li class="aside_list-item" id="calc">Calc Value</li>
            <li class="aside_list-item" id="pwd">Password Setting</li>
           <li class="aside_list-item" id="logout">Logout</li> 
    </aside>

    <!-- loading pages dynamically -->
    <script>
    //crazy
    $(document).ready(function() {  
            $("#root").load('client.php')   
    });
    //password settings
    $(document).ready(function() {
        $("#pwd").click(function() {
            $("#root").load('password.php')
        });
    });
    //logout
      $(document).ready(function() {
        $("#logout").click(function() {
             window.location = 'logout.php';
        });
    });

    $(document).ready(function() {
        $("#client1").click(function() {
            $("#root").load('client.php')
        });
    });
    //assesors
    $(document).ready(function() {
        $("#vehicle").click(function() {
            $("#root").load('vehicle.php')
        });
    });
    
    //computation
    $(document).ready(function() {
        $("#calc").click(function() {
            $("#root").load('value.php')
        });
    });
    //logout
    $('.confirmation').on('click', function() {
        return confirm('Are you sure to logout?');
    });
    </script>
</body>

</html>