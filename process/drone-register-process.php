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
}

if($_SERVER['REQUEST_METHOD'] === 'POST')
{
    //database connection
    require "dbconnect.php";


    //fetching value from the form
    $drone_id=$_POST['drone_id'];
    $drone_name=$_POST['drone_name'];
    $drone_nickname=$_POST['drone_nickname'];
    $drone_weight=$_POST['drone_weight'];
    $drone_uin=$_POST['drone_uin'];

    if($drone_id == '' || $drone_name == '' || $drone_nickname == '' || $drone_weight == '' || $drone_uin  == '')
    {
        echo "Please fill in all the fields!";
    }
    else
    {

        $sql="SELECT * FROM drone_details WHERE User_ID=$user_id and Drone_ID='$drone_id'";
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
            if (mysqli_num_rows($result) == 1)
            {
                echo "You have already registed this drone!";
            }
            else
            {
                $sql="INSERT INTO drone_details (User_ID,Drone_ID,Name,Nickname,Weight,Drone_UIN) VALUES ($user_id,'$drone_id','$drone_name','$drone_nickname',$drone_weight,'$drone_uin')";
            
                if(!mysqli_query($conn,$sql))
                {
                    echo mysqli_error($conn);
                    exit();
                }
                else
                {
                    echo "1";
                    
                    //notification
                    $subject="New Drone Registerd";
                    $content="A new drone was added to your account.";
                    $redirect_to="users/drone.php";
                    $sql="INSERT INTO users_notifications (User_ID,Subject,Content,Redirect_TO) VALUES ($user_id,'$subject','$content','$redirect_to')";
                    mysqli_query($conn,$sql);
                    
                }
            }
            mysqli_close($conn);

        }
    } //closing of non-empty filed check else

}
else
{
    exit();
}

?>