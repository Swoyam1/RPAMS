<?php

if(!isset($_SESSION)){
    session_start();
}
$rootfolder = $_SERVER['DOCUMENT_ROOT'].'/rpams';
$user_id=$_SESSION['user_id'];


    //database connection
    require $rootfolder."/process/dbconnect.php";


            $sql1="SELECT * FROM flight_request WHERE Status='Processed'";

            $result1 = mysqli_query($conn,$sql1);
            $count1 = mysqli_num_rows($result1);




            echo $count1;


?>