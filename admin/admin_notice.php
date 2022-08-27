<?php
    $rootfolder = $_SERVER['DOCUMENT_ROOT'].'/rpams/';
    $roots="../";
    $webpagetitle="No Fly Zones: Admin Panel";

    if(!isset($_SESSION)){
        session_start();
    }

    // Check if the user is logged in, if not then redirect to signin page.
    if(is_null($_SESSION["loggedin"]))
    {
        header("location: ../login.php?loginerror=NotLoggedIn");
        exit();
    }

    //Checking if the user is admin
    /* Temp comment
    else if($_SESSION['user_type']!="admin")
    {
        header("location: ../index.php");
        exit();
    }
    */
    else
    {
        require $rootfolder."common/common-header.php";  //includes only css/js
        require "admin-header.php";              // includes title and nevigation bar
        //require "session-details.php";          
        //require "load/define-gender.php";
    }
?>

    <div class="container">
        
        <!--<div class="float-sm-left col-sm-3 border border-primary mt-2 p-2">-->
        <div class="float-sm-left col-sm-3 mt-2 p-2">
            <div class="card" style="width:auto">
                <img class="card-img-top" src="https://www.w3schools.com/bootstrap4/img_avatar3.png" alt="Card image" style="width:100%">
                <div class="card-body">
                    <h4 class="card-title">Administrator</h4>
                    <p>admin@rpams.com</p>
                </div>
            </div>
        </div>


        <!--<div class="float-sm-right col-sm-9 border border-primary mt-2 p-2"> -->
        <div class="float-sm-right col-sm-9 mt-2 p-1">
        
            <!-- Right Column Heading -->
            <div class="card bg-secondary text-white mb-4">
                    <div class="card-body p-3"><h5 class="m-0">Manage Notices</h5></div>
            </div>
            <!-- -->

            <div id="accordion">
                <!-- Register Drone -->
                <div class="card">
                    <div class="card-header">
                        <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
                            Add Notice
                    </a>
                    </div>

                    <div id="collapseTwo" class="collapse show" data-parent="#accordion">
                        <div class="card-body">
                            <!-- Alert Area -->
                                <div id="alert_div" class="alert alert-success fade show mx-2 hidden">
                                    <button type="button" class="close" onclick="document.getElementById('alert_div').style.display='none'">&times;</button>
                                    <div id="server_msg" class="alert_text"></div>
                                </div>
                            <!-- -->

                            <form id="notice_upload" action="admin/process/upload-notice.php" method="post">
                                <!-- Subject -->
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Subject</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="subject" value="" required class="form-control" placeholder="Notice Content">
                                        </div>
                                    </div>


                                <!-- Link -->
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Link</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="link" class="form-control" value="" placeholder="https://www/rapms.com/notice">
                                        </div>
                                    </div>

                                <!-- Audience -->
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Audience Type</label>
                                        <div class="col-sm-9 mt-2">
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input name="audience" type="checkbox" class="form-check-input" value="admin">Admin Only
                                                </label>
                                            </div>
                                            <div class="form-check-inline">
                                                <label class="form-check-label">
                                                    <input name="audience" type="checkbox" class="form-check-input" value="user">Users
                                                </label>
                                            </div>
                                        </div>
                                    </div>


                                <!-- Update -->
                                    <div class="form-group row">
                                        <div class="col text-center">
                                            <button type="button" name="notice-upload-submit" class="btn btn-primary">Save Notice</button>
                                            <script>
                                                $(document).ready(function(){
                                                    $('button[name="notice-upload-submit"]').click(function(){
                                                        
                                                        $("#alert_div").css({"display":"none"});
                                                        $.post($("#notice_upload").attr("action"),
                                                                $("#notice_upload :input").serializeArray(),
                                                                function(data){

                                                                    if(data == 1)
                                                                    {
                                                                        $("#server_msg").html("Notice added Successfully!<br/><i><a href='admin/adminpanel.php'>Click here to view to the notice.</a></i>");
                                                                        $("#alert_div").css({"display":"block"});
                                                                        $("#notice_upload")[0].reset();
                                                                        //notify();
                                                                    }
                                                                    else
                                                                    {
                                                                        $("#server_msg").text(data);
                                                                        $("#alert_div").css({"display":"block"});
                                                                    }
                                                                    //alert(data);
                                                                });
                                                        $("#drone_register").submit(function(){
                                                            return false;
                                                        });
                                                    });
                                                });
                                            </script>
                                        </div>
                                    </div>
                                    

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>