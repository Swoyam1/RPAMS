<?php
    $rootfol = $_SERVER['DOCUMENT_ROOT'].'/rpams';
    require $rootfol."/process/dbconnect.php";
    $user_id=$_SESSION['user_id'];

    $sql="SELECT * from drone_details where User_ID=$user_id";

    
    if (!mysqli_query($conn, $sql))
    {
        echo 'Error creating database: ' . mysqli_error($conn);
    }
    else
    {
        $result=mysqli_query($conn,$sql);
        if (mysqli_num_rows($result) > 0)
        {
            echo 'No. of drone registered: '.mysqli_num_rows($result).'<br/>';
                                                        
            echo '
            <br/>
            <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Nickname</th>
                    <th>Weight</th>
                    <th>UIN</th>
                </tr>
            </thead>

            <tbody>                                  
            
            ';
            while($row = mysqli_fetch_assoc($result))
            {

                echo '<tr><td>'.$row["Drone_ID"].'</td>
                ';
                echo '<td>'.$row["Name"].'</td>
                ';
                echo '<td>'.$row["Nickname"].'</td>
                ';
                echo '<td>'.$row["Weight"].'</td>
                ';
                echo '<td>'.$row["Drone_UIN"].'</td></tr>
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
    



?>

