<?php
	include('allUser.php');
	$a_id = $_GET['a_id'];
	$basicUser = new admin;
	$basicUser->acceptleave($a_id);
	header("Location: dashboard.php");
?>