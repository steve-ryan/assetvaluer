<?php 
include ("./database/config.php");

?>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./css/bootstrap.min.css" />
    <link rel="stylesheet" href="./css/styles.css" />
    <script src="./js/jquery.js" type="text/javascript"></script>
</head>

<body>
    <div class="grid-container">
        <?php
      include ("./sidebar/assessor-sidebar.php");
      ?>
        <main class="main">
            <div class="col-md-12 ">
                    <div id="root">
                        <p class="text-center text-success">Kindly click on any <span class="text-danger">sidebar menu
                                item</span>!!</p>
                    </div>
            </div>
    </div>
    </main>
    </div>
    <script src="./js/main.js" type="text/javascript"></script>
    
</body>
</html>