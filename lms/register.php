<?php
	include("allUser.php");
	$Users = new Users;
	$error = array();
	if($_POST)
	{
		$error=$Users->registration_dataEntry($_POST);
	}
?>



<html>
	<head>
		<?php include('bootstrapIncluder.php'); ?>
		<script>
			function registrationValidation()
			{
				var name = document.forms["validationForm"]["name"].value;
				var email = document.forms["validationForm"]["email"].value;
				var secruity_id =document.forms["validationForm"]["security_id"].value;
				var designation = document.forms["validationForm"]["designation"].value;
				var username = document.forms["validationForm"]["u_name"].value;
				var password = document.forms["validationForm"]["password"].value;
				var c_password = document.forms["validationForm"]["confirm"].value;
		
				if(username.length<4)
				{
					alert("User Name must contain atleast 5 character long");				
					username.focus();
					return false;
				}
				if(password != c_password)
				{
					alert("Both Field must be same");
					c_password.focus();
					return false;
				}
				return true;
			}
		</script>
	</head>	
	<body>
		<div   class="col-sm-10 col-sm-offset-5 col-md-4 col-md-offset-4 main">
			<div class="row main">
				<div class="panel-heading">
	               <div class="panel-title text-center">
	               		<h1 class="title">LMS</h1>
	               		<hr />
	               	</div>
	            </div> 
				<div class="main-login main-center">
					<form class="form-horizontal" method="post" action="register.php" name="validationForm" onSubmit="return registrationValidation();">
					
					
						
						<div class="form-group">
							<label for="name" class="cols-sm-2 control-label">Your Name</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
									<input type="text" class="form-control" name="name" id="name"  placeholder="Enter your Name" required/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="email" class="cols-sm-2 control-label">Email</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input required type="text" class="form-control" name="email" id="email"  placeholder="Enter your Email"/>
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<label for="email" class="cols-sm-2 control-label">Security Id</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input required type="text" class="form-control" name="security_id" id="security_id"  placeholder="Enter your Security Id"/>
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<label for="email" class="cols-sm-2 control-label">Designation</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
									<input required type="text" class="form-control" name="designation" id="designation"  placeholder="Enter your designation"/>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="username" class="cols-sm-2 control-label">Username</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
									<input required type="text" class="form-control" name="u_name" id="u_name"  placeholder="Enter your Username"/>
								</div>
							</div>
						</div>
						
						
						<div class="form-group">
							<label for="password" class="cols-sm-2 control-label">Password</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input required type="password" class="form-control" name="password" id="password"  placeholder="Enter your Password"/>
								</div>
							</div>
						</div>
						

						<div class="form-group">
							<label for="confirm" class="cols-sm-2 control-label">Confirm Password</label>
							<div class="cols-sm-10">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
									<input required type="password" class="form-control" name="confirm" id="confirm"  placeholder="Confirm your Password"/>
								</div>
							</div>
						</div>
						
						

						<div class="form-group ">
							<button type="submit" class="btn btn-primary btn-lg btn-block login-button">Register</button>
						</div>
						<div class="form-group">
							<a href="index.php" style="color:white;"><div class="btn btn-lg btn-success btn-block">Sign in</div></a>
						</div>
					</form>					
				</div>
			</div>
			<?php
				if($_POST){
					if(count($error)!=0){
						$string =$Users->greenpara("Successfully Registered");
						echo $string;
					}
				}
							
			?>
		</div>
	</body>
</html>