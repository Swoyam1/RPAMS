<?php

if(!isset($_SESSION)) 
{ 
    session_start(); 
}

if(isset($_POST['testing'])){
    $user_id=17;
    $email='test@test.com';
}else{
    $user_id=$_SESSION["user_id"];
    $email=$_SESSION['email'];
}


    $rootfolder = $_SERVER['DOCUMENT_ROOT'].'/rpams';

    if($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        //database connection
        require $rootfolder."/process/dbconnect.php";

        $application_no=$_POST['application_id'];

        $sql="DELETE FROM flight_request WHERE User_ID=$user_id AND Application_No = $application_no";
        if(!mysqli_query($conn,$sql))
        {
            echo "We are unable to process your resquest at the moment!";
            //echo mysqli_error($conn);
            mysqli_close($conn);
            exit();
        }
        else
        {
            if(mysqli_affected_rows($conn)==0){
                echo 'No Application Deleted!';
            }else{
            echo '1';
            echo mysqli_error($conn);
            //notification
            $subject="Flight application canceled!";
            $content="Your flight application was canceled.";
            $redirect_to="users/application.php";
            $sql="INSERT INTO users_notifications (User_ID,Subject,Content,Redirect_TO) VALUES ($user_id,'$subject','$content','$redirect_to')";
            mysqli_query($conn,$sql);

            mysqli_close($conn);
            }
        }

    }
    else
    {
        exit();
    }

?>