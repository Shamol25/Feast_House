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
	<title>Room Rent</title>
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
						<li><a href="room_rent_manager.php">Room Rent</a></li>
						<li><a href="current_manager_show.php">Current Manager</a></li>
						<!-- <li><a href="manager_history.php">Manager History</a></li> -->
					</ul>
				</div>


			</aside>
			<content>
            <center><h3>Room rent</h3></center>
            <div id="roomrent">
                <div id="roomrentdesign">
                    <form method="POST" id="rentform">
                            <br>
                    <label >Master Room Rent</label>
                    <input type="Number" class="form-control" placeholder="Enter Master Room Rent" name="master_room">
                    <br>
                    <label >Individual Seat Rent</label>
                    <input type="Number" class="form-control" placeholder="Enter Individual Seat Rent" name="individual_seat">
                    <br>
                    <input type="submit" class="btn btn-success" id="sub"  value="Insert" name="submit" >                    
                    <input type="submit" class="btn btn-primary" id="up"  value="Update" name="update" >
                  <script>
$(document).ready(function(){
  $("#up").click(function(){
    
    $("input[name=Assign_manager]").id("defaultOpen" , true);
  });
});
                  </script>  
<?php
                    include_once("admin_con.php");
                    if(isset($_POST['submit']))
	                  {
		                  $master_room = $_POST['master_room'];
		                  $individual_seat = $_POST['individual_seat'];
		                  $result=mysqli_query($conn,"Insert into roomrent(master_room,individual_seat) values('$master_room','$individual_seat')");
                      
                    }
                    else if(isset($_POST['update']))
	                  {
		                  $master_room = $_POST['master_room'];
		                  $individual_seat = $_POST['individual_seat'];
		                  $result=mysqli_query($conn,"UPDATE roomrent SET master_room='$master_room',individual_seat='$individual_seat'");
                    }
                    
?>


                </div>
                <div id="roomrentshow">
                        <br>
                    
                        <label >Master Room Rent :</label>
<?php
include_once("admin_con.php");
$result = mysqli_query($conn,"SELECT master_room FROM roomrent");

while ($res=mysqli_fetch_array($result))
{	
	echo $res['master_room'];
	
}?>


                        <br>
                        <br>
                    <label >Indivisual Seat Rent :</label>
<?php
include_once("admin_con.php");
$result = mysqli_query($conn,"SELECT individual_seat FROM roomrent");

while ($res=mysqli_fetch_array($result))
{	
	echo "".$res['individual_seat']."";
	
}?>
                </div>
                
            </form>
            </div>
			</content>
		<div id="footer">
		</div>
</body>
</html>