<?php
require("./../includes/admin-check.php");
?>
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
        <div class="header_search">Welcome Admin <span
                style="color:red;"><?php echo ''.$_SESSION['adname'].'!';?></span></div>
        <div class="header_avatar"><a href="./logout.php" class="nav-link logout"> <span
                    class="d-none d-sm-inline confirmation">Logout</span><i class="fa fa-sign-out"></i></a></div>
    </header>
    <aside class="aside">
        <div class="aside_close-icon">
            <strong>&times;</strong>
        </div>
        <!-- <div>
            <img src="./../uploads/test.png" width="100" height="100" style="border-radius:50%; border:1px solid white;">
        </div> -->
        <ul class="aside_list">
            <li class="aside_list-item" id="brand"></li>
            <li class="aside_list-item" id="brand">Brand</li>
            <li class="aside_list-item" id="assesor">Assessors</li>
            <li class="aside_list-item" id="types">Types</li>
            <li class="aside_list-item" id="condition">Conditions</li>
            <li class="aside_list-item" id="accident">Accident Cond's</li>
            <li class="aside_list-item" id="company">Organization</li>
            <li class="aside_list-item" id="pwd">Password Setting</li>
             <li class="aside_list-item" id="logout">Logout</li>
        </ul>
    </aside>

    <!-- loading pages dynamically -->
    <script>
    $(document).ready(function() {
        $("#root").load('brand.php')

    });
    //logout
      $(document).ready(function() {
        $("#logout").click(function() {
             window.location = 'logout.php';
        });
    });
    //brand
    $(document).ready(function() {
        $("#brand").click(function() {
            $("#root").load('brand.php')
        });
    });
    //password settings
    $(document).ready(function() {
        $("#pwd").click(function() {
            $("#root").load('password.php')
        });
    });
    //assesors
    $(document).ready(function() {
        $("#assesor").click(function() {
            $("#root").load('assesor.php')
        });
    });
    //conditions
    $(document).ready(function() {
        $("#condition").click(function() {
            $("#root").load('condition.php')
        });
    });
    //Accident cond'
    $(document).ready(function() {
        $("#accident").click(function() {
            $("#root").load('accident.php')
        });
    });



    //Types or Categories
    $(document).ready(function() {
        $("#types").click(function() {
            $("#root").load('types.php')
        });
    });

    //Company
    $(document).ready(function() {
        $("#company").click(function() {
            $("#root").load('company.php')
        });
    });

    //logout
    $('.confirmation').on('click', function() {
        return confirm('Are you sure to logout?');
    });
    </script>

</body>

</html>