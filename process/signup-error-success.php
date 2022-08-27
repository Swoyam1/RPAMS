<?php


if(isset($_GET['error']))
{
    if($_GET['error']=="EmptyFields")
    {
        echo'
            <div class="alert alert-warning">
                Please fill in all the fields!
            </div>
        ';
    }

    elseif($_GET['error']=="InvalidEmail")
    {
        echo'
            <div class="alert alert-warning">
                <strong>Invalid E-Mail!</strong> Please enter a valid e-mail address!
            </div>
        ';
    }

    elseif($_GET['error']=="PasswordsDoNotMatch")
    {
        echo'
            <div class="alert alert-warning">
                <strong>Wrong Password!</strong> Your passwords did not match!
            </div>
        ';
    }

    elseif($_GET['error']=="EmailTaken")
    {
        echo'
            <div class="alert alert-danger">
                <strong>Duplicate E-mail!</strong> Your email address is already taken. Please enter another one.
            </div>
        ';
    }

    elseif($_GET['error']=="SQLError")
    {
        echo'
            <div class="alert alert-warning">
                We have having trouble signing you up. Try again in a moment. Error: SQL
            </div>
        ';
    }
}
?>