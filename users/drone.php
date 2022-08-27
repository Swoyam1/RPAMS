<?php
    $rootfol = $_SERVER['DOCUMENT_ROOT'].'/rpams';
    $webpagetitle="User Profile: RPA Management System";
    session_start();

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
                <div class="card-body p-3"><h5 class="m-0">RPA Mangement Interface</h5></div>
            </div>


            

            <div id="accordion">

            <!-- Drone Status -->
                <div class="card">
                    <div class="card-header">
                        <a class="card-link" data-toggle="collapse" href="#collapseOne">
                            Drone List
                        </a>
                    </div>
                    <div id="collapseOne" class="collapse" data-parent="#accordion">
                        <div class="card-body ">
                            <h3 class="text-center">Drone Status</h3>
                            <div class="table-responsive">
                                <?php require "load/drone-details.php"; ?>
                            </div>
                            
                        </div>
                    </div>
                </div>



            <!-- Register Drone -->
                <div class="card">
                    <div class="card-header">
                        <a class="collapsed card-link" data-toggle="collapse" href="#collapseTwo">
                            Register your RPA
                    </a>
                    </div>

                    <div id="collapseTwo" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                            <!-- Alert Area -->
                                <div id="alert_div" class="alert alert-success fade show mx-2 hidden">
                                    <button type="button" class="close" onclick="document.getElementById('alert_div').style.display='none'">&times;</button>
                                    <div id="server_msg" class="alert_text"></div>
                                </div>
                            <!-- -->

                            <form id="drone_register" action="process/drone-register-process.php" method="post">
                                <!-- drone ID -->
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Drone ID/SN</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="drone_id" value="" required class="form-control" placeholder="E.g. 189CEB9BA20873">
                                        </div>
                                    </div>


                                <!-- Name -->
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Drone Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="drone_name" class="form-control" value="" placeholder="E.g. DJI Phantom 4 Pro">
                                        </div>
                                    </div>

                                <!-- Nick Name -->
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Drone Nickname</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="drone_nickname" class="form-control" value="" required placeholder="E.g. My balck drone">
                                        </div>
                                    </div>

                                <!-- Weight -->
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Weight in Gram</label>
                                        <div class="col-sm-9">
                                        <input type="number" name="drone_weight" value="" required class="form-control" placeholder="E.g. 1338">
                                        </div>
                                    </div>


                                <!-- UIN -->
                                    <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Unique Identification Number (UIN)</label>
                                            <div class="col-sm-9">
                                            <input type="text" name="drone_uin" value="" required class="form-control" placeholder="E.g. U0000001">
                                            <br/><span class="small text-warning">If you don't have UIN, visit <a href="https://digitalsky.dgca.gov.in/" target="_blank">digitalsky.dgca.gov.in</a> to register your RPA!</span>
                                            </div>
                                        </div>
                                    </div>

                                <!-- Update -->
                                    <div class="form-group row">
                                        <div class="col text-center">
                                            <button type="submit" name="drone-register-submit" class="btn btn-primary">Register</button>
                                            <script>
                                                $(document).ready(function(){
                                                    $('button[name="drone-register-submit"]').click(function(){
                                                        $("#alert_div").css({"display":"none"});
                                                        $.post($("#drone_register").attr("action"),
                                                                $("#drone_register :input").serializeArray(),
                                                                function(data){

                                                                    if(data == 1)
                                                                    {
                                                                        $("#server_msg").html("Drone Registered Successfully!<br/><i><a href='users/drone.php'>Click here to view to your drone list.</a></i>");
                                                                        $("#alert_div").css({"display":"block"});
                                                                        $("#drone_register")[0].reset();
                                                                        notify();
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


            <!-- Drone Activity-->
                <div class="card">
                    <div class="card-header">
                        <a class="collapsed card-link" data-toggle="collapse" href="#collapseThree">
                        View Activity
                        </a>
                    </div>

                    <div id="collapseThree" class="collapse" data-parent="#accordion">
                        <div class="card-body">
                            <h3 class="text-center">Drone Activity List</h3>
                            <div class="table-responsive">
                                <?php require "load/drone-activity.php"; ?>
    <script src = "https://maps.googleapis.com/maps/api/js?key=AIzaSyBBb2NB5T9Mf_fm116dtM9GFtrg5g5V5Uc&libraries=places" ></script>

                            </div>    
                        </div>
                    </div>
                </div>
            
            </div>
                
              
               
        </div>

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
                    <button id="marker_view" type="button" class="btn btn-primary" >View Marker</button>
                    <button id="view_infowindow" type="button" class="btn btn-primary" >Hide Infowindow</button>
                    <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>


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
    <script>
    
        $(document).ready(function(){

            $(document).on('click','.activity_view_btn',function(){
                view_application(event);
            });

        });


        var $flight_id;
        function view_application(event){

            var $row=$(event.target).closest('tr');
            $flight_id=$row.find('td:eq(0)').text();
            console.log($row);
            console.log($flight_id);

            $(".modal-title").html('Application No: <b>'+$flight_id+'</b>');
            $(".modal-body").html($("#loading").html());
            $(".modal-body").load('users/load/activity_map.php?flight_id='+$flight_id);

            $("#myModal").modal('show');


        };


    </script>









    </body>
</html>