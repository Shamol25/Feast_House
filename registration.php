<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>


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
  				<center><h3 id="font">Sign Up</h3> </center><br/>
				    <label class="color">User Name</label>
				    <input type="text" class="form-control" name="name" placeholder="Enter Name" required>
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

            <div class="form-group ">
              <label class="color">Permanent Address</label>
              <input type="address" name="permanent_address" class="form-control" name="permanent_address" placeholder="Enter Your Permanent Address" required>
            </div>

			       <div class="form-group ">
              <label class="color">Phone Number</label>
              <input type="number" name="phone" class="form-control" name="phone" placeholder="Enter Your Phone Number" required>
            </div><br/>
            
				  <button type="submit" class="btn btn-success btn-block" name="submit">Submit</button>

			

	</form>



</body>
</html>

<?php
include_once('dbconfig.php');
if(isset($_POST['submit'])){
  
  $name = $_POST['name'] ;
  $email = $_POST['email'] ;
  $password = $_POST['password'] ;
 // $password = md5(password);
  $retype_password = $_POST['retype_password'];
 // $retype_password = md5($retype_password);
  $permanent_address = $_POST['permanent_address'] ;
  $phone = $_POST['phone'] ;
  $vkey = (time().$email);
  
  
  $result = mysqli_query($conn,  "SELECT * FROM registration WHERE email = '$email'");

  if(mysqli_num_rows($result) >0 ){
	   
	   echo "<script > alert('Please try with another mail.')</script>";

	}
  else{
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
						  $expired = date('Y-m-d h:i:s a',strtotime('+ 90 day',strtotime($time)));
							$password = md5($password);
							$result = mysqli_query($conn , "INSERT into registration (name ,email,password, old_password, permanent_address , phone, vkey, validation, regis_date, expired_date) 
								VALUES('$name' ,'$email' ,'$password', '$password', '$permanent_address' ,'$phone' , '$vkey', '0','$time', '$expired')");

							  if($result){
								  echo "<script type='text/javascript'>alert('Verification mail has been send to your mail!')</script>";
								  require 'class.phpmailer.php';

							$mail = new PHPMailer;
							$mail->SMTPDebug = 1;
							// fardeen.rahman22@gmail.com //Fardeen_Gmail22 
							$mail->IsSMTP(); // Set mailer to use SMTP
							$mail->Host = 'smtp.gmail.com'; // Specify main and backup server
							$mail->Port = 587; // Set the SMTP port
							$mail->SMTPAuth = true; // Enable SMTP authentication
							$mail->Username = 'fardeen.rahman22@gmail.com'; // SMTP username
							$mail->Password = 'Fardeen22_Gmail(6_7)'; // SMTP password
							$mail->SMTPSecure = 'tls'; // Enable encryption, 'ssl' also accepted

							$mail->From = 'fardeen.rahman22@gmail.com';
							$mail->FromName = 'Feast House';
							$mail->AddAddress($email, 'Account'); // Add a recipient

							  
							$mail->IsHTML(true); // Set email format to HTML

							$mail->Subject = 'Email Verification';
							$mail->Body = "For email Verification click the register button <a href = 'http://localhost:80//feast_house/verify.php?vkey=$vkey'> Register </a>";
							$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

							if(!$mail->Send()) {
							echo 'Message could not be sent.';
							echo 'Mailer Error: ' . $mail->ErrorInfo;
							exit;
							}
						}
						
						 else{
								echo "<script type='text/javascript'>alert('Execution wrong')</script>";
							 }
						}
					
					   else
					   {
							echo  "<script>alert('Add at least one Letter and one Symbol')</script>";
					   }
				   } 
				   else
				   {
					 echo "<script >alert('At leasts add a digit')</script>";  
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
	}
?>