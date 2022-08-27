<?php

    if(!isset($_SESSION)){
        session_start();
    }


    $rootfol = $_SERVER['DOCUMENT_ROOT'].'/rpams';
    require $rootfol."/process/dbconnect.php";
    $user_id=$_SESSION['user_id'];

    $sql="SELECT * from flight_request where User_ID=$user_id AND (Status='Expired' OR Status='Rejected')";

    
    if (!mysqli_query($conn, $sql))
    {
        echo mysqli_error($conn);
    }
    else
    {
        $result=mysqli_query($conn,$sql);
        if (mysqli_num_rows($result) > 0)
        {
            echo 'No. of past applications: '.mysqli_num_rows($result).'<br/>';
                                                        
            echo '
            <br/>
            <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Application No.</th>
                    <th>Drone ID</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Date Time</th>
                    <th>Purpose</th>
                    <th>Status</th>
                    
                </tr>
            </thead>

            <tbody>
            ';
            while($row = mysqli_fetch_assoc($result))
            {
                echo '
                <tr>
                    <td>'.$row["Application_No"].'</td>
                    ';
                    echo '<td>'.$row["Drone_ID"].'</td>
                    ';
                    echo '<td>'.'</td>
                    ';
                    echo '<td>'.$row["Address"].'</td>
                    ';
                    echo '<td>'.$row["Timestamp"].'</td>
                    ';

                    echo '<td>'.$row["Purpose"].'</td>
                    ';
                    echo '<td>'.$row["Status"].'</td></tr>
                    ';

            }
                                                        
            echo '
            </tbody>
            </table>';
        }
        else
        {
            echo '<p>No. of past applications: 0</p>';
        }
        mysqli_close($conn);
    }
    



?>

