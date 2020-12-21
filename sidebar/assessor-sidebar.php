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
        <div class="header_search">AssetValuer</div>
        <div class="header_avatar"><a href="./logout.php" class="nav-link logout"> <span class="d-none d-sm-inline confirmation">Logout</span><i class="fa fa-sign-out"></i></a></div>
    </header>
    <aside class="aside">
        <div class="aside_close-icon">
            <strong>&times;</strong>
        </div>
        <ul class="aside_list">
            <li class="aside_list-item" id="client">Client</li>
            <li class="aside_list-item" id="vehicle">Vehicle</li>
            <li class="aside_list-item" id="calc">Calc Value</li>
            <li class="aside_list-item" id="logout">Logout</li>
        </ul>
    </aside>

    <!-- loading pages dynamically -->
    <script>
    $(document).ready(function() {
        $("#client").click(function() {
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