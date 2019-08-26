<?php 
	session_start();
	include('allUser.php');
	$Users = new Users;
	$userAssoc= $_SESSION['assocEmployee'];
	$error='';
	if($_POST)
	{
		$error=$Users->leaveEntry($post,$userAssoc['e_id']);
	}

?>


<html>
	<head>
		<meta charset="utf-8">
		<title>Untitled Document</title>
		<?php include('bootstrapIncluder.php')?>		
	</head>

	<body>
		<?php include('sidebar.php');?>
   		<div class="container">
	<div class="row">
		<form class="form-horizontal">
<fieldset>

<!-- Form Name -->
<legend>Your Information</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Your Name:</label>  
  <div class="col-md-4">
  <input id="name" name="name" type="text" placeholder="" class="form-control input-md" value="<?php echo $userAssoc['name']?>" disabled>
  <span class="help-block"></span>  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Security Id:</label>  
  <div class="col-md-4">
  <input id="security_id" name="security_id" type="text" placeholder="" class="form-control input-md" value="<?php echo $userAssoc['security_id']?>" disabled>
  <span class="help-block"></span>  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Email:</label>  
  <div class="col-md-4">
  <input id="email" name="email" type="email" placeholder="placeholder" class="form-control input-md" value="<?php echo $userAssoc['email']?>" disabled>
  <span class="help-block"></span>  
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Designation:</label>  
  <div class="col-md-4">
  <input id="designation" name="designation" type="text" placeholder="" class="form-control input-md" value="<?php echo $userAssoc['designation']?>" disabled>
  <span class="help-block"></span>  
  </div>
</div>

</fieldset>
</form>
</div>
    <div class="row">
        <form class="form-horizontal" action="home.php" method="post" name="requestValidation" onSubmit="return validation()">
<fieldset>

<!-- Form Name -->
<legend>Request for Leave</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Leave Status</label>  
  <div class="col-md-4">
  <select id="leavestatus" name="leavestatus" type="text" placeholder="placeholder" class="form-control input-md">
  	<option value="full_day">Full Day</option>
  	<option value="half_day">Half Day</option>
	  </select>
  <span class="help-block"></span>  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">From Date:</label>  
  <div class="col-md-4">
  <input required id="fromDate" name="fromDate" type="date" placeholder="placeholder" class="form-control input-md">
  <span class="help-block"></span>  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">To Date:</label>  
  <div class="col-md-4">
  <input required id="toDate" name="toDate" type="date" placeholder="placeholder" class="form-control input-md">
  <span class="help-block"></span>  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Reason:</label>  
  <div class="col-md-4">
  <textarea required id="reason" name="reason"  placeholder="placeholder" class="form-control input-md" rows="4"></textarea>
  <span class="help-block"></span>  
  </div>
</div>

<!-- Text input-->
<div class="container-fluid">
  <div class="row">
        <div class="col-md-6 text-right">
			<button type="submit" class="btn btn-primary custom-button-width .navbar-right">Submit</button>
    	</div>
  </div>
</div>


</fieldset>
</form>


    </div>
    <?php echo $error; ?>
</div>
    	
	</body>
</html>