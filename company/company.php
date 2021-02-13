<?php 
include ("./../database/config.php");
?>

<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./../css/bootstrap.min.css" />
    <link rel="stylesheet" href="./../css/styles.css" />
    <script src="./../js/jquery.js" type="text/javascript"></script>

</head>

<body>
    <div class="grid-container">
        <?php
   include ("./../sidebar/company-sidebar.php");
   ?>
        <main class="main">
            <div class="main_overview">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2 bg-light border-success">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                <a href="#" class="card-link" id="brand">
                                                    Clients</a>
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                $cid=$_SESSION['cid'];
                         $client = "SELECT count(DISTINCT client_id) FROM vehicle WHERE company_id='$cid'";
                                                    $result=mysqli_query($db,$client);
                                                    $row=mysqli_fetch_array($result);
                                                    echo "$row[0]";
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Reports -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2 bg-light border-success">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                <a href="#" class="card-link" id="assesor">
                                                    Reports</a>
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                    $cid=$_SESSION['cid'];
                                                    $report = "SELECT count('report_id') FROM report WHERE company_id='$cid'";
                                                    $result=mysqli_query($db,$report);
                                                    $row=mysqli_fetch_array($result);
                                                    echo "$row[0]";
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Vehicles -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2 bg-light border-success">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                <a href="#" class="card-link">
                                                    Vehicles</a>
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                    $cid=$_SESSION['cid'];
                                                    $vehicle = "SELECT count('vehicle_id') FROM vehicle WHERE company_id='$cid'";
                                                    $result=mysqli_query($db,$vehicle);
                                                    $row=mysqli_fetch_array($result);
                                                    echo "$row[0]";
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                    </div>
                </div>
                <!-- Dynamically load page -->
                <div class="col-md-12 ">
                    <div id="root">
                        <p class="text-center text-success">Kindly click on any <span class="text-danger">sidebar
                                menu item</span>!!</p>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script src="./../js/main.js" type="text/javascript"></script>
    <script src="./../js/popper.min.js"></script>
    <script src="./../js/bootstrap.min.js"></script>
    <script src="./../js/bootstrap.js"></script>

</body>

</html>