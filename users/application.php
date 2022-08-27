<?php
    $rootfol = $_SERVER['DOCUMENT_ROOT'].'/rpams';
    $webpagetitle="Application: RPA Management System";
    if(!isset($_SESSION)){
        session_start();
    }

    // Check if the user is logged in, if not then redirect to signin page.
    if(is_null($_SESSION["loggedin"]))
    {
        //$forwardto=$rootfol.'/login.php';
        //header("location: ".$forwardto).'';
        header("location: ../login.php?loginerror=NotLoggedIn");
        exit();
    }
    //Checking if profile is incomplete
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
        require "load/define-gender.php";


    }

?>
    <div class="container">
        
        <?php require "load/profile-sidebar.php"; //uses col-sm-3 ?>


        <!--<div class="float-sm-right col-sm-9 border border-primary mt-2 p-2"> -->
        <div class="float-sm-right col-sm-9 mt-2 p-2">

            <div class="card bg-secondary text-white mb-4">
                <div class="card-body p-3"><h5 class="m-0">Application Status</h5></div>
            </div>


            
            <!-- Alert Area -->
            <div id="alert_div" class="alert alert-success fade show mx-2 hidden">
                    <button type="button" class="close" onclick="document.getElementById('alert_div').style.display='none'">&times;</button>
                    <div id="server_msg" class="alert_text"></div>
                </div>
            <!-- -->

            <div id="accordion">

            <!-- Pending Application -->
                <div class="card">
                    <div class="card-header">
                        <a class="card-link" data-toggle="collapse" href="#collapseOne">
                            Pending Applications
                        </a>
                    </div>
                    <div id="collapseOne" class="collapse" data-parent="#accordion">
                        <div id="application_table" class="card-body table-responsive">

                            <?php require "applications/pending_applications.php"; ?>

                            
                        </div>
                    </div>
                </div>



            <!-- Approved Application -->
                <div class="card">
                    <div class="card-header">
                        <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
                            Approved Applications
                        </a>
                    </div>

                    <div id="collapseTwo" class="collapse" data-parent="#accordion">
                        <div id="application_table" class="card-body table-responsive">

                            <?php require "applications/approved_applications.php"; ?>

                        </div>
                    </div>
                </div>


            <!-- Past Application -->
                <div class="card">
                    <div class="card-header">
                        <a class="collapsed card-link" data-toggle="collapse" href="#collapseThree">
                            Past Applications
                        </a>
                    </div>

                    <div id="collapseThree" class="collapse" data-parent="#accordion">
                        <div id="application_table" class="card-body table-responsive">

                            <?php require "applications/past_applications.php"; ?>

                        </div>
                    </div>
                </div>
            
            </div>
                
              
               
        </div>




 






        </div>


    </div>

<div id="modal">
      <!-- The Modal -->
        <div class="modal fade" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
                
                    <!-- Modal Header -->
                    <div class="modal-header">
                    <h4 class="modal-title">Modal Heading</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    
                    <!-- Modal body -->
                    <div class="modal-body">
                        Modal body..
                    </div>
                    
                    <!-- Modal footer -->
                    <div class="modal-footer">
                    <button type="button" class="cancel_btn btn btn-warning" data-dismiss="modal">Cancel</button>
                    <button id="delete_confirm" type="button" class="btn btn-danger" >Delete</button>
                    </div>
                    
                </div>
            </div>
        </div>
</div>