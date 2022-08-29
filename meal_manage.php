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
                <center><h3>Meal Manage</h3></center>
				
                <div id="meal_manage" >
                    <form method = "POST" action="meal_manage.php"  >
					<input type="date" name = "date" class="form-control" >
					<br/><center><input type = "submit" name = "submit" id="submit" value="Submit"  class="btn btn-primary"></center>
				</form>
				    <div id="total_meal" >  
                    <?php
                   include_once("class/operation.php");
				   $crud = new Crud();
				   if(isset($_POST['submit'])){
					$date = $crud->escape_string($_POST['date']);
					echo"<br/>";
					echo "Requested Date : <b>".$date."</b><br/>"; 
                    $query = "SELECT * FROM meal_write WHERE date='$date' ";
					$result = $crud->getData($query);
					$count = 0; 
					$count2 = 0;
					$count3 = 0;
                    foreach ($result as $key => $res)
                    {							
						$count += $res['breakfast'];
						$count2 += $res['lunch'];
						$count3 += $res['dinner'];
						
					}
					echo "Breakfast: " ; echo'<b>'.$count.'</b>'; echo"<br/>";
					echo "Lunch: " ; echo'<b>'. $count2.'</b>'; echo"<br/>";
					echo "Dinner: " ; echo '<b>'.$count3.'</b>'; echo"<br/>";
					$total_meal = $count + $count2 + $count3;
					echo "<h3>Total meal : ".$total_meal."</h3>";
					
                    // $breakfast = "SELECT breakfast FROM meal_write WHERE date='2019-03-30' ";
                    // $lunch = "SELECT lunch FROM meal_write WHERE date='2019-03-29' ";
                    // $dinner = "SELECT dinner FROM meal_write WHERE date='2019-03-29' ";
				}
                    ?>

                    <!-- <script>
                        var q = new Date();
                        var m = q.getMonth()+1;
                        var d = q.getDate();
                        var y = q.getFullYear();
                        if(m<10){
                            m = '0' + m;
                        }
                        var dat = [y+"-"+m+"-"+d];
                        var d1 = dat.toString();
                        

                        var fetch = "<?php
                //        echo $res['date'];
                        ?>"
                        var fetch2 = fetch.toString();
                        var breakfast = "<?php // echo $res['breakfast'];?>";
                        var b2 = parseInt(breakfast);
                        var lunch = "<?php //echo $res['lunch'];?>";
                        var l2 = parseInt(lunch);
                        var dinner = "<?php //echo $res['dinner'];?>";
                        var d2 = parseInt(dinner);

                        document.write(fetch2);
                        if(d1 == fetch2){
                            var sum = b2 + l2 + d2;

                            document.write("<br/><label>Today's total meal: </label> "+" "+sum);
                            
                        }
                    </script>   -->
					
					</div>
					

				<div class="text center" id="total_meal">
					<form method="POST">
					<input type="date" name = "date" class="form-control" ><br/>					
					<input type="number" name = "total_meal" placeholder="Write total meal"  class="form-control" ><br/>
					<input type="number" name = "total_bazaar_amount" placeholder="Write Total Bazaar Amount"  class="form-control" >
					<center><input type = "submit" name = "submit_value" id="submit_value" value="Submit"  class="btn btn-primary"></center>
					</form>
					<?php
					include_once ('class/operation.php');
					include_once ('oop.php');
					 
					$meal_rate = 0;
					$total_meal_rate_a=0;
					meal();
					function meal(){
					$total_meal_a = 0;
					$total_bazaar_a = 0;
					$con = mysqli_connect('localhost','root','','feast_house');
					$operation = new Crud();
					
					if(isset($_POST['submit_value'])){ 
							
					$date = $operation->escape_string($_POST['date']);
					$total_meal = $operation->escape_string($_POST['total_meal']);
					$total_bazaar_amount = $operation->escape_string($_POST['total_bazaar_amount']);
					
					$total_meal_a += $total_meal;
					$total_bazaar_a += $total_bazaar_amount;
					$query_total = "SELECT * from meal_manage";
					$result = mysqli_query($con,$query_total);

					while ($row = mysqli_fetch_assoc($result)) {
					
						$meal =  $row['total_meal'];
						$bazaar = $row['total_bazaar_amount'];
					  	$total_meal_a += $meal;
					  	$total_bazaar_a += $bazaar;
					}		
					
					$obj  = new Meal_rate($total_meal,$total_bazaar_amount);
					$meal_rate = $obj->m_rate();
					$total_meal_rate_a= $obj->total_meal_rate($total_meal_a,$total_bazaar_a);
					
					$query = $operation->execute("INSERT into meal_manage(date,total_meal,total_bazaar_amount,meal_rate,total_meal_rate)VALUES('$date','$total_meal','$total_bazaar_amount','$meal_rate','$total_meal_rate_a')");
					if($query){
					echo '<script>
					alert("Submition Successfull");
					</script>';
				
				}
				}
			//	}
					
			}
				
		
					?>
				</div>
                </div>
				<!-- <script>
				function myFunction() {
  var x = document.getElementById("total_meal");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
				</script> -->

			</content>
		</div>
		<div id="footer">
		</div>
	</div>
</body>
</html>