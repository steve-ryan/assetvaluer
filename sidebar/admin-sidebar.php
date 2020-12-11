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
            <li class="aside_list-item" id="brand">Brand</li>
            <li class="aside_list-item" id="assesor">Assessors</li>
            <li class="aside_list-item" id="types">Types</li>
            <li class="aside_list-item" id="logout">Logout</li>
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
    //Types or Categories
    $(document).ready(function() {
        $("#types").click(function() {
            $("#root").load('types.php')
        });
    });

    //Test
    $(document).ready(function() {
        $("#logout").click(function() {
            $("#root").load('test.php')
        });
    });
    </script>
</body>

</html>