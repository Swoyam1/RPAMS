<?php

if(!isset($_SESSION)){
    session_start();
}
$rootfolder = $_SERVER['DOCUMENT_ROOT'].'/rpams';
$user_id=$_SESSION['user_id'];


    //database connection
    require $rootfolder."/process/dbconnect.php";


            $sql1="SELECT * FROM flight_request WHERE Status='Processed'";
            $sql2="SELECT * FROM flight_request WHERE Status='Rejected'";
            $sql3="SELECT * FROM flight_request WHERE Status='Expired'";
            $sql4="SELECT * FROM flight_request WHERE Status='Approved'";
            $sql5="SELECT * FROM flight_request WHERE Status='Auto Rejected'";
            $sql6="SELECT * FROM flight_request WHERE Status='Auto Approved'";

            $result1 = mysqli_query($conn,$sql1);
            $count1 = mysqli_num_rows($result1);

            $result2 = mysqli_query($conn,$sql2);
            $count2 = mysqli_num_rows($result2);

            $result3 = mysqli_query($conn,$sql3);
            $count3 = mysqli_num_rows($result3);

            $result4 = mysqli_query($conn,$sql4);
            $count4 = mysqli_num_rows($result4);

            $result5 = mysqli_query($conn,$sql5);
            $count5 = mysqli_num_rows($result5);

            $result6 = mysqli_query($conn,$sql6);
            $count6 = mysqli_num_rows($result6);



            echo '
                <p> <i class="fas fa-chalkboard-teacher"></i> Pending: <b>'.$count1.'</b></p>
                <p> <i class="fas fa-thumbs-up"></i> Approved: <b>'.$count4.'</b></p>
                <p> <i class="fas fa-thumbs-down"></i> Rejected: <b>'.$count2.'</b></p>
                <p> <i class="fas fa-hourglass-end"></i> Expired: <b>'.$count3.'</b></p>
                <p> <i class="fas fa-ban"></i> Auto Rejected: <b>'.$count5.'</b></p>
                <p> <i class="fas fa-check-circle"></i> Auto Approved: <b>'.$count6.'</b></p>
            
            ';


        



?>