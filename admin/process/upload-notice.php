<?php

if(!isset($_SESSION)){
    session_start();
}

if($_SERVER['REQUEST_METHOD'] === 'POST')
{
    //database connection
    require "admin-dbconnect.php";

    //Fetching form data
    $subject=$_POST['subject'];
    $link=$_POST['link'];

    if(!isset($_POST['audience'])){
        $audience='admin';
    }else{
        $audience=$_POST['audience'];
    }


    if($subject == "" || $link == "" || $audience== "" ){
        echo "Please fill in all the details!";
        exit();
    }

    $sql="INSERT INTO notice (Content,Link,audience) VALUES ('$subject','$link','$audience')";

    if(mysqli_query($conn,$sql))
    {
        echo '1';
    }
    else
    {
        echo mysqli_error($conn);
        
        print_r($_POST);
    }
    mysqli_close($conn);
}
else
{
    //header("");
    exit();
}
?>