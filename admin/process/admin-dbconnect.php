<?php

$dbhost="localhost";
$dbuser="root";
//$dbpass="m!n(s*g#";
$dbpass="";
$dbname="rpams";

$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

if(!$conn)
{
    die("ERROR: Could not connect to the database!: ".mysqli_connect_error());
}


//add this line to close the above connection in every file
//mysqli_close($conn);
?>