<?php
 
 session_start();
 if(is_null($_SESSION['log']))
 {
  $_SESSION['log']= "";
  $log_data="";
 }

 $user_id=$_SESSION['user_id'];
 $drone_id='189CEB9BA20873';
    //database connection
    $root = $_SERVER['DOCUMENT_ROOT'].'/rpams';
    include_once $root."/process/dbconnect.php";


    //fetching value from the form
    $lat=$_POST['lat'];
    $long=$_POST['long'];


       $sql = "INSERT INTO drone_activity(User_ID,Drone_ID,Latitude,Longitude) VALUES ($user_id,'$drone_id',".$_POST["lat"].",".$_POST["long"].")";

       if (mysqli_query($conn, $sql)) {
          echo "<br/><br/>Location sent successfully with ";
       } else {
          //echo "Error: " . $sql . "" . mysqli_error($conn);
          echo "<h6><br/><br/>Did Not receive the coordinates! </h6>";
       }
       mysqli_close($conn);

       header("Location: fly.php?Recorded");

       echo 'Latitude:'.$lat;
       echo ' and Longitude'.$long;

       $log_data=$_SESSION['log'].'<br/><br/>Location sent successfully with Latitude:'.$lat. 'and Longitude'.$long;
        $_SESSION['log']="$log_data";

?>