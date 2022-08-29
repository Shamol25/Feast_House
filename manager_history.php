<!DOCTYPE html>
<html>
<head>
	<title>Manager History</title>
	<link rel="stylesheet" type="text/css" href="bazaar_list.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
				<a href="dashboard.html" id="headerhover3">Home</a>
				<a href="event.html" id="headerhover4">Event</a>
				<a href="about.html" id="headerhover2">About</a>
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
					<img src="img.png">					
					<a class="btn btn-success" href="#" role="button">Edit</a>
					<a class="btn btn-danger" href="#" role="button">Logout</a>
					<div class="button_up">
					<a class="btn btn-primary" id="manager" href="manager.php" role="button">View as Manager</a>
					
				</div>
				</div>

				<div id="menu">
					<ul>
						<li><a href="dashboard.html">Dashboard</a></li>
						<li><a href="#">Meal Rate</a></li>
						<li><a href="#">Bazaar List</a></li>
						<li><a href="#">Current Balance</a></li>
						<li><a href="#">Room Rent</a></li>
						<li><a href="#">Current Status</a></li>
						<li><a href="#">Current Manager</a></li>
						<li><a href="manager_history.php">Manager History</a></li>
					</ul>
				</div>


			</aside>
			<div id="content">
                <center> <h3>Manager List</h3> </center>		
		<div id="footer">
		</div>
	</div>
</body>
</html>