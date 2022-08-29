<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <title>Login</title>


   <meta charset="utf-8">
   <link rel="stylesheet" type="text/css" href="login.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body class="bg">
  <div class="container-fluid ">
  <div class="row">
  
    
  <form class="form col-md-6 form_container" method="POST">
        <div class="form-group">
          <center><p id="font_name">Feast House</p> </center><br/>
          <center><p id="font">Log in </p> </center><br/>
            <label class="color">Email</label>
            <input type="email" class="form-control" name="email"  placeholder="Enter Email">
            </div>
            <div class="form-group ">
            <label class="color">Password</label>
            <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Enter Password">
            </div>
      <br/>
          <button type="submit" name="submit" class="btn btn-success btn-block">Submit</button>

          <div>
            <a href="registration.php" class="color"><h5>Are you a new member? Please Register first</h5></a>
          </div>
          <button type="button" class="btn btn-warning btn-md left3" id="color2" data-toggle="modal" data-target="#myModal">Login as Admin</button>
          </form>
          <form method="POST">
      <div class="container">


  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-md ">
      <div class="modal-content">
        <div class="modal-header">
         <p class="modal-title">Login as Admin</p>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form >
  <div class="form-group">
    <label >Email</label>
    <input type="email" name="emaila" class="form-control"  placeholder="Enter Email">
    </div>
  <div class="form-group">
    <label >Password</label>
    <input type="password" class="form-control" name="passworda" placeholder="Password">
  </div>
 
  <input type="submit" class="btn btn-success btn-block" name="submitadmin" value="Submit">
</form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger"  data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>

  </div>
  
</div>

      

  </form>


</body>
</html>

<?php
include_once ('dbconfig.php');

if(isset($_POST['submit'])){
  
  
  $email =$_SESSION['email']= $_POST['email'];
  $password = md5($_POST['password']) ;


  $result = mysqli_query($conn,  "SELECT * FROM registration WHERE email = '$email' AND password = '$password'  AND  validation = 1 ");

  if(mysqli_num_rows($result) >0 ){
          while($row = mysqli_fetch_assoc($result)){
          $_SESSION['name']=$row['name'];
          $_SESSION['role']=$row['role'];       
          $validation = $row['validation'];
          }
          echo $validation;
          if($validation = 0)
          {
            echo "<script > alert('Please Verify your Account')</script>";
          }
          else
          {
            header("Location:dashboard.php");
          }  
    }

    else
        {
          echo "<script > alert('Wrong password or email')</script>";
        }
}
?>

<?php
include_once('admin_con.php');
if(isset($_POST['submitadmin'])){
  
  
  $email =$_SESSION['emaila']=$_POST['emaila'];
  $password = $_POST['passworda'] ;


  $result = mysqli_query($conn,  "SELECT * FROM registration WHERE email = '$email' AND password = '$password'");
  if(mysqli_num_rows($result)>0 ){
          while($row = mysqli_fetch_assoc($result)){
          $_SESSION['email']=$row['email'];
          $_SESSION['id']=$row['id'];       
          header("Location:adminn.php");}
          }
          else{
           echo "<script > alert('Wrong password or email')</script>";
          }
}


?>