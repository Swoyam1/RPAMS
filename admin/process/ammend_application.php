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

        $application_no=$_POST['application_id'];
        $action=$_POST['action'];

        if($action == 1)
        {
            $sql = "UPDATE flight_request SET Status = 'Approved' WHERE Application_No = $application_no";
            if(!mysqli_query($conn,$sql))
            {
                echo "We are unable to process your resquest at the moment!";
                //echo mysqli_error($conn);
                mysqli_close($conn);
                exit();
            }
            else
            {
                if(mysqli_affected_rows($conn)!=1){
                    echo 'No Application Approved!';
                }else{
                echo '1';

                //notification
                $subject="Flight Application Update!";
                $content="Your flight application was approved.";
                $redirect_to="users/application.php";
                $sql="INSERT INTO users_notifications (User_ID,Subject,Content,Redirect_TO) VALUES ((SELECT User_ID FROM flight_request WHERE Application_No=$application_no),'$subject','$content','$redirect_to')";
                mysqli_query($conn,$sql);
                mysqli_close($conn);
                }
            }
        }
        elseif($action == 0)
        {
            $sql = "UPDATE flight_request SET Status = 'Rejected' WHERE Application_No = $application_no";
            if(!mysqli_query($conn,$sql))
            {
                echo "We are unable to process your resquest at the moment!";
                //echo mysqli_error($conn);
                mysqli_close($conn);
                exit();
            }
            else
            {
                if(mysqli_affected_rows($conn)!=1){
                    echo 'No Application Rejected!';
                }else{
                echo '0';

                //notification
                $subject="Flight Application Update!";
                $content="Your flight application was rejected.";
                $redirect_to="users/application.php";
                $sql="INSERT INTO users_notifications (User_ID,Subject,Content,Redirect_TO) VALUES ((SELECT User_ID FROM flight_request WHERE Application_No=$application_no),'$subject','$content','$redirect_to')";
                mysqli_query($conn,$sql);
    
                mysqli_close($conn);
                }
            }
        }
        else
        {
            exit();
        }


    }
    else
    {
        exit();
    }

?>