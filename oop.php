<?php


class Meal_rate 
{
    public	$date;
    public $meal;
    public  $bazaar;
    public  $total_bazzar; 
    public $total_meal;
    public $meal_rate;
    public $total_meal_rate;
    
    public function __construct($m, $b)
    {
        $this->bazaar  = $b;
        $this->meal = $m;
        // echo $this->meal.' '.$this->bazaar.' '; 
        // print("this is constructor");
        // echo "<br>";
    }

    public function get_bazaar() {
    return $this->bazaar;
  }
   public function get_meal() {
    return $this->meal;
  }

    //echo $meal;
    public function m_rate()
    {
        $this->meal_rate = get_bazaar() / get_meal();
        // echo $this->meal_rate;
        // print("meal rate in function \n");
        return $this->meal_rate;
    }


    public function total_meal_rate($total_meal,$total_bazzar)
        {
        $this->total_meal_rate = $total_bazzar / $total_meal;
        return $this->total_meal_rate;  
        } 

}

    // }
    // f();
    //    function f(){
             
    //    $sql = "SELECT * from meal_manage";
    //    $result = mysqli_query($con, $sql);

       
    //    while ($row = mysqli_fetch_assoc($result)) {

    //            $meal =  $row['total_meal'];
    //            $bazaar = $row['total_bazaar_amount'];
               
    //            // $date =	$row['date'];
           
    //            //	$date = ($_POST['date']);

    //            $obj  = new Meal_rate($meal, $bazaar);
    //            $meal_rate = $obj->m_rate();
    //            // $query = ("INSERT into meal_manage(meal_rate) VALUES('$meal_rate') WHERE date='$date");
    //            // $result2 = mysqli_query($con , $query);
    //            // return $result2;
    //            // echo '<br>';
    //            // $sql2 = "update meal_rate SET daily_meal_rate = $meal_rate where date = '$date'";
    //            // $result2 = mysqli_query($con, $sql2);

    //            // if($result2)
    //            // {
    //            // 	echo "updated successfully<br>";
    //            // }
           
    //        }
    //    }
   
?>
