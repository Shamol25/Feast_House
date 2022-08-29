<?php
	include_once('dbconfig.php');

	if(isset($_GET['vkey'])){
		$vkey = $_GET['vkey'];
		
              $query = "SELECT * from registration  where vkey = '$vkey'";

              $result = mysqli_query($conn, $query);
              if(!$result)
              	echo "here is problem in query<br>";
            
              	$update = "update registration set validation = 1 where vkey = '$vkey'";
              	$r = mysqli_query($conn, $update);

	              	if($r)
	              	{
	              		
						echo "<script > alert('Your account has been Verified Successfully');document.location.href=('login.php');</script>";
					}	              		  
	              	else{
	              		echo "Something went worng";
	              	}
              }

              // else
              // {
              // 	echo "Something went wrong";
              // }

    else{
    	echo "<script type='text/javascript'>alert('Something Went Wrong!!!')</script>";
    }

	
?>