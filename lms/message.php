<!doctype html>
<html>
<head>
<?php
	include('allUser.php');
	session_start();
	$employeeAssoc = $_SESSION['assocEmployee'];
	$allUser=new Users;

?>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<?php include('bootstrapIncluder.php')?>
</head>

<body>
<?php include('sidebar.php');?>
								
		<table class="table table-inverse">
		  <thead>
			<tr>
			  <th width="9%">Security Id</th>
			  <th width="17%">Name</th>
			  <th width="17%">From Date</th>
			  <th width="20%">To Date</th>
			  <th width="20%">Status</th>
			  
			</tr>
		  </thead>
		  <tbody>
		  <?php
			$temp=$allUser->getleaverequestResult($employeeAssoc['e_id']);
			$count = 0;
			while($result = mysqli_fetch_assoc($temp)){
			  ?>
			<tr>
			  <td><?php echo($result['security_id'])?></td>
			  <td><?php echo($result['name'])?></td>
			  <td><?php echo($result['fromDate'])?></td>
			  <td><?php echo($result['toDate'])?></td>			  
			  <th><?php if($result['type']==0){
				  			echo("your appointment is pending");
			  			} 
						else if($result['type']==1){
							$string = $allUser->greenpara("your appointment is in accepted");
							echo $string;
						}
						else {
							$string = $allUser->redpara("your appointment is in rejected");
							echo $string;
						}?>
			</th>
			 
			</tr>
				
			<?php
				 }
			  	?>
			
		  </tbody>
		</table>
	</body>
	</html>
