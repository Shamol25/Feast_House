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
	<title>Current Manager</title>
	<link rel="stylesheet" type="text/css" href="adminn.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            <h3>
                Work as Admin
            </h3>
			</div>

			<div id="company_name">
				<p id="font">Feast House</p>
			</div>

			<div id="head_menu">
      <a class="btn btn-danger" href="logout.php" id="headerhover3" role="button">Logout</a>
			</div>

		</header>
		<div id="container">
			<aside>
				<div id="profile">
					<ul>
						<li><a href="adminn.php">Dashboard</a></li>
						<li><a href="assign_manager.php">Assign Manager</a></li>
						<li><a href="room_rent_manage.php">Room Rent</a></li>
						<li><a href="current_manager_show.php">Current Manager</a></li>
						<!-- <li><a href="manager_history.php">Manager History</a></li> -->
					</ul>
				</div>


			</aside>
			<content>
           
			<center><h2 style="font-family: Pacifico;margin-top: 5%;">Current Manager</h2></center>

<div style="width: 90%;
height: 300px;
box-shadow: 0px 0px 2px black;
margin-top: 4%;
margin-left:5%;
font-size:25px;
background:#e3d6fc;
">
<br>
        
<div style="margin-left:35%;margin-top:4%;font-family: Pacifico;"> 
<label >Manager: </label>
</div>
<div style="margin-left:35%;">
<?php
include_once ("class/operation.php");

$crud = new Crud();
$query = "SELECT * FROM registration";
$result = $crud->getData($query);

foreach ($result as $key => $res){
if($res['role'] == 1)
{	
    echo"<br/>";
echo $res['name'] ;

}
}
?>
</div>
</div>

			</content>
		
		<div id="footer">
		</div>
	
</body>
</html>