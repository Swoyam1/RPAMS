<?php

    if(!isset($_SESSION)){
        session_start();
    }


    $rootfol = $_SERVER['DOCUMENT_ROOT'].'/rpams';
    require $rootfol."/process/dbconnect.php";
    $user_id=$_SESSION['user_id'];

    $sql="SELECT * from flight_request where User_ID=$user_id AND Status='Approved' ";

    
    if (!mysqli_query($conn, $sql))
    {
        echo 'Unavailable';
    }
    else
    {
        $result=mysqli_query($conn,$sql);
        if (mysqli_num_rows($result) > 0)
        {
            echo mysqli_num_rows($result);

        }
        else
        {
            echo '0';
        }
        mysqli_close($conn);
    }
    



?>

