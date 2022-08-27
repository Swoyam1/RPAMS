<?php


if(isset($_GET['loginerror']))
{
    if($_GET['loginerror']=="EmptyFields")
    {
        echo'
            <div class="alert alert-warning">
                Please fill in all the fields!
            </div>
        ';
    }

    elseif($_GET['loginerror']=="InvalidUser")
    {
        echo'
            <div class="alert alert-warning">

                <strong>Invalid E-Mail/Password!</strong> <br/>Please re-check your credentials!
            </div>
        ';
    }


    elseif($_GET['loginerror']=="SQLError")
    {
        echo'
            <div class="alert alert-warning">
                We have having trouble signing you up. <br/>Try again in a moment. Error: SQL
            </div>
        ';
    }

    elseif($_GET['loginerror']=="NotLoggedIn")
    {
        echo'
            <div class="alert alert-warning">
                Please login first to continue!
            </div>
        ';
    }
}

elseif(isset($_GET['signup']))
{
    if($_GET['signup']=="success")
    {
        echo'
            <div class="alert alert-success">
                <strong>You have been signed up successfully.</strong><br />Please login to continue!
            </div>
        ';
    }
}

?>