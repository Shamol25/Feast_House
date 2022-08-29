<?php
 session_start();
 if(!$_SESSION['email']){
	 header('Location:login.php');
 }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	<link rel="stylesheet" type="text/css" href="profile.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- <link rel="stylesheet" href="boostrap/css/bootstrap.min.css"> -->
	<link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"></script>
</head>
<body>
	<div id="wrapper">
		<header>
			<div id="search_box">

			</div>

			<div id="company_name">
				<p id="font">Feast House</p>
			</div>

			<div id="head_menu">
				<!-- <a href="dashboard.html" id="headerhover3">Home</a>
				<a href="event.html" id="headerhover4">Event</a>
				<a href="about.html" id="headerhover2">About</a> -->
			</div>

		</header>
		<div id="container">
			<aside>
				<div id="profile">
					
				</div>

				<div id="menu">
				<ul>
						<li><a href="dashboard.php">Dashboard</a></li>
						<li><a href="writemeal.php">Write Meal</a></li>
						<li><a href="meal_rate.php">Meal Rate</a></li>
						<li><a href="bazaar_list_show.php">Bazaar List</a></li>
						<li><a href="current_balance.php">Current Balance</a></li>
						<li><a href="room_rent.php">Room Rent</a></li>
						<li><a href="current_manager.php">Current Manager</a></li>
						<!-- <li><a href="manager_history.php">Manager History</a></li> -->
					</ul>
				</div>


			</aside>
			<content>
            <center><h2>Profile</h2></center>	
            <div id="profileedit">
                <div id="image">
                    <img src="img.png">	
                </div>
         <div id="formone">
            <form class="form-horizontal" method="POST" >
                <div class="form-group">
                <label class="control-label col-sm-4" >Name:</label>
                <div class="col-sm-4">
                <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" required="">
                </div>
                </div>
               
                <div class="form-group">
            		<label class="control-label col-sm-4" >Phone:</label>
                <div class="col-sm-4">
                	<input type="text" class="form-control" id="" placeholder="Enter Phone Number" name="phone" required="">
                </div>
                </div>
                <div class="form-group">
                 <label class="control-label col-sm-4" >Permanent Address:</label>
                 <div class="col-sm-4">          
                 <input type="text" class="form-control" id="address" placeholder="Enter Permanent address" name="permanent_address" required>
                 </div>
                 </div>
                
                 
                <div class="form-group">        
                <div class="col-sm-offset-4 col-sm-10">
                <input type="submit" name="update" class="btn btn-success" value="Update">
                 </div>
                 </div>
			</form>
			<?php
			include_once ("class/operation.php");
 			$crud = new Crud();
			 if(isset($_POST['update'])){
				$name =  $_POST['name'];
				$phone = $_POST['phone'];
				$permanent_address = $_POST['permanent_address'];
				$session_email = $_SESSION['email'];

    
				$query = "UPDATE registration SET name ='$name' , phone ='$phone' , 
				permanent_address ='$permanent_address'  WHERE email = '$session_email' ";
			//	$query2 = "UPDATE user_balance SET name ='$name' WHERE email = '$session_email'";
				//$result2 = $crud->execute($query2);
				
					$result = $crud->execute($query);
					
					if($result){
					echo "<script>alert('Profile Updated');</script>";
					}

					else{
						echo "<script>alert('Profile NOT Updated');</script>";

					}
				

				 
			}
			?>
        </div>
            </div>
			</content>
		</div>
		<div id="footer">
		</div>
	</div>
</body>
</html>



