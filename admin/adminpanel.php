<?php
    $rootfolder = $_SERVER['DOCUMENT_ROOT'].'/rpams';
    $roots="../";
    $webpagetitle="Admin Panel: RPA Management System";
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
        require "../common/common-header.php";  //includes only css/js
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
        <div class="row row-eq-height">
            <div class="col-sm-6">
                <div class="bg-primary rounded p-1 text-center m-1">
                        <h3 class="text-center text-light">Applications Status</h3>
                        <p class="text-light">No. of pending applications: <?php require "load/pending_applications_count.php";?></p>
                        <a href="admin/applications.php" class="btn btn-sm btn-outline-light mb-2">Manage</a>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="bg-success rounded p-1 text-center m-1">
                        <h3 class="text-center text-light">RPA Status</h3>
                        <p class="text-light">No. of active RPAs: <?php require "load/pending_applications_count.php";?></p>
                        <a href="admin/applications.php" class="btn btn-sm btn-outline-light mb-2">Manage</a>
                </div>
            </div>


        </div>

        <div class="row">

            <div class="col-sm-12">
                <div class="bg-dark rounded p-3  m-1">
                        <h4 class="text-center text-center text-light">Notices</h4>
                        <p class="text-light"><?php require "load/admin_notice.php";?></p>
                        <!-- <a href="users/application.php" class="btn btn-sm btn-outline-light mb-2">Manage</a> -->
                </div>
            </div>

        </div>



        </div>


    </div>