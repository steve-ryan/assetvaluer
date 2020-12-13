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
        <div class="header_avatar">Logout</div>
    </header>
    <aside class="aside">
        <div class="aside_close-icon">
            <strong>&times;</strong>
        </div>
        <ul class="aside_list">
            <li class="aside_list-item" id="client">Client</li>
            <li class="aside_list-item" id="vehicle">Vehicle</li>
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
    // test
    $(document).ready(function() {
        $("#logout").click(function() {
            $("#root").load('test.php')
        });
    });
    </script>
</body>

</html>