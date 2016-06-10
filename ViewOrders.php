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

    <title>View Enrollment Requests</title>

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
    $role = $row['role'];
    $email = $row['email'];
}
?>
<?php include("nav.php");?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><i class="fa fa-tasks"></i> View Enrollment Requests</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <?php
                    if($role=="registrar") {?>
                    <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                                <th><i class="glyphicon glyphicon-asterisk"></i> Order ID#</th>
                                                <th><i class="glyphicon glyphicon-book"></i> Course Title</th>
                                                <th><i class="glyphicon glyphicon-user"></i> Student Name</th>
                                                <th><i class="glyphicon glyphicon-user"></i> Instructor</th>
                                                <th><i class="glyphicon glyphicon-home"></i> Class Room</th>
                                                <th><i class="glyphicon glyphicon-fire"></i> Class Current Strength</th>
                                                <th><i class="glyphicon glyphicon-wrench"></i> Actions</th>
                                            </thead>
<?php
$orders = "SELECT * FROM courses_enrolled WHERE status=0";
$currentOrders = $mysqli->query($orders);
?>
                                            <tbody>
                                                <?php while($row = $currentOrders->fetch_array()) {?>
                                                <tr>
                                                    <td><?php echo $row['id'];?></td>
                                                    <?php
                                                    $CID = $row['classid'];
                                                    $CourseMeta = "SELECT * FROM courses WHERE id='$CID'";
                                                    $getCourseMetaQ = $mysqli->query($CourseMeta);
                                                    while($getCourseMeta = $getCourseMetaQ->fetch_array()) {
                                                    ?>
                                                    
                                                    <td><?php echo $getCourseMeta['course_title'];?></td>
                                                    <?php } ?>
                                                    <td><?php
                                                        $studid = $row['sid'];
                                                        $sql = "SELECT first_name, last_name FROM users WHERE id='$studid'";
                                                        $record = $mysqli->query($sql);
                                                        while($studName = $record->fetch_array()) {
                                                            echo $studName['first_name'].' '.$studName['last_name'];
                                                        }?>
                                                        </td>
                                                    <?php
                                                    $cid = $row['cid'];
                                                    $class = "SELECT * FROM course_classes WHERE id='".$row['cid']."'";
                                                    $classroom = $mysqli->query($class);
                                                    while($getClassroomMeta = $classroom->fetch_array()) {?>
                                                        <td><?php echo $getClassroomMeta['instructor'];?></td>
                                                        <td><?php echo $getClassroomMeta['classroom'];?></td>
                                                        <td><?php echo $getClassroomMeta['class_strength'];?></td>    
                                                    <?php }?>
                                                    
                                                    <td><a href="RegistrarOrderAction.php?type=approve&id=<?php echo $row['id'];?>&cid=<?php echo $row['cid'];?>&sid=<?php echo $studid;?>"><i class="glyphicon glyphicon-ok-circle" style="color:green"></i>Approve</a> / <a href="RegistrarOrderAction.php?type=reject&id=<?php echo $row['id'];?>"><i class="glyphicon glyphicon-remove-circle" style="color:red"></i>Reject</a></td>
                                                    
                                                <?php }?>
                                                </tr>

                                            </tbody>
                                        </table> 
                                </div>
                    <?php }
                    else {
                        //No Access
                    }
                ?>
            </div>
            <!-- /.row -->
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
