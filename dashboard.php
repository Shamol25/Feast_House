<?php
 session_start();
 if(!$_SESSION['email']){
	
	 header('Location:login.php');
 }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<link rel="stylesheet" type="text/css" href="dashboard.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
					include_once("class/operation.php");
					$crud = new Crud();
					if($_SESSION['email'])
					{
					$email = $_SESSION['email'];}
					$query = "SELECT * FROM registration WHERE email='$email'";
					$result = $crud->getData($query);
					if($_SESSION['email'])
					foreach ($result as $key => $res)
					{		
					
					echo "<h2 style=font-family:Pacifico;color:white;font-size:25px>" .$res['name']."</h2>";
					break;

					}
					?>
					</div>
			<img src="img.png">					
			<a class="btn btn-success" id="edit" href="profile.php" role="button">Edit</a>
			<a class="btn btn-danger" id="logout" href="logout.php" role="button">Logout</a>
			<a class="btn btn-primary" id="button_up" href="manager.php" role="button">View as Manager</a>
			<?php
			include_once('class/operation.php');
			$operation = new CRUD();
			// $query = "SELECT * from registration" ;
			// $result = $crud->getData($query);
			 $role = $_SESSION['role'];
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
					$("#button_up").removeAttr('href');
			}
			else if(role == 1){
				$('#button_up').show();
			}
});
			</script>
		
		</div>

				<div id="menu">
					<ul>
						<li><a href="dashboard.php">Dashboard</a></li>
						<li><a href="writemeal.php">Write Meal</a></li>
						<li><a href="meal_rate.php">Meal Rate</a></li>
						<li><a href="bazaar_list.php">Bazaar List</a></li>
						<li><a href="bazaar_list_show.php">Daily Bazaar List</a></li>
						<li><a href="current_balance.php">Current Balance</a></li>
						<li><a href="room_rent.php">Room Rent</a></li>
						<li><a href="current_manager.php">Current Manager</a></li>
						<!-- <li><a href="manager_history.php">Manager History</a></li> -->
					</ul>
				</div>


			</aside>
			<content>
				<!-- <div id="daymeal">
					<div id="dailymealcounting"><h3 style=font-family:Pacifico>Daily Meal Counting</h3>
					</div>
					<div class="row">
							<div class="col-sm-4">
									<div id="circle1">
											<center style="margin-top:40%"><h1>
											<?php
											include_once('class/operation.php');
											$crud = new Crud();
											$count = 0;
											$date = date("Y-m-d");
											
											$date2 = "SELECT date FROM meal_write where date = '$date'";
											
											$result = $crud->getData($date2);
											
											if($date = $result){
												$query = "SELECT breakfast FROM meal_write WHERE date='2019-03-30' ";
												$result2 = $crud->getData($query);
												foreach ($result2 as $key => $res)
												{							
													$count += $res['breakfast'];
													
												}
												echo $count;
												
											}
											else{
												echo 'false';
											}
											?>
											</h1></center>	
									</div>
									<div id="mealtime1">
										<h4>Breakfast</h4>
									</div>
							</div>
							<div class="col-sm-4">
									<div id="circle2">
											<center style="margin-top:40%"><h1>
											<?php
											include_once('class/operation.php');
											$crud = new Crud();
											$count = 0;
											$date = date("Y-m-d");
											
											$date2 = "SELECT date FROM meal_write where date = '$date'";
											
											$result = $crud->getData($date2);
											
											if($date = $result){
												$query = "SELECT lunch FROM meal_write WHERE date='2019-03-30' ";
												$result2 = $crud->getData($query);
												foreach ($result2 as $key => $res)
												{							
													$count += $res['lunch'];
													
												}
												echo $count;
												
											}
											else{
												echo 'false';
											}
											?>
											</h1></center>	
									</div>
									<div id="mealtime2">
											<h4>Lunch</h4>
										</div>
							</div>

							<div class="col-sm-4">
									<div id="circle3">
											<center style="margin-top:40%"><h1>
											<?php
											include_once('class/operation.php');
											$crud = new Crud();
											$count = 0;
											$date = date("Y-m-d");
											
											$date2 = "SELECT date FROM meal_write where date = '$date'";
											
											$result = $crud->getData($date2);
											
											if($date = $result){
												$query = "SELECT dinner FROM meal_write WHERE date='2019-03-30' ";
												$result2 = $crud->getData($query);
												foreach ($result2 as $key => $res)
												{							
													$count += $res['dinner'];
													
												}
												echo $count;
												
											}
											else{
												echo 'false';
											}
											?>
											</h1></center>	
									</div>
									<div id="mealtime3">
											<h4>Dinner</h4>
										</div>
								</div>
						  
				</div>
			</div>
				<div id="mealrate">
					<canvas id="mychart">

					</canvas>
				
					<div id="barchart">
				<script>
					let mychart = document.getElementById('mychart').getContext('2d');

					let masspopchart = new Chart(mychart,{
						type:'bar',
						data : {
							labels : ['1/02/2019' ,'2/02/2019' , '3/02/2019' ,'4/02/2019','5/02/2019','6/02/2019','7/02/2019'] ,
							datasets : [{
								label : 'Meal Rate',
								data : [ 33 , 32.5, 33 ,30.3 , 30.9 , 35 , 106] ,
								backgroundColor:['green' , 'red' , 'blue' , 'yellow' , 'black' , 'orange' , 'pink']						
										}] 
						},
					
						options : {
							scales: {
								
            yAxes: [{
                ticks: {
                    beginAtZero:true , endAtHundred:true
                }
            }]
        }
						}
					});
				</script>
				</div>
				</div>
				 -->
			</content>
		</div>
		<div id="footer">
		</div>
	</div>
</body>
</html>