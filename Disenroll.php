<?php

if(isset($_GET['id'])&&isset($_GET['cid'])) {
	if(!empty($_GET['id'])&&!empty($_GET['cid'])) {
		$id = $_GET['id'];
		$cid = $_GET['cid'];

		require("connect.php");
		require("CheckLogin.php");
		$uid = $_SESSION['uid'];
		$DisenrollToCourse = "DELETE FROM courses_enrolled WHERE sid='$uid' AND cid='$id' AND classid='$cid'";
		if($mysqli->query($DisenrollToCourse)) {
			header("Location:ViewSchedules.php?status=2");
		}
	}
}
else {
	header("Location:dashboard.php");
}
