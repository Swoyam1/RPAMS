<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
}
$user_id=$_SESSION["user_id"];
//will give the error bellow if not logged in
//Notice: Undefined index: user_id in D:\Programs\xampp\htdocs\rpams\process\session-profile-details.php on line 3
require "dbconnect.php";

$sql="SELECT * FROM rpa_user_details WHERE User_ID=?";
$stmt=mysqli_stmt_init($conn);

if(!mysqli_stmt_prepare($stmt,$sql))
{
exit();
}
else
{
    mysqli_stmt_bind_param($stmt, "i", $user_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    $resultCheck=mysqli_stmt_num_rows($stmt);
    if($resultCheck==1)
    {
        $sql="SELECT * FROM rpa_user_details where User_ID=?";
        $stmt=mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql))
        {
            exit();
        }
        else
        {
            mysqli_stmt_bind_param($stmt, "i", $user_id);
            mysqli_stmt_execute($stmt);
            $result=mysqli_stmt_get_result($stmt);

            if($row=mysqli_fetch_assoc($result))
            {
                
                $_SESSION['full_name']=$row['Full_Name'];
                $_SESSION['phone_number']=$row['Phone_Number'];
                $_SESSION['date_of_birth']=$row['Date_of_Birth'];
                $_SESSION['gender']=$row['Gender'];
                $_SESSION['nationality']=$row['Nationality'];
                $_SESSION['training_status']=$row['Training_Status'];
                $_SESSION['training_certificate_number']=$row['Training_Certificate_Number'];
                $_SESSION['training_certificate']=$row['Training_Certificate'];
                mysqli_stmt_close($stmt);
                mysqli_close($conn);

                require "dbconnect.php";
                $sql="SELECT * FROM rpa_user_address WHERE User_ID=?";
                $stmt=mysqli_stmt_init($conn);

                if(!mysqli_stmt_prepare($stmt,$sql))
                {
                exit();
                }
                else
                {
                    mysqli_stmt_bind_param($stmt, "i", $user_id);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_store_result($stmt);
                    $resultCheck=mysqli_stmt_num_rows($stmt);
                    if($resultCheck==1)
                    {
                        $sql="SELECT * FROM rpa_user_address where user_id=?";
                        $stmt=mysqli_stmt_init($conn);
                        if(!mysqli_stmt_prepare($stmt,$sql))
                        {
                            exit();
                        }
                        else
                        {
                            mysqli_stmt_bind_param($stmt, "i", $user_id);
                            mysqli_stmt_execute($stmt);
                            $result=mysqli_stmt_get_result($stmt);

                            if($row=mysqli_fetch_assoc($result))
                            {
                                
                                $_SESSION['area']=$row['Area'];
                                $_SESSION['city']=$row['City'];
                                $_SESSION['state']=$row['State'];
                                $_SESSION['country']=$row['Country'];
                                $_SESSION['pin_code']=$row['PIN_Code'];
                                echo "Success!";
                            }
                        }

                    }
                mysqli_stmt_close($stmt);
                }

                mysqli_close($conn);
            }
        }

    }
    else
    {
        $_SESSION['full_name']="";
        $_SESSION['phone_number']="";
        $_SESSION['date_of_birth']="";
        $_SESSION['gender']="";
        $_SESSION['nationality']="";
        $_SESSION['training_status']="";
        $_SESSION['training_certificate_number']="";
        $_SESSION['training_certificate']="";
        $_SESSION['area']="";
        $_SESSION['city']="";
        $_SESSION['state']="";
        $_SESSION['country']="";
        $_SESSION['pin_code']="";
        echo "profile incomplete";
    }

}


?>