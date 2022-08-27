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


    if($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        //database connection
        require "dbconnect.php";


        //fetching value from the form
        $drone_id=$_POST['drone_id'];
        $timestamp=$_POST['timestamp'];
        $purpose=$_POST['purpose'];
        $latitude=$_POST['latitude'];
        $longitude=$_POST['longitude'];
        $address=$_POST['address'];
        $radius=$_POST['radius'];
        //$area=$_POST['area'];
        //$city=$_POST['city'];
        //$state=$_POST['state'];
        //$pin_code=$_POST['pin_code'];
        if($drone_id == '' || $timestamp == '' || $purpose == '' || $latitude == '' || $longitude == '' || $address == ''|| $radius == '')
        {
            echo 'Please fill in all the fields!';
        }
        else
        {
            $query = "SELECT * FROM flight_request WHERE User_ID=$user_id AND Status='Processed'";
            $result=mysqli_query($conn,$query);
            $processed_app_count=mysqli_num_rows($result);
            if($processed_app_count >= 500)
            {
                echo 'You already have '.$processed_app_count.' applications pending. You cannot apply more.';
            }
            else
            {
                //$sql="INSERT INTO flight_request (User_ID,Drone_ID,Timestamp,Area,City,State,PIN_Code,Purpose) VALUES (?,?,?,?,?,?,?,?)";
                $sql="INSERT INTO flight_request (User_ID,Drone_ID,Latitude,Longitude,Timestamp,Address,Purpose,Radius) VALUES ($user_id,'$drone_id',$latitude,$longitude,'$timestamp','$address','$purpose',$radius)";
                if(!mysqli_query($conn,$sql))
                {
                    //echo mysqli_error($conn);
                    echo 'We are unable to process your resquest at the moment!';
                    mysqli_close($conn);
                }
                else
                {
                    echo '1';

                    //notification
                    $subject="Flight application submitted!";
                    $content="Your flight application was submitted.";
                    $redirect_to="users/application.php";
                    $sql="INSERT INTO users_notifications (User_ID,Subject,Content,Redirect_TO) VALUES ($user_id,'$subject','$content','$redirect_to')";
                    mysqli_query($conn,$sql);

                }
            }

        }   mysqli_close($conn);

    }
    else
    {
        exit();
    }

?>