<?php

if(!isset($_SESSION)) 
{ 
    session_start(); 
}

if(isset($_POST['login-submit']))
{
    require "dbconnect.php";

    $email=$_POST['email'];
    $password=$_POST['password'];

    // checking if the inputs were empty
    if(empty($email) || empty($password))
    {
        header("Location: ../login.php?loginerror=EmptyFields");
        exit();
    }
    else
    {
        $sql="SELECT * FROM rpa_user_login_credentials WHERE email=?;";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$sql))
        {
            header("Location: ../login.php?loginerror=sqlerror");
            exit();
        }
        else
        {
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            $result=mysqli_stmt_get_result($stmt);
            if($row=mysqli_fetch_assoc($result))
            {
                $pwdCheck=password_verify($password,$row['password']);
                if($pwdCheck==false)
                {
                    header("Location: ../login.php?loginerror=InvalidUser&1&email=".$email);
                    exit();
                }
                elseif($pwdCheck==true)
                {
                
                    if(!isset($_SESSION)) 
                    { 
                        session_start(); 
                    }
                    $_SESSION["loggedin"]=true;
                    $_SESSION["user_id"]=$row['User_ID'];
                    $_SESSION["email"]=$row['Email'];
                    mysqli_stmt_close($stmt);
                    mysqli_close($conn);
                    require "session-profile-details.php";
                    header("Location: ../users/dashboard.php?loginerror=LoggedIn");
                    
                    exit();
                }
                else
                {
                    header("Location: ../login.php?loginerror=InvalidUser&email=".$email);
                    exit();
                }
            }
            else
            {
                header("Location: ../login.php?loginerror=InvalidUser");
                exit();
            } 
        }   
        
    //mysqli_stmt_close($stmt);
    }
//mysqli_close($link);
//require "session-profile-details.php";
}
else
{
    header("Location: ../index.php");
    exit();
}




?>