<?php
    $webpagetitle="User Profile: RPA Management System";
    session_start();

    // Check if the user is logged in, if not then redirect to signin page.
    if(is_null($_SESSION["loggedin"]))
    {
        header("location: ../login.php?loginerror=NotLoggedIn");
        exit();
    }
    else if($_SESSION['full_name']=="")
    {
        header("location: profile.php?error=ProfileIncomplete");
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
        
        <script>
            profile_view_btn.style.display="none";
        </script>


        <!--<div class="float-sm-right col-sm-9 border border-primary mt-2 p-2"> -->
        <div class="float-sm-right col-sm-9 mt-2 p-2">

            <div class="card bg-secondary text-white mb-4">
                <div class="card-body p-3"><h5 class="m-0">Profile Details</h5></div>
            </div>

            <div id="accordion">

                <div class="card">
                    <div class="card-header">
                        <a class="card-link" data-toggle="collapse" href="#collapseOne">
                            Basic Details
                        </a>
                    </div>
                    <div id="collapseOne" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                            <?php require "profile-view/basic-details.php"; ?>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
                            Address
                    </a>
                    </div>

                    <div id="collapseTwo" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                            <?php require "profile-view/address.php"; ?>    
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <a class="collapsed card-link" data-toggle="collapse" href="#collapseThree">
                        Drone Pilot Training Details
                        </a>
                    </div>

                    <div id="collapseThree" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                        <?php require "profile-view/training-details.php"; ?>    
                        </div>
                    </div>
                </div>
            
                <div class="card">
                    <div class="card-header">
                        <a class="collapsed card-link" data-toggle="collapse" href="#collapseFour">
                            Drone Details
                        </a>
                    </div>

                    <div id="collapseFour" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                            
                        <?php require "load/drone-details.php"; ?>


                        </div>
                    </div>
                </div>
            </div>
                
              
               
        </div>




 






        </div>


    </div>


    
    
    
    
    
    
    
    
    
    
    
    
    




















































