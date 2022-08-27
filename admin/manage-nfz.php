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
    <div class="float-sm-left col-sm-3 mt-2 p-2">
        <div class="card">
            <div class="mx-2 mt-2">
                <button class="btn dd-choice btn-danger btn-block">
                    Permanent No Fly Zones
                </button>
                <div class="hidden mt-1">
                    <div class="d-flex btn-group">
                        <button id="pnfz-view" class="btn btn-outline-danger border-top-0" href="#">View</button>
                        <button id="pnfz-edit" class="btn btn-outline-danger border-top-0" href="#">Edit</button>
                        <button id="pnfz-add" class="btn btn-outline-danger border-top-0" href="#">Add</button>
                    </div>
                </div>
            </div>

            <div class="mx-2 mt-2">
                <button class="btn dd-choice btn-warning btn-block">
                    Temporary No Fly Zones
                </button>
                <div class="hidden mt-1">
                    <div class="d-flex btn-group">
                        <button id="tnfz-view" class="btn btn-outline-warning border-top-0" href="#">View</button>
                        <button id="tnfz-edit" class="btn btn-outline-warning border-top-0" href="#">Edit</button>
                        <button id="tnfz-add" class="btn btn-outline-warning border-top-0" href="#">Add</button>
                    </div>
                </div>
            </div>

            <div class="m-2">
                <button class="btn dd-choice btn-success btn-block">
                    Green Zones
                </button>
                <div class="hidden mt-1">
                    <div class="d-flex btn-group">
                        <button id="greenzone-view" class="btn btn-outline-success border-top-0" href="#">View</button>
                        <button id="greenzone-edit" class="btn btn-outline-success border-top-0" href="#">Edit</button>
                        <button id="greenzone-add" class="btn btn-outline-success border-top-0" href="#">Add</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-2">
            <div class="bg-primary text-light text-center p-2 mx-2 mt-2 rounded">Statistics</div>
            <div class="border border-primary rounded-bottom border-top-0 p-2 mx-2 mb-2">
            <?php
                $rootfolder = $_SERVER['DOCUMENT_ROOT'].'/rpams/';
                require $rootfolder."admin/load/nfz-count.php";
            ?>
            </div>
        </div>
    </div>





    <div class="float-sm-right col-sm-9 mt-2 p-2" id="2c">

        <!-- Right Column Heading -->
        <div class="card bg-secondary text-white mb-4">
                <div class="card-body p-3"><h5 class="m-0">Manage No Fly Zones</h5></div>
            </div>
        <!-- -->
       
       <div class="jumbotron text-center">Select Permanent/Temporary NFZs to Continue!</div>
    </div>


</div>

<script>
//JQuery Scrip to show the dropdown 
        $(document).ready(function(){
        $(".dd-choice").click(function(){
            $(this).next(1).slideToggle("slow");
            this.blur();
        });
        });

        $(document).ready(function(){
            $("#pnfz-view").click(function(){
                $("#2c").load("admin/nfz/pnfz-view.php");
                ChangeURL('View No Fly Zones', 'admin/nfz/pnfz-view.php');
            });
            $("#pnfz-edit").click(function(){
                $("#2c").load("admin/nfz/pnfz-edit.php");
            });
            $("#pnfz-add").click(function(){
                $("#2c").load("admin/nfz/pnfz-add.php");
                ChangeURL('Add No Fly Zones', 'admin/nfz/pnfz-add.php');
            });
            $("#tnfz-view").click(function(){
                $("#2c").load("admin/nfz/tnfz-view.php");
            });
            $("#tnfz-edit").click(function(){
                $("#2c").load("admin/nfz/tnfz-edit.php");
            });
            $("#tnfz-add").click(function(){
                $("#2c").load("admin/nfz/tnfz-add.php");
            });
            $("#greenzone-view").click(function(){
                $("#2c").load("admin/nfz/greenzone-view.php");
            });
            $("#greenzone-edit").click(function(){
                $("#2c").load("admin/nfz/greenzone-edit.php");
            });
            $("#greenzone-add").click(function(){
                $("#2c").load("admin/nfz/greenzone-add.php");
            });

        });
</script>


<script src = "https://maps.googleapis.com/maps/api/js?key=AIzaSyBBb2NB5T9Mf_fm116dtM9GFtrg5g5V5Uc&libraries=places" >
        </script>
