<?php

if(!isset($_SESSION)){session_start();};
if(isset($_POST['signup-submit']))
{
    require "dbconnect.php";

    $email = $_POST['email'];
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];

    // checking if the inputs were empty
    if(empty($email) || empty($password1) || empty($password2))
    {
        header("Location: ../signup.php?error=EmptyFields&email=".$email);
        exit();
    }

    // checking for valid email

    elseif(!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        header("Location: ../signup.php?error=InvalidEmail&email=".$email);
        exit();
    }

    // CHECKING FOR PASSWORD

    elseif ($password1!==$password2)
    {
        header("Location: ../signup.php?error=PasswordsDoNotMatch&email=".$email);
        exit();
    }

    // checking for unique email
    else
    {
        $sql="SELECT email FROM rpa_user_login_credentials WHERE email=?";
        $stmt=mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt,$sql))
        {
            header("Location: ../signup.php?error=SQLError");
            exit();
        }
        else
        {
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck=mysqli_stmt_num_rows($stmt);
            if($resultCheck>0)
            {
                header("Location: ../signup.php?error=EmailTaken");
                exit();
            }
            else
            {
                $sql="INSERT INTO rpa_user_login_credentials(email, password) VALUES (?,?)";
                $stmt=mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt,$sql))
                {
                    header("Location: ../signup.php?error=SQLError");
                    exit();
                }
                else
                {
                    //hashing password
                    $hashedPassword=password_hash($password1,PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($stmt, "ss", $email, $hashedPassword);
                    mysqli_stmt_execute($stmt);

                    header("Location: ../login.php?error=0&signup=success");
                    exit();
                }
            }
        }
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);

}
else
{
        header("Location: ../signup.php");
        exit();
}
?>