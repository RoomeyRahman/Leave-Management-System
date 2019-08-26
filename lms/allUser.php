<?php
	class Users{
		public static  $dbName="lms";
		public static  $hostName="localhost";
		public static  $userName="root";		
		public static  $password="";
		public static  $port="";
		
		protected $assocrowfromUser;
		protected $assocrowfromEmployee;
		
		
		function __construct()
		{
			$bool= 0;
			if($this->connection = mysqli_connect(Users::$hostName,Users::$userName,Users::$password,Users::$dbName))
			{
				$bool=1;
			}
			else{
				$this->getError();
			}
			return($bool);
		}
		
		protected function getError()
		{
			if(mysqli_error($this->connection))
			{
				$error=mysqli_error($this->connection);
				echo ("<p style='color:red'>Mysql Connection Error".$error."</p>");
				return true;
			}
			else{
				return false;
			}
				
		}
		
		public function redpara($string)
		{
			$string1= "<p style='color:red'>".$string."</p>";
			return $string1;
		}
		
		public function greenpara($string)
		{
			$string1= "<p style='color:green;'>".$string."</p>";
			return $string1;
		}
		
		public function loginvalidation($post)
		{
			$username= $post['user_name'];
			$password= $post['password'];
			
			$sql = "select * from users where user_name='$username' and password = '$password';";
			$result = mysqli_query($this->connection,$sql);
			$this->getError();
			$error=array();
			$error['error']="";
			
			if(mysqli_num_rows($result)>0)
			{
				$this->assocrowfromUser = mysqli_fetch_assoc($result);
				//for admin
				if($this->assocrowfromUser['u_type']==0)
				{
					//admin login
				}
				else{
					$sql1= "select * from employee where e_id='".$this->assocrowfromUser['id']."';";
					$result1= mysqli_query($this->connection,$sql1);
					$this->getError();
					$this->assocrowfromEmployee=mysqli_fetch_assoc($result1);
				}
			}
			else{
				$error['error'] = $this->redpara("Username or password doesn't match");
			}	
			
			return $error;
			
		}
		
		public function getassocfromUser()
		{
			return($this->assocrowfromUser);
		}
		
		public function getassocfromEmployee()
		{
			return($this->assocrowfromEmployee);
		}
		
		public function getUser()
		{
			if($this->assocrowfromUser['u_type']==1)
				return true;
			else
				return false;
		}
		
		public function registration_dataEntry($post)
		{
			$name = $post['name'];
			$email = $post['email'];
			$security_id =$post['security_id'];
			$designation = $post['designation'];
			$username = $post['u_name'];
			$password = $post['password'];
			$error['error']='';
			
			$sql3="select * from users where user_name='$username';";
			$result3 = mysqli_query($this->connection,$sql3);
			$this->getError();
			$numrow= mysqli_num_rows($result3);
			
			if($numrow>0)
			{
				$error['error']="user already exist";
			}
			else{
				$sql= "insert into users(user_name,password) values('$username','$password');"; 
				$result = mysqli_query($this->connection,$sql);
				$this->getError();
			
				$sql1= "select * from users where user_name='$username';";
				$result1 = mysqli_query($this->connection,$sql1);
				$this->getError();
				$assoc = mysqli_fetch_assoc($result1);
			
				$e_id = $assoc['id'];
				$sql2= "insert into employee(e_id,name,email,security_id,designation) values('$e_id','$name','$email','$security_id','$designation');"; 
				$result2 = mysqli_query($this->connection,$sql2);
				$this->getError();
			}
			return($error['error']);
		}
		
		public function leaveEntry($post,$a_id)
		{
			$leaveStatus= $_POST['leavestatus'];
			$fromDate= $_POST['fromDate'];
			$toDate= $_POST['toDate'];
			$reason=$_POST['reason'];
			
			$sql= "insert into leave_application(a_id,status,fromDate,toDate,reason) values ('$a_id','$leaveStatus','$fromDate','$toDate','$reason');";
			$result= mysqli_query($this->connection,$sql);
			$this->getError();
			$error=$this->greenPara("You Successfully request for a leave application. Update will be notified soon");
			return $error;			
		}
		
		public function getleaverequestResult($a_id)
		{
			$sql = "select * from employee natural join leave_application where employee.e_id=leave_application.a_id and leave_application.a_id='$a_id';";
			$result = mysqli_query($this->connection,$sql);
			$this->getError();
			return ($result);			
		}
	}

	class admin extends Users{
		public function leave_request()
		{
			$sql = "select * from employee natural join leave_application where employee.e_id=leave_application.a_id and leave_application.type=0;";
			$result = mysqli_query($this->connection,$sql);
			$this->getError();
			return $result;
		}
		
		public function calculate_days($a_id)
		{
			$sql = "select fromDate,toDate from leave_application where a_id='$a_id' and type='0';";
			$result = mysqli_query($this->connection,$sql);
			$this->getError();
			$assoc = mysqli_fetch_assoc($result);
			$date1=$assoc['fromDate'];
			$date2=$assoc['toDate'];
			$s=new DateTime($date1);
			$e=new DateTime($date2);
			$diff=date_diff($s,$e);
			$this->getError();
			echo $diff->format("%a")+1;
			echo (" days");
		}
		
		public function acceptleave($a_id)
		{
			$sql ="update leave_application set type='1' where a_id='$a_id' and type = '0';";
			$result = mysqli_query($this->connection,$sql);
		}
		
		public function cancelleave($a_id)
		{
			$sql ="update leave_application set type='2' where a_id='$a_id' and type = '0';";
			$result = mysqli_query($this->connection,$sql);
			$this->getError();
		}
	}

?>