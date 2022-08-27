<?php
    $rootfol = $_SERVER['DOCUMENT_ROOT'].'/rpams';
    require $rootfol."/process/dbconnect.php";
    $user_id=$_SESSION['user_id'];

    $sql="SELECT DISTINCT Flight_ID,Drone_ID from drone_activity where User_ID=$user_id";

    
    if (mysqli_query($conn, $sql))
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
    else
    {
        echo 'Unavailabel';
    }
    



?>

