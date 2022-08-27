<?php
    $webpagetitle="Dashboard: RPA Management System";
    session_start();

    // Check if the user is logged in, if not then redirect to signin page.
    if(is_null($_SESSION["loggedin"]))
    {
        header("location: ../login.php?loginerror=NotLoggedIn");
        exit();
    }
    else if($_SESSION['full_name']=="")
    {
        header("location: profile.php?loginerror=LoggedIn&error=ProfileIncomplete");
        exit();
    }
    else
    {

        require "../common/common-header.php";
        require "user-header.php";
        require "session-details.php";

        if($session_gender=="Male")
        {
            $session_He="He";
            $session_he="he";
            $session_His="His";
            $session_his="his";
        }
        elseif($session_gender=="Female")
        {
            $session_He="She";
            $session_he="her";
            $session_His="Her";
            $session_his="her";
        }
        else
        {
            $session_He="It";
            $session_he="it";
            $session_His="Its";
            $session_his="its";
        }
    }

?>
    <div class="container">
        
        <?php require "load/profile-sidebar.php"; //uses col-sm-3 ?>


        <!--<div class="float-sm-right col-sm-9 border border-primary mt-2 p-2"> -->
        <div class="float-sm-right col-sm-9 mt-2 p-1">
        <div class="row row-eq-height">
            <div class="col-sm-6">
                <div class="bg-primary rounded p-1 text-center m-1">
                        <h3 class="text-center text-light">Drone Status</h3>
                        <p class="text-light">No. of drone registered: <?php require "load/no-of-drones.php";?></p>
                        <a href="users/drone.php" class="btn btn-sm btn-outline-light mb-2">Manage</a>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="bg-success rounded p-1 text-center m-1">
                        <h3 class="text-light">Pilot Training Status</h3>
                        <p class="text-light"><strong><?php echo $session_training_status;?></strong>
                        <?php
                            if($session_training_status=="Completed")
                            {
                                if(!$session_training_certificate_number=="")
                                {
                                    echo
                                    '
                                    <span class="text-light"> (Certificate No: <i>'.$session_training_certificate_number.')</i></span>
                                    ';
                                }
                                else
                                {
                                    echo
                                    '
                                    <span class="text-light">(Certificate No: <i>Unavailable)</i></span><br />
                                    ';
                                }
                            }
                        ?>

                        </p>
                        <a href="users/profile-view.php" class="btn btn-sm btn-outline-light mb-2">Manage</a>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="bg-danger rounded p-1 text-center m-1">
                        <h3 class="text-center text-light">Application Status</h3>
                        <p class="text-light">Approved Applications: <?php require "applications/approved_count.php";?></p>
                        <a href="users/application.php" class="btn btn-sm btn-outline-light mb-2">Manage</a>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="bg-secondary rounded p-1 text-center m-1">
                        <h3 class="text-center text-light">Flight Status</h3>
                        <p class="text-light">Total Flights: <?php require "load/flight_count.php";?></p>
                        <a href="users/application.php" class="btn btn-sm btn-outline-light mb-2">Manage</a>
                </div>
            </div>

        </div>

        <div class="row">

            <div class="col-sm-12">
                <div class="bg-dark rounded p-3  m-1">
                        <h4 class="text-center text-center text-light">Notices</h4>
                        <p class="text-light"><?php require "load/notice.php";?></p>
                        <!-- <a href="users/application.php" class="btn btn-sm btn-outline-light mb-2">Manage</a> -->
                </div>
            </div>

        </div>










        </div>


    </div>


    
    
    
    
    
    
    
    
    
    
    
    
    




















































