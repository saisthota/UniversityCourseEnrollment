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

    <title>University of Central Missouri | CourseCentral Change Password</title>

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
	<script src="js/jquery.min.js"></script>
	<script type="text/javascript">
		function checkPassword(){
			var new_password = $("#new_password").val();
			var confirm_password = $("#confirm_password").val();
			var errors;
			if(new_password == confirm_password)
				return document.MM_returnValue = true;
			else 
				alert("Enter correct password");
				return document.MM_returnValue = false;
		}
	</script>

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
    $_SESSION['uid'] = $row['id'];
}
$uid = $_SESSION['uid'];
?>
<?php include("nav.php");?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Change Password</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-4">
                    <form name="changePwd" method="POST" action="ChangePasswordProcess.php">
                        <table class="table table-bordered">
                            <tr id="message" style="display:none">
                                <td colspan="2"><div class="alert alert-success"><strong>Password has been changed successfully!</strong></div></td>
                            </tr>
                            <tr>
                                <td>New Password:</td>
                                <td><input type="password" name="password" placeholder="New Password" id="new_password" class="form-control" required></td>
                            </tr>
							<tr>
                                <td>Confirm Password:</td>
                                <td><input type="password" name="password" placeholder="New Password" id="confirm_password" class="form-control" required></td>
                            </tr>
                            <tr>
                                <td colspan="2"><input type="submit" id="change" class="btn btn-primary" onclick="checkPassword();return document.MM_returnValue;" value="Change Password"></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
            <!-- /.row -->
            <p align="right"><img src="media/seal.png" width="160" height="160"></p>
            <div class="footer text-right">Handcrafted in Warrensburg with <i class="glyphicon glyphicon-heart" style="color:red"></i>. Developed by Batch Number 7.</div>
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

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
