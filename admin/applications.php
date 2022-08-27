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
            <div class="bg-primary text-light text-center p-2 mx-2 mt-2 rounded">Total Applications</div>
            <div id="total_counts" class="border border-primary rounded-bottom border-top-0 p-2 mx-2 mb-2">
                <?php require "load/application_count.php"; ?>
            </div>
        </div>
    </div>





    <div class="float-sm-right col-sm-9 mt-2 p-2" id="2c">

        <!-- Right Column Heading -->
        <div class="card bg-secondary text-white mb-4">
                <div class="card-body p-3"><h5 class="m-0">Manage Applications</h5></div>
        </div>
        <!-- -->
       
            <!-- Alert Area -->
            <div id="alert_div" class="alert alert-success fade show mx-2 hidden">
                    <button type="button" class="close" onclick="document.getElementById('alert_div').style.display='none'">&times;</button>
                    <div id="server_msg" class="alert_text"></div>
                </div>
            <!-- -->

        <div id="application_table" class="card-body table-responsive">




        </div>

        <ul class="pagination justify-content-center" style="margin:20px 0">
            <li class="page-item"><a class="page-link" id="pagination_link">Previous</a></li>
            <li class="page-item"><a class="page-link" id="pagination_link">1</a></li>
            <li class="page-item"><a class="page-link" id="pagination_link">2</a></li>
            <li class="page-item"><a class="page-link" id="pagination_link">3</a></li>
            <li class="page-item"><a class="page-link" id="pagination_link">Next</a></li>
        </ul>
    </div>


</div>


<div id="modal">
      <!-- The Modal -->
        <div class="modal fade" id="myModal" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                
                    <!-- Modal Header -->
                    <div class="modal-header">
                    <h4 class="modal-title">Modal Heading</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    
                    <!-- Modal body -->
                    <div class="modal-body">

                    </div>
                    
                    <!-- Modal footer -->
                    <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                    <button id="radius_edit" type="button" class="btn btn-primary" >Edit</button>
                    <button id="approve_confirm" type="button" class="btn btn-warning" >Approve</button>
                    <button id="reject_confirm" type="button" class="btn btn-danger" >Reject</button>

                    </div>
                    
                </div>
            </div>
        </div>
</div>

<div id="confirm">
      <!-- The Modal -->
        <div class="modal fade" id="confirm_box" style="z-index:2000" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog">
                <div class="modal-content">
                
                    <!-- Modal Header -->
                    <div class="modal-header">
                    <h4 class="confirm_box-title"></h4>
                    <button type="button" class="close cancel_btn" data-dismiss="modal">&times;</button>
                    </div>
                    
                    <!-- Modal body -->
                    <div class="confirm_box-body m-2 p-2">

                    </div>
                    
                    <!-- Modal footer -->
                    <div class="modal-footer">
                    <button id="canceled" type="button" class="cancel_btn btn btn-success" data-dismiss="modal">Cancel</button>
                    <button id="approved" type="button" class="btn btn-warning" >Approve</button>
                    <button id="rejected" type="button" class="btn btn-danger" >Reject</button>

                    </div>
                    
                </div>
            </div>
        </div>
</div>
<!--  data-backdrop="static" data-keyboard="false" -->
<div id="loading" style="display:none">
    <div class="text-center">
        <div class="spinner-grow text-muted"></div>
        <div class="spinner-grow text-primary"></div>
        <div class="spinner-grow text-success"></div>
        <div class="spinner-grow text-info"></div>
        <p class="mt-2">Loading...</p>
        <div class="spinner-grow text-warning"></div>
        <div class="spinner-grow text-danger"></div>
        <div class="spinner-grow text-secondary"></div>
        <div class="spinner-grow text-dark"></div>
                                    
    </div>
</div>


<script src = "https://maps.googleapis.com/maps/api/js?key=AIzaSyBBb2NB5T9Mf_fm116dtM9GFtrg5g5V5Uc&libraries=places" ></script>