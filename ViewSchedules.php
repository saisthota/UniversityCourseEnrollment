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

    <title>View Schedules</title>

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
    $uid = $row['id'];
    $first_name = $row['first_name'];
    $last_name = $row['last_name'];
    $role = $row['role'];
    $email = $row['email'];
}
$_SESSION['uid'] = $uid;
?>
<?php include("nav.php");?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><i class="fa fa-calendar"></i> View Course Schedules</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <?php
                    if($role=="student") {?>
                    <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <?php
                                        if(isset($_GET['status'])) {?>
                                            <?php if($_GET['status']==1) {?>
                                                <div class="alert alert-success"><strong>Success!</strong> Your request for enrollment has been received and is awaiting approval.</div>
                                            <?php }?>
                                            <?php if($_GET['status']==2) {?>
                                                <div class="alert alert-success"><strong>Success!</strong> You have successfully disenrolled.</div>
                                            <?php }?>
                                            <?php }?>
                                        <h4>You are Currently Enrolled in</h4>
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                                <th><i class="glyphicon glyphicon-asterisk"></i> Sno.</th>
                                                <th><i class="glyphicon glyphicon-book"></i> Course Title</th>
												<th><i class="glyphicon glyphicon-book"></i> Status</th>
                                                <th><i class="glyphicon glyphicon-user"></i> Instructor</th>
                                                <th><i class="glyphicon glyphicon-home"></i> Class Room</th>
                                                <th><i class="glyphicon glyphicon-calendar"></i> Day</th>
                                                <th><i class="glyphicon glyphicon-time"></i> Time</th>
                                                <th><i class="glyphicon glyphicon-pencil"></i> Action</th>
                                            </thead>
<?php
$orders = "SELECT * FROM courses_enrolled WHERE sid='$uid'";
$currentOrders = $mysqli->query($orders);
$coursesList="";
?>
                                            <tbody>
                                                <?php 
                                                $i=0;
                                                while($row = $currentOrders->fetch_array()) {

                                                $i++;
                                                ?>
                                                <tr <?php if($row['status']==0) {?>class="alert alert-warning"<?php }?>>
                                                    <?php
                                                    $EnrolledCID = $row['cid'];?>
                                                    <td width="8%"><?php echo $i;?></td>
<?php
$getCourseTitle = "SELECT * FROM course_classes WHERE id='$EnrolledCID'";
$getCourse = $mysqli->query($getCourseTitle);
                                                 while($courseDetails = $getCourse->fetch_array()) {
                                                    $courseID = $courseDetails['cid'];
                                                    $coursesList .= $courseID.",";
                                                    //echo $coursesList;
                                                    $getCourseDetails = "SELECT * FROM courses WHERE id='$courseID'";
                                                    $CourseTitleQ = $mysqli->query($getCourseDetails);
                                                    while($CourseTitle = $CourseTitleQ->fetch_array()) {
                                                    ?>    
                                                        <td><?php echo $CourseTitle['course_title'];?> </td>
														<td><?php if($row['status']==0) {?>  Awaiting Approval<?php } else {?> Approved<?php } ?></td>
                                                    <?php } ?>
                                                    <td><?php echo $courseDetails['instructor'];?></td>   
                                                    
                                                    <td><?php echo $courseDetails['classroom'];?></td>
                                                    <td><?php echo $courseDetails['day'];?></td>
                                                    <td><?php echo $courseDetails['time'];?></td>
                                                    <td><a href="Disenroll.php?id=<?php echo $EnrolledCID;?>&cid=<?php echo $courseID; ?>"> <i class="glyphicon glyphicon-remove" style="color:red"></i> Drop</a></td>
                                                    <?php } ?>
                                                <?php }?>
                                                </tr>
                                            </tbody>
                                        </table> 
                                        <h4>Available Courses</h4>
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                                <th>Course ID#</th>
                                                <th>Course Title</th>
                                                <th>Instructor</th>
                                                <th>Day</th>
                                                <th>Time</th>
                                                <th>Action</th>
                                            </thead>
<?php

if(!empty($coursesList)) {
    $coursesList = substr($coursesList,0,strlen($coursesList)-1);
    $courses = "SELECT * FROM course_classes where cid NOT IN ($coursesList)";
}
else {
    $courses = "SELECT * FROM course_classes";
}
$coursesData = $mysqli->query($courses) or trigger_error($mysqli->error."[$courses]");;
?>
                                            <tbody>
                                                <?php while($row = $coursesData->fetch_array()) {?>
                                                <tr>
                                                    <?php
                                                    $CID = $row['cid'];
                                                    $CourseMeta = "SELECT * FROM courses WHERE id='$CID'";
                                                    $getCourseMetaQ = $mysqli->query($CourseMeta);
                                                    while($getCourseMeta = $getCourseMetaQ->fetch_array()) {
                                                    ?>
                                                    <td width="8%"><?php echo $getCourseMeta['course_id'];?></td>
                                                    <td><?php echo $getCourseMeta['course_title'];?></td>
                                                    <?php } ?>
                                                    <td><?php echo $row['instructor']; ?></td>
                                                    <td><?php echo $row['day'];?></td>
                                                    <td><?php echo $row['time'];?></td>
                                                    <td><a href="Enroll.php?id=<?php echo $row['id'];?>&cid=<?php echo $CID; ?>"><i class="glyphicon glyphicon-plus-sign"></i> Enroll</a></td>
                                                <?php } ?>
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
