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

    <title>Open a New Class</title>

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
                    <h1 class="page-header">Open a New Class</h1>
                    <?php
if(isset($_GET['status'])){
    if($_GET['status']=="1") {?>
        <div class="alert alert-success"><strong>Success!</strong> Class has been created!</div>
    <?php }
}
?> 
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <?php
                    if($role=="admin") {?>
                    <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                    <form action="createclass.php" method="get">
                                        <table class="table table-bordered">
                                            <tr>
                                                <td>Course</td>
                                                <td>
<?php
$courses = "SELECT * FROM courses ORDER BY course_id ASC";
$courseRecords = $mysqli->query($courses);
?>
                                                    <select name="course" class="form-control">
                                                        <option value="-1">Select</option>
                                                        <?php while($row = $courseRecords->fetch_array()) {?>
                                                        <option value="<?php echo $row['id'];?>"><?php echo $row['course_id'];?> - <?php echo $row['course_title']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Class Room</td>
                                                <td>
                                                        <select name="classroom" class="form-control">
                                                        <option value="-1">Select</option>
                                                        <option value="CS125">CS125</option>
                                                        <option value="CS126">CS126</option>
                                                        <option value="CS130">CS130</option>
                                                        <option value="CS140">CS140</option>
                                                        <option value="CS145">CS145</option>
                                                    </select>
                                                </td>
                                            </tr>

<?php
$instructors = "SELECT * FROM users WHERE role='instructor' ORDER BY first_name ASC";
$getInstructors = $mysqli->query($instructors);
?>
                                            <tr>
                                                <td>Instructor</td>
                                                <td>
                                                    <select name="instructor" class="form-control">
                                                        <option value="-1">Select</option>
                                                        <?php while($row = $getInstructors->fetch_array()) {?>
                                                        <option value="<?php echo $row['first_name'].' '.$row['last_name'];?>"><?php echo $row['first_name'].' '.$row['last_name']; ?></option>
                                                            <?php }?>
                                                    </select>
                                            <tr>
                                                <td>Time</td>
                                                <td>
                                                <select name="time" class="form-control"><option value="00:00">12:00 Midnight</option><option value="00:30">12:30 AM</option><option value="01:00">01:00 AM</option><option value="01:30">01:30 AM</option><option value="02:00">02:00 AM</option><option value="02:30">02:30 AM</option><option value="03:00">03:00 AM</option><option value="03:30">03:30 AM</option><option value="04:00">04:00 AM</option><option value="04:30">04:30 AM</option><option value="05:00">05:00 AM</option><option value="05:30">05:30 AM</option><option value="06:00">06:00 AM</option><option value="06:30">06:30 AM</option><option value="07:00">07:00 AM</option><option value="07:30">07:30 AM</option><option value="08:00">08:00 AM</option><option value="08:30">08:30 AM</option><option value="09:00">09:00 AM</option><option value="09:30">09:30 AM</option><option value="10:00">10:00 AM</option><option value="10:30">10:30 AM</option><option value="11:00">11:00 AM</option><option value="11:30">11:30 AM</option><option value="12:00">12:00 Noon</option><option value="12:30">12:30 PM</option><option value="13:00">01:00 PM</option><option value="13:30">01:30 PM</option><option value="14:00">02:00 PM</option><option value="14:30">02:30 PM</option><option value="15:00">03:00 PM</option><option value="15:30">03:30 PM</option><option value="16:00">04:00 PM</option><option value="16:30">04:30 PM</option><option value="17:00">05:00 PM</option><option value="17:30">05:30 PM</option><option value="18:00" selected="selected">06:00 PM</option><option value="18:30">06:30 PM</option><option value="19:00">07:00 PM</option><option value="19:30">07:30 PM</option><option value="20:00">08:00 PM</option><option value="20:30">08:30 PM</option><option value="21:00">09:00 PM</option><option value="21:30">09:30 PM</option><option value="22:00">10:00 PM</option><option value="22:30">10:30 PM</option><option value="23:00">11:00 PM</option><option value="23:30">11:30 PM</option></select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Day</td>
                                                <td>
                                                    <select name="day" class="form-control">
                                                        <option value="-1">Select</option>
                                                        <option value="M">Monday</option>
                                                        <option value="T">Tuesday</option>
                                                        <option value="W">Wednesday</option>
                                                        <option value="R">Thursday</option>
                                                        <option value="F">Friday</option>
                                                        <option value="S">Saturday</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Sem</td>
                                                <td>
                                                    <select name="semester" class="form-control">
                                                        <option value="-1">Select</option>
                                                        <option value="s2016">Spring 2016</option>
                                                        <option value="f2015">Fall 2015</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2"><input type="submit" value="Create Class" class="btn btn-lg btn-success"></td>
                                            </tr>
                                  </table>
                              </form>
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
