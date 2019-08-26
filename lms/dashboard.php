<?php
	include("allUser.php");
	$admin = new admin;
?>

<!DOCTYPE html>
<html lang="en" class="no-js">
    <head>
		<meta charset="UTF-8" />
 
		<title>Blueprint: Slide and Push Menus</title>
		<?php include('bootstrapIncluder.php')?>
 
		<link href="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		
<style type="text/css">

.nav-tabs li a,
.nav-tabs li a:active,
.nav-tabs li a:focus { outline:0px !important; -webkit-appearance:none;  text-decoration:none;  color: #000000;}  

.panel {margin-top: 25px;}
.panel .panel-heading { padding: 5px 5px 0 5px;}
.panel .panel-body { min-height: 450px; }
.panel .panel-heading .nav-tabs {border-bottom: none;}
.panel .panel-heading .nav-tabs .icon-label {margin-left: 10px;}
.panel .panel-heading .btn {line-height: 2;}
</style>
		
<style>
 
.panel-edit
{
max-height: 0; 
overflow-y: hidden;	    
top: -50px; 
border: 0px;
-webkit-transition: max-height 0.8s cubic-bezier(0.17, 0.04, 0.03, 0.94); 
-moz-transition: 	max-height 0.8s cubic-bezier(0.17, 0.04, 0.03, 0.94);
-o-transition: 		max-height 0.8s cubic-bezier(0.17, 0.04, 0.03, 0.94);
transition: 		max-height 0.8s cubic-bezier(0.17, 0.04, 0.03, 0.94);
}

.open 
{        
max-height: 300px ; 		 
} 


#panel-content
{
padding: 10px;
margin-top: 5px;
border-top:1px solid #dddddd;
border-bottom:1px solid #dddddd;
height: 200px;
background-color: #fcfcfc;
}

</style>


<style>

.switch 
{ 
position: relative; 
display: inline-block; 
vertical-align: top; 
width: 102px; 
height: 31px; 
background-color: transparent; 
cursor: pointer; 
box-sizing: content-box; 
overflow: hidden; 
}

.switch-input:checked ~ .switch-handle 
{ 
left: 70px; 
}

.switch-label 
{ 
border-color: blue;
border-width:2px; 
border-radius: 2px; 
position: relative; 
display: block; 
height: 30px;  
font-size: 15px; 
text-transform: uppercase; 
background: none repeat scroll 0% 0% white; 
transition: all 0.15s ease-out 0s; 
}

.switch-handle 
{ 
position: absolute; 
top: 2px; 
left: 2px; 
width: 30px; 
height: 26px; 
border-width:1px; 
border-color: r;
border-radius: 1px; 
background: none repeat scroll 0% 0% white; 
transition: left 0.15s ease-out 0s; 
background-color: red;
}

.switch-input 
{ 
position: absolute; 
top: 0px; 
left: 0px; 
opacity: 0; 
}

.switch-label:before, 
.switch-label:after 
{ 
position: absolute; 
top: 50%; 
margin-top: -0.5em; 
line-height: 1; 
transition: inherit; 
}

.switch-label:before 
{ 
content: attr(data-off); 
right: 11px; 
color: rgb(209, 212, 215); 
}

.switch-label:after 
{ 
content: attr(data-on); 
left: 11px; 
border-color: red;
opacity: 0; 
}

.switch-input:checked ~ .switch-label { background: none repeat scroll 0% 0% red; }
.switch-input:checked ~ .switch-label:before { opacity: 0; }
.switch-input:checked ~ .switch-label:after { opacity: 1; }
 

.switch-default > .switch-input:checked ~ .switch-label { background: none repeat scroll 0% 0% rgb(209, 212, 215); }
 
</style>

<style>

.form-control 
{
background-color: #fff;
background-image: none;
border-radius: 4px;
box-shadow: none;
outline: none;
border-width: 2px;
color: #555;
display: block;
font-size: 14px;
height: 34px;
line-height: 1.42857;
padding: 6px 12px;
transition: border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s;
width: 100%;
}


.form-control:focus 
{
border-color: #66afe9;
box-shadow: none;
outline: none;
border-width: 2px;
}


 </style>
 
</head>
 
	<body>
 
	<div class="container" style="padding: 40px">
	
		<div class="panel panel-default">
 
			<div class="panel-heading">
						
				<span class="panel-title">

					<div class="pull-left">
						<ul class="nav nav-tabs">
							<!--li class="active"><a href="#tab1" data-toggle="tab"><i class="glyphicon glyphicon-print"></i>All Employee</a></li-->
							<li class="active"><a href="" data-toggle="tab"><i class="glyphicon glyphicon-send"></i>Leave Request</a></li>
						</ul>
					</div>
					
    				<div class="btn-group pull-right">
    					<a href="logout.php"><button class="btn btn btn-default" id="showTop"><span class="icon-label"></span>Log out</button>
    				</div></a>
					
					<div class="clearfix"></div>
	
				</span>
							
			</div>
		
			<div class="panel-edit" id="panel-edit">
			
				<div id="panel-content">
		
					
 
				</div>
				
			</div>
			
			<div class="panel-body">
				<?php
					$result= $admin->leave_request();
					$numrow= mysqli_num_rows($result);
					if($numrow>0)
					{ ?>
						<table class="table table-inverse">
		  					<thead>
								<tr>
									<th width="9%">Security Id</th>
			  						<th width="16%">Name</th>
			  						<th width="15%">Leave Status</th>
			  						<th width="11%">From Date</th>
			  						<th width="11%">To Date</th>
			  						<th width="9%">Total Day</th>
			  						<th width="16%">Reason</th>
								</tr>
		  					</thead>
		  					
							<?php
								
								while($assoc = mysqli_fetch_assoc($result))
								{
							?>
							<tbody>
							<tr>
									<th width="9%"><?php echo $assoc['security_id'] ?></th>
			  						<th width="16%"><?php echo $assoc['name'] ?></th>
			  						<th width="15%"><?php echo $assoc['status'] ?></th>
			  						<th width="11%"><?php echo $assoc['fromDate'] ?></th>
			  						<th width="11%"><?php echo $assoc['toDate'] ?></th>
			  						<th width="9%"><?php $day=$admin->calculate_days($assoc['a_id']);?></th>
			  						<th width="20%"><?php echo $assoc['reason'] ?></th>
			  						<th><a href="accept.php?a_id=<?php echo($assoc['a_id'])?>" class="btn btn-success"><span class="glyphicon glyphicon-ok"></span> Accept</a></th>
			  						<th><a href="cancel.php?a_id=<?php echo($assoc['a_id'])?>" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Reject</a></th>
			  						
								</tr>	
							</tbody>
				
							<?php } ?>
						<?php } ?>
								
						</table>
											
			</div>

		</div>
		
	</div>
		
		
		<!-- Classie - class helper functions by @desandro https://github.com/desandro/classie -->
		<script src="https://raw.githubusercontent.com/desandro/classie/master/classie.js"></script>
		<script>
			var
				
				menuTop = document.getElementById( 'panel-edit' ),
				showTop = document.getElementById( 'showTop' ),
				body = document.body;

			showTop.onclick = function()
			{
				classie.toggle( menuTop, 'open' );
 
			};

		</script>
	</body>
</html>
