<?php
session_start();
require("connect.php");

$username = $_POST['username'];
$password = $_POST['password'];

$username = $mysqli->real_escape_string($username);
$password = $mysqli->real_escape_string($password);

$password = md5($password);

$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$user = $mysqli->query($sql);
$userCount = $user->num_rows;

if($userCount) {
	$_SESSION['user'] = $username;
	header("Location:dashboard.php");
}
else {
	header("Location:login.php?error=1");
}