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

            echo 'No. of past drone activities: '.mysqli_num_rows($result).'<br/>';
                                                      
            echo '
            <br/>
            <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Drone</th>
                    <th>Time</th>
                    <th>Duration</th>
                    <th>View</th>
                </tr>
            </thead>

            <tbody>                                  
            
            ';
            while($row = mysqli_fetch_array($result))
            {

                $flight_id=$row['Flight_ID'];
                $sql1="SELECT Timestamp from drone_activity where User_ID=$user_id AND Flight_ID=$flight_id Limit 1";
                $result1=mysqli_fetch_array(mysqli_query($conn,$sql1)); 

                echo '<tr><td>'.$row["Flight_ID"].'</td>
                ';
                echo '<td>'.$row["Drone_ID"].'</td>
                ';
                echo '<td>'.$result1["Timestamp"].'</td>
                ';
                echo '<td>'.'</td>
                ';
                echo '<td class="text-center"><img src="images/free/route-map.svg" class="activity_view_btn" width="16px" data-toggle="tooltip" data-placement="left" title="View this activity" /></td>
                </tr>
                ';

            }
                                                        
            echo '</tbody>
            </table>';
        }
        else
        {
            echo '<p>No. of drone registered: 0</p>';
        }
        mysqli_close($conn);
    }
    else
    {

    }
    



?>

