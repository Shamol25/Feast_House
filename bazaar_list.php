<?php
 session_start();
 if(!$_SESSION['email']){
	 header('Location:login.php');
 }
?>


<!DOCTYPE html>
<html>
<head>
	<title>Bazaar List</title>
	<link rel="stylesheet" type="text/css" href="bazaar_list.css">
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
						<li><a href="bazaar_list_show.php">Daily Bazaar List</a></li>
					</ul>
                    
                    
				</div>
            </aside>
            

            


			<div id="content">


             <center>   <h3>Make Your Bazaar List</h3> </center>
                
				<form method="POST">
					<table border="1" class="bazaarlistform" id="customers">
                    <tr >
                 <th >Product</th>
                 <th>Quantity</th>
                 <th>Price</th>
              </tr>
							<tr><input type="date" name="date" class="form-control"></tr>
              <tr>	
								<td><input type="text" name="product_name[]" placeholder="product.."></td>
                <td><input type="text" name="product_quantity[]" placeholder="quanty.."></td>
                <td><input type="number" name="product_price[]" placeholder="price.."></td>
              </tr>
          </table>
                
        <script>
				var c=0;
        $(document).ready(function(){
                
        $("button").on("click", function(){
                
        var row = '<tr><td><input type="text" name="product_name[]" placeholder="product.."></td><td><input type="text" name="product_quantity[]" placeholder="quanty.."></td><td><input type="number" name="product_price[]" placeholder="price.."></td></tr>';
        
        $("#customers").append(row);
                
        });
                
        });
                
        </script>
        
        <button type="button" class="btn btn-primary" style="margin-left:90%;width:60px;margin-top:1%">+</button>
                    
                
          <center>
					<input type="submit" id="submit" class="btn btn-success " value="Submit" name="submit" >
          </center>
          </form>

					<?php
					include_once('class/operation.php');
					$operation = new Crud();
					$price = 0;
					if(isset($_POST['submit'])){
 
					$date = $operation->escape_string($_POST['date']);
						
					foreach ($_POST['product_name'] as $key=>$value) {

					$product_name = $operation->escape_string($_POST['product_name'][$key]);
					$product_quantity = $operation->escape_string($_POST['product_quantity'][$key]);
					$product_price = $operation->escape_string($_POST['product_price'][$key]);
					$price = $price + $product_price ;
					
$result = $operation->execute("INSERT INTO bazaar_list(date,product_name,product_quantity,product_price) VALUES('$date','$product_name','$product_quantity','$product_price')");

}					if($result){
	echo '<script>
	alert("Bazaar List Submition Successfull");
	</script>';
}
					echo"<center>";	echo "<h4 style=font-family:pacifico> Total given money </h4>".$price; echo"</center>";    
							}

					?>
                
                    
          </div>
		</div>
		<div id="footer">
		</div>
	</div>
</body>
</html>