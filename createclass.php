<?php
require("connect.php");
require("CheckLogin.php");


$course = $_GET['course'];
$classroom = $_GET['classroom'];
$time = $_GET['time'];
$day = $_GET['day'];
$semester = $_GET['semester'];
$instructor = $_GET['instructor'];

$insertClass = "INSERT INTO course_classes (id, cid, classroom, day, time, instructor, semester, class_strength) VALUES (id, '$course', '$classroom', '$day', '$time', '$instructor', '$semester', '0')";

$mysqli->query($insertClass);

header("Location:NewClass.php?status=1");

?>