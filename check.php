<?php

include_once ('dbconfig.php');
session_start();
$email = 'shamol35-1636@diu.edu.bd';
	
$date2 = "SELECT * FROM registration where email = '$email' ORDER BY regis_date DESC";			
$result = mysqli_query($conn, $date2) or die("Bad Query: $date2");
$r = mysqli_fetch_assoc($result);
$d = ($r['expired_date']);


$dd = date('Y-m-d h:i:s a', strtotime(date('Y-m-d h:i', strtotime($d)). " + 0 day"));

$time = abs(strtotime($dd) - time());
$tt = date("Y-m-d");
date_default_timezone_set('Asia/Dhaka');
//$t =  date('Y-m-d h:i:s a', strtotime(date('Y-m-d h:i:s a', strtotime($d)." + 10 min")));
$tt = date('Y-m-d h:i:s a');

$t = date('Y-m-d h:i:s a',strtotime('+ 1 min',strtotime($tt)));
$query = "SELECT * from registration  where vkey = '$email'";

              $rr = mysqli_query($conn, $query);
              if(!$rr)
              	echo "fasle<br>";
            
              	$update = "update registration set expired_date = '$t' where email = '$email'";
              	$r = mysqli_query($conn, $update);

 if($r){
		echo "<script>alert('Time has been sent!')</script>";
}
else
{
   echo "<script>alert('Verification out!')</script>";
}
$diff =  strtotime($t) - strtotime($dd);
if($diff < 0)
{
	echo "curre time: ".$d." second<br>";
	echo "expired time: ".$diff." second<br>";
	
echo "Formated expired : ".$diff." second<br>";
}
else
{
	echo "Formated expired : ".$t."<br>";

}
$text = "Eeeeeeee1@";
$text = md5($text);
echo "After ".$text ."<br>";
$text = md5($text);
echo $text;

?>