<?php
 session_start();
 if(!$_SESSION['email']){
	 header('Location:login.php');
 }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Balance</title>
	<link rel="stylesheet" type="text/css" href="manager.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="boostrap/css/bootstrap.min.css">
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
			<center><h3>Balance</h3></center>
			<div id="meal_manage" >
            <?php
            include_once ('dbconfig.php');
            $table = 'registration';
            $col = 'name';

            $query = "SELECT * from $table";
            $results = mysqli_query($conn,$query);

            ?>
						<div class="form-group">
					<form method="POST">
            <select name="name" class="form-control" id="sel1">
               
            <?php
            if($results){
            while ($rows = mysqli_fetch_assoc($results)){ 
							$col = $rows['name'];
							echo "<option>$col<br></option>";
						}
					}
            ?>
            </select><br>
						<input type="number" name="balance" placeholder="Write Balance" class="form-control"><br>
						<input type="submit" id="SUBMIT" href="" name="SUBMIT" value="Submit" class="btn btn-success">
						<input type="submit" name="add" value="ADD Balance" class="btn btn-primary">	
						<input type="submit" name="substrack" value="SUBTRACK Balance" class="btn btn-danger">						

						</form>
						</div>
						<?php
						include_once ('dbconfig.php');
						
						if(isset($_POST['SUBMIT'])){
							$name = $_POST['name'];
							$balance = $_POST['balance'];
							//$id = $_POST['id'];
							//$total += $balance;
							//$results_u = ();
							$query = "INSERT into user_balance(name,balance)VALUES('$name' , '$balance')";
							$results = mysqli_query($conn,$query);
							if($results){
								echo"<script>alert('SUBMIT')</script>";
							}
						}
						?>

						<!-- <script>
						$(document).on('click',funtion(){
							
							$("#SUBMIT").preventDefault(e);
						});
						</script> -->


						<?php
						include_once ('dbconfig.php');

							if(isset($_POST['add'])){
								$name = $_POST['name'];
								$balance = $_POST['balance'];
							$query2 = "SELECT * from user_balance";
							$results2 = mysqli_query($conn,$query2);
							 
							while($row=mysqli_fetch_assoc($results2))
							{
								if($name == $row['name']){
								$balance +=$row['balance'];
								
							}
						}
								$query_u = ("UPDATE user_balance SET balance='$balance' WHERE name='$name' ");
								$results_u = mysqli_query($conn,$query_u);
								if($results_u){
									echo"<script>alert('Money ADDED')</script>";
									}
								
							}
							 if(isset($_POST['substrack'])){
								$name = $_POST['name'];
								$balance = $_POST['balance'];
							$query2 = "SELECT * from user_balance";
							$results2 = mysqli_query($conn,$query2);
							 
							while($row=mysqli_fetch_assoc($results2))
							{
								if($name == $row['name']){
								$balance = $row['balance'] - $balance;
								
							}
						}
								$query_u = ("UPDATE user_balance SET balance='$balance' WHERE name='$name' ");
								$results_u = mysqli_query($conn,$query_u);
								if($results_u){
									echo"<script>alert('Money SUBSTRACKED')</script>";
									}
								
							}
						
						?>
						 <div id="balance">
							 <table class = "table table-dark">
								 <tr>
								 <th>Name</th>
								 <th>Balance</th>
						</tr>
							 <?php
							 include_once ('class/operation.php');
							 $operation = new Crud();

							 $query = "SELECT * from user_balance";
							 $result = $operation->getData($query);
							 foreach ($result as $key => $value) {
								echo "<tr>"; 
								echo "<td>".$value['name']."</td>";
								echo "<td>".$value['balance']."</td>";
								echo "</tr>"; 							 
							}
							 ?>
							 </table>
						 </div>
						</div>
			</content>
		</div>
		<div id="footer">
		</div>
	</div>
</body>
</html>