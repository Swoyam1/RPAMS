<?php

session_start();
$user_id=$_SESSION['user_id'];

if($_SERVER['REQUEST_METHOD'] === 'POST')
{
    //database connection
    require "admin-dbconnect.php";

    //Fetching form data
    $latitude=$_POST['latitude'];
    $longitude=$_POST['longitude'];
    $radius=$_POST['radius'];
    $category=$_POST['category'];
    $common_name=$_POST['common_name'];
    $timestamp_from=$_POST['timestamp_from'];
    $timestamp_to=$_POST['timestamp_to'];

    if($latitude == "" || $longitude == "" || $radius== "" || $category== "" || $common_name=="" || $timestamp_from=="" || $timestamp_to==""){
        echo "Please fill in all the details!";
        exit();
    }

    $sql="INSERT INTO temporary_no_fly_zones (Latitude,Longitude,Radius,Category,Modified_By,Common_Name,Timestamp_From,Timestamp_To) VALUES ($latitude,$longitude,$radius,'$category',$user_id,'$common_name','$timestamp_from','$timestamp_to')";

    if(mysqli_query($conn,$sql))
    {
        echo"Location added Successfully!";
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