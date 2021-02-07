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
        <div class="header_search"><?php echo 'Welcome Admin ';?></div>
        <div class="header_avatar"><a href="./logout.php" class="nav-link logout"> <span
                    class="d-none d-sm-inline confirmation">Logout</span><i class="fa fa-sign-out"></i></a></div>
    </header>
    <aside class="aside">
        <div class="aside_close-icon">
            <strong>&times;</strong>
        </div>
        <ul class="aside_list">
            <li class="aside_list-item" id="brand">Brand</li>
            <li class="aside_list-item" id="assesor">Assessors</li>
            <li class="aside_list-item" id="types">Types</li>
            <li class="aside_list-item" id="condition">Conditions</li>
             <li class="aside_list-item" id="accident">Accident Cond's</li>
        </ul>
    </aside>

    <!-- loading pages dynamically -->
    <script>
    $(document).ready(function() {
        $("#brand").click(function() {
            $("#root").load('brand.php')
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

    //logout
    $('.confirmation').on('click', function() {
        return confirm('Are you sure to logout?');
    });
    </script>

</body>

</html>