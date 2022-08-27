<?php
$root = $_SERVER['DOCUMENT_ROOT']."/rpams";
require $root."/process/dbconnect.php";
$user_id=$_SESSION['user_id'];

$sql="SELECT * from drone_details where User_ID=$user_id";


if (!mysqli_query($conn, $sql))
{
    echo 'Error connecting to database: ' . mysqli_error($conn);
}
else
{
    $result=mysqli_query($conn,$sql);
    if (mysqli_num_rows($result) > 0)
    {
        echo mysqli_num_rows($result).'<br/>';
    }
    else
    {
        echo '0';
    }
    mysqli_close($conn);
}


?>