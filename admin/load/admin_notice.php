<?php
    $rootfol = $_SERVER['DOCUMENT_ROOT'].'/rpams';
    require $rootfol."/process/dbconnect.php";
    $user_id=$_SESSION['user_id'];

    $sql="SELECT * from notice";

    
    if (mysqli_query($conn, $sql))
    {
        $result=mysqli_query($conn,$sql);
        if (mysqli_num_rows($result) > 0)
        {

            while($row = mysqli_fetch_array($result))
            {
                echo '<span class="small">'.$row['Timestamp'].'</span> <kbd>'.$row['Audience'].'</kbd><br /><a href="'.$row['Link'].'" target="_blank" style="color:white">'.$row['Content'].'</a><br /><br />';
            }
                                                        
            echo '</tbody>
            </table>';
        }
        else
        {
            echo 'Nothing new at the moment';
        }
        mysqli_close($conn);
    }
    else
    {

    }
    



?>

