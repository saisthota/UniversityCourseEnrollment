<?php
require("connect.php");
require("CheckLogin.php");

$oid = $_GET['id'];
$sid = $_GET['sid'];
$cid = $_GET['cid'];
$type = $_GET['type'];

if($type=="approve") {
	$sql = "UPDATE course_classes SET class_strength = class_strength + 1 WHERE id='$cid'";
	$UpdateCourses = $mysqli->query($sql);

	$sql = "UPDATE courses_enrolled SET status=1 WHERE id='$oid' and sid='$sid' AND cid='$cid'";
	$insertCourse = $mysqli->query($sql);

	header("Location:ViewOrders.php");
}

if($type=="reject") {
	$sql = "DELETE FROM courses_enrolled WHERE id='$oid'";
	$DeleteOrder = $mysqli->query($sql);
	header("Location:ViewOrders.php");
}
