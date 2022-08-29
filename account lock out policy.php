<?php

include_once ('dbconfig.php');
session_start();
$email = 'shamol35-1636@diu.edu.bd';
	
$date2 = "SELECT * FROM registration where email = '$email' ORDER BY regis_date DESC";			
$result = mysqli_query($conn, $date2) or die("Bad Query: $date2");
$r = mysqli_fetch_assoc($result);
$d = ($r['regis_date']);
date_default_timezone_set('Asia/Dhaka');
$dd = date("Y-m-d h:i:s a", strtotime(date("Y-m-d h:i:s a", strtotime($d)). " + 10 day"));
if($dd > date("Y-m-d h:i:s a"))
{
echo "Formated expired : ".$dd."<br>";
}
else
{
	echo "What the hell going on";
}

?>