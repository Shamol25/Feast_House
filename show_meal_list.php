<?php
session_start();
if(!$_SESSION['email'])
{
	header("location:login.php");
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Daily Meal List</title>
	<link rel="stylesheet" type="text/css" href="manager.css">
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
				<p  id="headerhover3">Work As Manager</p>
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
					$email = $_SESSION['email'];
					$query = "SELECT * FROM registration WHERE email='$email'";
					$result = $crud->getData($query);
					
					foreach ($result as $key => $res)
				{							
					echo "<h2 style=font-family:Pacifico;color:white;font-size:25px>" .$res['name']."</h2>" ;

				}
					?>
					</div>
					<img src="img.png">					
					<a class="btn btn-success" id="edit" href="profile.php" role="button">Edit</a>
					<a class="btn btn-danger" id="logout" href="logout.php" role="button">Logout</a>
				<a class="btn btn-primary " id="button_up" href="dashboard.php" role="button">View As Member</a>
				</div>

				<div id="menu">
				<ul>
						<li><a href="manager.php">Dashboard</a></li>
						<li><a href="show_meal_list.php">See Daily Meal</a></li>
						<li><a href="meal_manage.php">Meal Manage</a></li>
						<li><a href="balance.php">Balance</a></li>
						<li><a href="bazaar_list.php">Bazaar List</a></li>
				</ul>
				</div>
			</aside>
			<content>
                <center><h3>Daily Meal List</h3></center>
                <div id="daily_meal_list">
				<form method="POST">
					<input type = "date" name = "date" id = "date" class="form-control" >
			<center><input type = "submit" name = "submit" value = "Submit" class = "btn btn-primary "></center>
				</form>
                <table class="table table-dark my-5">
                    <tr>
                        <th>Date</th>
                        <th>Name</th>
                        <th>Breakfast</th>
                        <th>Lunch</th>
                        <th>Dinner</th>

                    </tr>
                <?php
					include_once("class/operation.php");
					$crud = new Crud();
					if(isset($_POST['submit'])){
						$date = $_POST['date'];
						$query = "SELECT * FROM meal_write WHERE date = '$date'";
						$result = $crud->getData($query);
						
						foreach ($result as $key => $res)
					{							
						echo "<tr>";
			echo "<td>".$res['date']."</td>";
			echo "<td>".$res['name']."</td>";
			echo "<td>".$res['breakfast']."</td>";
			echo "<td>".$res['lunch']."</td>";
			echo "<td>".$res['dinner']."</td>";
						echo "</tr>";
					}
					}
					
                    ?>
                    </table>
                </div>
			</content>
		</div>
		<div id="footer">
		</div>
	</div>
</body>
</html>