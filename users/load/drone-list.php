<?php

    $root = $_SERVER['DOCUMENT_ROOT']."/rpams";
    require $root."/process/dbconnect.php";
    $user_id=$_SESSION['user_id'];

    $sql="SELECT * from drone_details where User_ID=$user_id";


    if (!mysqli_query($conn, $sql))
    {
        echo 'Error connecting to database: ' . mysqli_error($conn);
    }
    else
    {
        $result=mysqli_query($conn,$sql);
        if (mysqli_num_rows($result) > 0)
        {
            while($row = mysqli_fetch_assoc($result))
            {

                echo '<option value="'.$row["Drone_ID"].'"> '.$row["Drone_ID"].' '.$row["Name"].' ('.$row['Nickname'].') </option>'."\r\n\t\t\t\t\t";
            
            }
        }
        else
        {
            echo '<option value="">No Drones Registered</option>';
        }
        mysqli_close($conn);
    }


?>