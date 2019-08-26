<?php
	include('allUser.php');
	$a_id = $_GET['a_id'];
	$basicUser = new admin;
	$basicUser->cancelleave($a_id);
	header("Location: dashboard.php");
?>