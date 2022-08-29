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
	<title>Admin Panel</title>
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
						<li><a href="adminn.php" role="button">Dashboard</a></li>
						<li><a href="assign_manager.php" role="button">Assign Manager</a></li>
						<li><a href="room_rent_manage.php">Room Rent</a></li>
						<li><a href="current_manager_show.php">Current Manager</a></li>
						<!-- <li><a href="manager_history.php">Manager History</a></li> -->
					</ul>
				</div>


			</aside>
			<content>
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="images/image3.jpg" alt="Los Angeles" style="width:100%;height:500px">
      </div>

      <div class="item">
        <img src="images/image7.jpg" alt="Chicago" style="width:100%;height:500px">
      </div>
    
      <div class="item">
        <img src="images/image.jpg" alt="New york" style="width:100%;height:500px">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

			</content>
		</div>
		<div id="footer">
		</div>
  

</body>
</html>