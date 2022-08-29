

<!DOCTYPE html>
<html>
<head>
	<title>Write Meal</title>
	<link rel="stylesheet" type="text/css" href="dashboard.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- <link rel="stylesheet" href="boostrap/css/bootstrap.min.css"> -->
	<!-- <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css"> -->
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
				<!-- <a href="dashboard.php" id="headerhover3">Home</a>
				<a href="event.html" id="headerhover4">Event</a>
				<a href="about.html" id="headerhover2">About</a> -->
			</div>

		</header>
		<div id="container">
			<aside>
				<div id="profile">
					<div id="time">

	<!-- Javascript code for time calculation  -->
						<script>
							var date = new Date();
							var days = ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];
	// ..........................Time showing...........................
							document.write(days[date.getDay()]  + " - " 
							+ date.toLocaleString('en-US' , {hour : 'numeric' , hour12: true ,
							minute:'numeric' , minute60:true 
							}) );
							
						</script>
					</div>
					<div id="profile_name">
					<?php
					/*
					include_once("class/operation.php");
					$crud = new Crud();
					$email = $_SESSION['email'];
					$query = "SELECT * FROM registration WHERE email='$email'";
					$result = $crud->getData($query);
					
					foreach ($result as $key => $res)
				{							
					echo "<h2 style=font-family:Pacifico;color:white;font-size:25px>" .$res['name']."</h2>" ;

				}*/
					?>
					</div>
			<img src="img.png">					
			<!-- <a class="btn btn-success" id="edit" href="profile.php" role="button">Edit</a> -->
			<!--<a class="btn btn-danger" id="logout" href="logout.php" role="button">Logout</a> -->
			<a class="btn btn-primary" id="button_up" href="manager.php" role="button">View as Manager</a>
			<?php
			include_once('class/operation.php');
			$operation = new CRUD();
			// $query = "SELECT * from registration" ;
			// $result = $crud->getData($query);
			// $role = $_SESSION['role'];
			// echo $result2;
			// foreach($result as $key => $value){
			// //	$a=$value;
			// 	$a= $value['role'];
			// 	if ($a == '0'){
			// 		$b = $a;
			// 	}
			// }
			
			?>
			<script>
			var role = '<?php echo $role;?>';
			$(document).ready(function(){
				if(role == 0){
				$('#button_up').removeAttr('href');
			}
			else if(role == 1){
				$('#button_up').show();
			}
});
			</script>
		
				</div>

				<div id="menu">
					<ul>
						<li><a href="dashboard1.php">Dashboard</a></li>
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
            <h3>Write Meal</h3>
            <div id="writemeal">
            <form method="POST">
				<div id="writemeal_date">
                    <label>Type today's date: </label>
                    <input type="date" id="date" name="date" class="form-control"/>
                </div>
                <div id="writemealtable">
                <table >
                <tr>
                <td><label>Breakfast</label></td>
                <td><label>Lunch</label></td>
                <td><label>Dinner</label></td>
                </tr>
                <tr>
                <td><input type="number" id="breakfast" name="breakfast" class="form-control col-sm-4" placeholder="Breakfast" /></td>
                <td><input type="number" id="lunch" name="lunch" class="form-control col-sm-4" placeholder="Lunch" /></td>
                <td><input type="number" id="dinner" name="dinner" class="form-control col-sm-4" placeholder="Dinner" /></td>
                <td><input type="submit" id="submit" name="submit" class="btn btn-success" /></td>                
                </tr>
                </table>
                </div>
            </form>
            </div> 
            <?php
            include_once ('class/operation.php');
           // $operation = new Crud();
            //$email= $_SESSION['name']; 
            if(isset($_POST['submit'])){
                $date = $operation->escape_string($_POST['date']);
                $breakfast = $operation->escape_string($_POST['breakfast']);
                $lunch = $operation->escape_string($_POST['lunch']);
                $dinner = $operation->escape_string($_POST['dinner']);
				
				 session_start();
				 if(!$_SESSION['email']){
				echo "<script > alert('You have to Login First, Before Writing Your Meal');      
									 window.location.href='login.php';
							</script>";
				 }
				$result = $operation->execute("INSERT INTO meal_write(name,date,breakfast,lunch,dinner) VALUES('$email','$date','$breakfast','$lunch','$dinner')");
		   
				if($result){
					echo '<script>
					alert("Meal Submition Successfull");
					</script>';
				}
			}
           
            ?>
			   
			</content>
		</div>
		<div id="footer">
		</div>
	</div>
</body>
</html>