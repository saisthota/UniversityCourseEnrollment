<?php
require("connect.php");
require("CheckLogin.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>University of Central Missouri | CourseCentral Dashboard</title>

    <link rel="shortcut icon" href="media/ucm.png" type="image/x-icon">

    <!-- Bootstrap Core CSS -->
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="dist/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="bower_components/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        
<?php

$sql = "SELECT * FROM users WHERE username = '$user'";
$record = $mysqli->query($sql);
while($row = $record->fetch_array()) {
    $first_name = $row['first_name'];
    $last_name = $row['last_name'];
    $email = $row['email'];
    $role = $row['role'];
}
?>
<?php include("nav.php");?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Hello <?php echo $first_name.', '.$last_name;?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <?php
                    if($role=="admin") {?>
                    <div class="row">
                                    <div class="col-lg-3 col-md-6">
                                        <div class="panel panel-primary">
                                            <div class="panel-heading">
                                                <div class="row">
                                                    <div class="col-xs-3">
                                                        <i class="fa fa-university fa-5x"></i>
                                                    </div>
                                                    <div class="col-xs-9 text-right">
                                                        <div>Open New Class</div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="NewClass.php">
                                                <div class="panel-footer">
                                                    <span class="pull-left">Create Now</span>
                                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="panel panel-green">
                                            <div class="panel-heading">
                                                <div class="row">
                                                    <div class="col-xs-3">
                                                        <i class="fa fa-wrench fa-5x"></i>
                                                    </div>
                                                    <div class="col-xs-9 text-right">
                                                        <div>Maintain Student Records</div>
                                                    </div>
                                                </div>
                                            </div>
                                           <a href="Maintain.php">
                                                <div class="panel-footer">
                                                    <span class="pull-left">Maintain</span>
                                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                  
                                </div>
                    <?php }
                    elseif ($role=="student") {?>
                                <div class="col-lg-3 col-md-6">
                                        <div class="panel panel-primary">
                                            <div class="panel-heading">
                                                <div class="row">
                                                    <div class="col-xs-3">
                                                        <i class="fa fa-calendar fa-5x"></i>
                                                    </div>
                                                    <div class="col-xs-9 text-right">
                                                        <div>Enroll to Classes</div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="ViewSchedules.php">
                                                <div class="panel-footer">
                                                    <span class="pull-left">View Schedules</span>
                                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                    <?php }
                    else {?>
                                <div class="col-lg-3 col-md-6">
                                        <div class="panel panel-primary">
                                            <div class="panel-heading">
                                                <div class="row">
                                                    <div class="col-xs-3">
                                                        <i class="fa fa-tasks fa-5x"></i>
                                                    </div>
                                                    <div class="col-xs-9 text-right">
                                                        <div>View Orders</div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="ViewOrders.php">
                                                <div class="panel-footer">
                                                    <span class="pull-left">View Orders</span>
                                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                    <?php }
                ?>
            </div>
            <!-- /.row -->
            <p align="right"><img src="media/seal.png" width="160" height="160"></p>
            <div class="footer text-right">Handcrafted in Warrensburg with <i class="glyphicon glyphicon-heart" style="color:red"></i>. Developed by Batch Number 7 (13676).</div>
        </div>
        <!-- /#page-wrapper -->
    
    </div>

    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="bower_components/raphael/raphael-min.js"></script>
    <script src="bower_components/morrisjs/morris.min.js"></script>
    <script src="../js/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
