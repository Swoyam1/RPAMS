<?php


if(!isset($_SESSION)){
    session_start();
}

$rootfolder = $_SERVER['DOCUMENT_ROOT'].'/rpams';
$user_id=$_SESSION['user_id'];

if($_SERVER['REQUEST_METHOD'] === 'POST')
{
    //database connection
    require $rootfolder."/process/dbconnect.php";

        if($_POST["view"]=='viewed')
        {
            $update_query = "UPDATE users_notifications SET Status=1 WHERE User_ID=$user_id AND Status=0";
            mysqli_query($conn,$update_query);
        }
        else
        {
            $sql="SELECT * FROM admin_notifications WHERE Admin_ID=$user_id AND Status=0 ORDER BY Notification_ID DESC LIMIT 5";
            if(!mysqli_query($conn,$sql))
            {
                echo "We are unable to process your resquest at the moment!";
                //echo mysqli_error($conn);
                mysqli_close($conn);
                exit();
            }
            else
            {
                $result=mysqli_query($conn,$sql);
                $output='';
                if (mysqli_num_rows($result) > 0)
                {
                    while($row = mysqli_fetch_array($result))
                    {
                        $output .='
                        
                            <li>
                                <i class="small font-weight-light">'.$row["Timestamp"].'</i><br/>
                                <a href="'.$row["Redirect_To"].'" class="text-decoration-none">
                                    <span class="text-primary">'.$row["Subject"].'</span><br/>
                                    <span class="small text-success"><em>'.$row["Content"].'</em></span>
                                </a>
                                <hr/>
                            </li>
                        
                        ';
                    }
                }
                else
                {
                    $output.='
                        <li>
                            <span class="text-bold text-italic text-decoration-none">Nothing new at the moment.</span>
                        </li>

                    ';
                }

                $sql= "SELECT * from users_notifications WHERE User_ID=$user_id AND Status=0";
                $result_1 = mysqli_query($conn,$sql);
                $count = mysqli_num_rows($result_1);
                $data = array(
                    'notification'          => $output,
                    'unseen_count'   => $count
                );

                echo json_encode($data);
                mysqli_close($conn);

            }
        }

        

}
else
{
    exit();
}

?>