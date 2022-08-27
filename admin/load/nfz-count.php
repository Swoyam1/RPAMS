<?php

if(!isset($_SESSION)){
    session_start();
}
$rootfolder = $_SERVER['DOCUMENT_ROOT'].'/rpams';
$user_id=$_SESSION['user_id'];


    //database connection
    require $rootfolder."/process/dbconnect.php";


            $sql1="SELECT * FROM no_fly_zones";

            $result1 = mysqli_query($conn,$sql1);
            $count1 = mysqli_num_rows($result1);

            $sql="SELECT * FROM temporary_no_fly_zones";

            $result = mysqli_query($conn,$sql);
            $count = mysqli_num_rows($result);
            $total = $count+$count1;

            echo '<p>Total NFZs: <b>'.$total.'</b></p>
            <p>Total Parmanent NFZs: <b>'.$count1.'</b></p>
            <p>Total Temporary NFZs: <b>'.$count.'</b></p>';


?>