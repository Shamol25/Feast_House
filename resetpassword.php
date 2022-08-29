<!DOCTYPE html>
<html>
<head>
	<title>REset Password</title>


	 <meta charset="utf-8">
	 <link rel="stylesheet" type="text/css" href="index.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body class="bg">
	<div class="container-fluid ">
	<div class="row">
	
		
	<form class="form col-md-4 form_container" method="POST">
  			<div class="form-group">
  				<center><h3 id="font">Reset Password</h3> </center><br/>
				    </div>
            <div class="form-group ">
              <label class="color">Email</label>
              <input type="email" name="email" class="form-control" name="email" placeholder="Enter email" required>
            </div>
				    <div class="form-group ">
				    <label class="color">Password</label>
				    <input type="password" class="form-control" name="password"  placeholder="Enter Password" required>
				  	</div>

            <div class="form-group ">
              <label class="color">Re-type Password</label>
              <input type="password"  class="form-control" name="retype_password" placeholder="Re-type the Password" required>
            </div>
            
				  <button type="submit" class="btn btn-success btn-block" name="submit">Submit</button>

			

	</form>



</body>
</html>

<?php
include_once('dbconfig.php');
if(isset($_POST['submit'])){

  $email = $_POST['email'] ;
  $password = $_POST['password'] ;
  $retype_password = $_POST['retype_password'];
  
 $result = mysqli_query($conn,  "SELECT * FROM registration WHERE email = '$email'");


  if(mysqli_num_rows($result) >0 ){
	  
	 if($password == $retype_password)
	{
	
	
	if(strlen($password) >= 8)
	   {
		   if(!ctype_upper($password) && !ctype_lower($password))
		   {
			   if(!ctype_digit($password) && !ctype_alpha($password))
			   {
				   if(!ctype_punct($password) && !ctype_alnum($password))
				   {
						  date_default_timezone_set('Asia/Dhaka');
						  $time = date('Y-m-d h:i:s a');
						  $expired = date('Y-m-d h:i:s a',strtotime('+ 10 day',strtotime($time)));
					      $password = md5($password);
						  
						  
						  $sql1 = "SELECT * FROM registration where email = '$email' ORDER BY regis_date DESC";			
						  $result1 = mysqli_query($conn, $sql1) or die("Bad Query: $sql");
						  $row = mysqli_fetch_assoc($result1);
						  $old_password = $row['old_password'];
						  
						  
						  if($old_password == $password)
						  {
							  echo "<script > alert('You entered same password. Try new one')</script>";
						  }	
						 else
						 {
						  $result2 = mysqli_query($conn , "update registration set password = '$password', old_password = '$password', regis_date = '$time', expired_date = '$expired' where email = '$email'");

						  if($result2){
							
							echo "<script > alert('Password has been changed successfully Done.');      
									 window.location.href='login.php';
									 
							</script>";
						  }
						   else
							{
								 
								echo "<script > alert('Something Went wrong.')</script>";

							}
						 }
						
				   }
				
				   else
				   {
						echo  "<script>alert('Add at least one Letter and one Symbol')</script>";
				   }
			   } 
			   else
			   {
				 echo "<script >alert('At least add a digit')</script>";  
				  //echo "<script > alert('At leasts add a digit')</script>";
				   
			   }
			   
		   }
		   else
		   {
			   echo "<script > alert('Add minimum 1 Upper and 1 Lower Case Letter')</script>";
		   }
		}
	   else
	   {
		   echo "<script > alert('password length should be at least 8 character long')</script>";
	   }
	}	
	else{
		  
		echo "<script > alert('Password did not  Match')</script>";
	  }
	}
	else
	{
			echo "<script > alert('Please Enter a Valid Account.')</script>";
	}
}
?>