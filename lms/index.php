<?php
	session_start();
	include("allUser.php");
	$Users = new Users;
	$error['error']="";
	$_SESSION['assocEmployee']="";

	if($_POST)
	{
		$error=$Users->loginvalidation($_POST);
		$_SESSION['assocUser']=$Users->getassocfromUser();
		if($error['error']=='')
		{
			if($Users->getUser()==true)
			{
				$_SESSION['assocEmployee']=$Users->getassocfromEmployee();
				header('location: home.php');
			}
			else{
				//admin
				header('location: dashboard.php');
				
			}
		}
	}

?>


<html>
	<head>
		<?php include('bootstrapIncluder.php'); ?>
	</head>	
	<body>
		<div class="container">

<div class="row" style="margin-top:20px">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
		<form role="form" method="post" action="#">
			<fieldset>
				<h2>Please Sign In</h2>
				<hr class="colorgraph">
				<div class="form-group">
                   	<label for="username" class="cols-sm-2 control-label">Username</label>
                    <input required type="text" name="user_name" id="user_name" class="form-control input-lg" placeholder="User Name">
				</div>
				<div class="form-group">
                   	<label for="password" class="cols-sm-2 control-label">Password</label>
                    <input required type="password" name="password" id="password" class="form-control input-lg" placeholder="Password">
				</div>
				<!--span class="button-checkbox">
					<button type="button" class="btn" data-color="info">Remember Me</button>
                    <input type="checkbox" name="remember_me" id="remember_me" checked="checked" class="hidden">
					<a href="" class="btn btn-link pull-right">Forgot Password?</a>
				</span-->
				
				<hr class="colorgraph">
				<?php if($error['error']!=""){echo($error['error']);} ?>
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-6">
                        <input type="submit" class="btn btn-lg btn-success btn-block" value="Sign In">
					</div>					
					<div class="col-xs-6 col-sm-6 col-md-6">
						<a href="register.php" class="btn btn-lg btn-primary btn-block">Register</a>
					</div>
				</div>
			</fieldset>
		</form>
	</div>
</div>

</div>
	</body>
</html>