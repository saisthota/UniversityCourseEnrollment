<?php

if(isset($_GET['id'])&&isset($_GET['cid'])) {
	if(!empty($_GET['id'])&&!empty($_GET['cid'])) {
		$id = $_GET['id'];
		$cid = $_GET['cid'];

		require("connect.php");
		require("CheckLogin.php");
		$uid = $_SESSION['uid'];
		$EnrollToCourse = "INSERT INTO courses_enrolled (id, sid, cid, classid) VALUES (id, '$uid', '$id', '$cid')";
		
		if($mysqli->query($EnrollToCourse)) {
			$sql = "UPDATE courses_enrolled SET class_strength = class_strength + 1 WHERE classid='$cid'";
			$UpdateCourses = $mysqli->query($sql);
			header("Location:ViewSchedules.php?status=1");
		}
	}
}
else {
	header("Location:dashboard.php");
}
