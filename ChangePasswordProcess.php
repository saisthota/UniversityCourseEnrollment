<?php
require("checklogin.php");
require("connect.php");

$uid = $user;
$password = $_POST['password'];

$password = md5($password);

$sql = "UPDATE users SET password = '$password' WHERE username='$uid'";

if($mysqli->query($sql)) {
	header("Location:logout.php");
}
else {
	die($mysqli->error());
}
?>