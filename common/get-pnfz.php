<?php

$rootfolder = $_SERVER['DOCUMENT_ROOT'].'/rpams/';
require $rootfolder."process/dbconnect.php";

$sql = "SELECT Zone_ID,Latitude,Longitude,Radius,Category,Common_Name FROM no_fly_zones";

if(mysqli_query($conn,$sql))
{
    $result = mysqli_query($conn,$sql);
    if (mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_assoc($result))
        {
            echo $row['Zone_ID'].':{lat:'.$row['Latitude'].',lng:'.$row['Longitude'].',center:{lat:'.$row['Latitude'].', lng:'.$row['Longitude'].'}, rad:'.$row['Radius'].', common_name:"'.$row['Common_Name']."\"},\r\n\r\t\r\t";                
        }
    }
    else
    {
        echo '';
    }

}
else
{
    echo mysqli_error($conn);
    
}
mysqli_close($conn);



?>