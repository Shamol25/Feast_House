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
	<title>Assign Manager</title>
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
            <center>
         <h3>Assign A New Manager</h3>
        </center>

<form method="POST">

<table class="table table-dark" >
<tr>
<th></th>
  <th>Name</th>
  <th>Select</th>
</tr>

<?php 
$con = mysqli_connect("localhost", "root", "", "feast_house");
$sql = "SELECT * from registration  ";
$result = $con-> query($sql);
 

  if($con->connect_error)
  {
    echo "Something went wrong";
  }


if(isset($_POST['submit'])){
  if($result -> num_rows > 0)
  {
    while($row = $result -> fetch_assoc())
    {
      $id = $row['id'];
      
      $edit = "UPDATE registration SET  role  = 0 where id = $id ";
      $query = $con-> query($edit);
  
  
    }
  }    

  foreach($_POST['radio'] as $key => $value) {

    $id = $_POST['id'][$key];

    if($value == 1)
      $edit = "UPDATE registration SET  role  = $value   where id = $id ";
    else 
      $edit = "UPDATE registration SET  role  = 0 where id = $id ";

    $query = mysqli_query($con, $edit);
    
   }
}

?>
<?php

$sql = "SELECT * from registration  ";
$result = $con-> query($sql);
 
if($result -> num_rows > 0)
{
  while($row = $result -> fetch_assoc())
  {
  ?>	
     <tr>
           <td> <input type = "hidden" name = 'id[<?php echo $row['id']; ?>]' value = <?php echo $row['id'];?> > </td> 
           <td> <?php echo $row['name']; ?></td>
           <td> <input type = "radio"  value = 1 name ='radio[<?php echo $row['id']; ?>]' > </td>
           
        
     </tr>
         
  <?php	
  }
  ?>
  <?php 
}
else
{
  echo "0 result";
}

?> 
      

</table>	
<center><input type = "submit" value = "Assign Manager" name ='submit' class="btn btn-success center"></center>
</form>

  </div>

			</content>
		
		<div id="footer">
		</div>
	
</body>
</html>