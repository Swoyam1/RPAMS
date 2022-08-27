<?php
    $rootfolder = $_SERVER['DOCUMENT_ROOT'].'/rpams';
    $webpagetitle="Flight Application: RPA Management System";
    session_start();

    // Check if the user is logged in, if not then redirect to signin page.
    if(is_null($_SESSION["loggedin"]))
    {
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
        require "../common/common-header.php";  //includes only css/js
        require "user-header.php";              // includes title and nevigation bar
        require "session-details.php";          
        require "load/define-gender.php";
    }
?>
<!-- -->

<div class="container">
    <?php require "load/profile-sidebar.php"; //uses col-sm-3 ?>

    <div class="float-sm-right col-sm-9 mt-2 p-2">

        <!-- Right Column Heading -->
            <div class="card bg-secondary text-white mb-4">
                <div class="card-body p-3"><h5 class="m-0">Apply for Fight Permission</h5></div>
            </div>
        <!-- -->

        <div id="accordion">

            <!-- Apply -->
            <div class="card">
                <div class="card-header">
                    <a class="card-link" data-toggle="collapse" href="#collapseOne">
                        Apply
                    </a>
                </div>
                <div id="collapseOne" class="collapse show" data-parent="#accordion">
                    <div class="card-body">

                    <form id="fight_application" action="process/fight-application.php" method="post">

                    <!-- Choose Drone -->
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Drone</label>
                            <div class="col-sm-10">
                                <select name="drone_id" required class="form-control" placeholder="Choose">
                                    <option selected value="">Select Drone</option>
                                    <?php require "load/drone-list.php"; ?>
                                    
                                </select>
                            </div>
                        </div>


                    <!-- Timestamp -->
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Date & Time</label>
                            <div class="col-sm-4">
                                <input type="datetime-local" name="timestamp"  class="form-control">
                            </div>

                            <label class="col-sm-2 col-form-label">Duration (Hours)</label>
                            <div class="col-sm-4">
                                <input id="duration" name="duration" class="form-control" type="number" min='0' max='12' required placeholder="Flight duration" />
                            </div>
                        </div>

                    <!-- map -->
                    <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Pick your location of flight</label>
                            <input id="pac-input" class="" type="text" placeholder="Search your Location of Flight"
                            style="background-color: #fff;
                                    font-weight: 370;
                                    padding: 0px 23px;
                                    text-overflow: ellipsis;
                                    width: 40%;
                                    position: absolute;
                                    vertical-align: middle;
                                    font-family: Roboto, Arial, sans-serif;
                                    font-size: 18px;
                                    border-bottom-right-radius: 2px;
                                    border-top-right-radius: 2px;
                                    background-clip: padding-box;
                                    box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px;
                                    min-width: 65px;
                                    height: 40px;
                                    margin: 10px 0;
                                    border: 0;">
                            <div id = "GoogelMap" style = "height: 350px;width:100%;" class="mb-4"> </div>
                        </div>
                    
                    <!-- Adreess auto selected from map -->
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Place Name</label>
                        <div class="col-sm-10">
                            <input id="address" name="address" class="form-control" required placeholder="Address" />
                        </div>
                    </div>

                    <!-- Latitude Longitude-->
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Latitude</label>
                        <div class="col-sm-4">
                            <input id="latitude" name="latitude" class="form-control" type="number" min="-90" max="90" step="any" required placeholder="Latitude value" />
                        </div>

                        <label class="col-sm-2 col-form-label">Longitude</label>
                        <div class="col-sm-4">
                            <input id="longitude" name="longitude" class="form-control" type="number" min="-180" max="180" step="any" required placeholder="Longitude value" />
                        </div>
                    </div>
                    <script>
                        $(document).ready(function () {
                            $("#latitude").on("input",function() {
                                $(this).val(parseFloat($(this).val()).toFixed(7));
                            });
                            $("#longitude").on("input",function() {
                                $(this).val(parseFloat($(this).val()).toFixed(7));
                            });
                        });
                    </script>

                    <!-- Radius -->
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Radius<br>(in metres)</label>
                        <div class="col-sm-4">
                            <input id="radius" name="radius" type="number" min="1" class="form-control" required value="50" />
                        </div>
                    </div>

                    <!-- Purpose -->
                        <div class="form-group row" >
                            <label class="col-sm-2 col-form-label">Purpose</label>
                            <div class="col-sm-10">
                            <textarea id="textbox" style="" name="purpose" required class="form-control" placeholder="Enter your purpose of flight."></textarea>
                            </div>
                            <script> auto_textbox_height(); </script>
                        </div>


                    <!-- Submit Button -->
                        <div class="form-group row">
                            <div class="col text-center">
                                <button type="button" name="fight_application_submit" class="btn btn-primary">Apply</button>
                            </div>
                        </div>
                    </form>

                    <!-- Alert Area -->
                    <div id="alert_div" class="alert alert-success fade show mx-2 hidden">
                            <button type="button" class="close" onclick="document.getElementById('alert_div').style.display='none'">&times;</button>
                            <div id="server_msg" class="alert_text"></div>
                        </div>
                    <!-- -->
                    <script>
                        $(document).ready(function(){
                            $('button[name="fight_application_submit"]').click(function(event){
                                event.preventDefault();
                                event.stopImmediatePropagation();
                                $("#alert_div").css({"display":"none"});
                                $.post($("#fight_application").attr("action"),
                                    $("#fight_application :input").serializeArray(),
                                    function(data){

                                        if(data == 1)
                                        {
                                            $("#server_msg").html("Your application has been submitted!<br/><i><a href='users/application.php'>Click here to view to your application.</a></i>");
                                            $("#alert_div").css({"display":"block"});
                                            //$("#fight_application").hide();
                                            notify();
                                        }
                                        else
                                        {
                                            $("#server_msg").text(data);
                                            $("#alert_div").css({"display":"block"});
                                        }
                                        
                                        //alert(data);
                                            
                                });
                                $("#fight_application").submit(function(){
                                    return false;
                                });
                            });
                        });
                    </script>
                        
                    </div>
                </div>
            </div>

        </div>

        <div class="mt-5">
            

        </div>

        <!--------  AIzaSyAlaId49Gs2f1oje96ZTZeN-0MRBWxpxmE  AIzaSyBBb2NB5T9Mf_fm116dtM9GFtrg5g5V5Uc AIzaSyBqPcPUJFsC_gzl-q-l5loUOCZAP1bLvJ4-->
        
        <script src = "https://maps.googleapis.com/maps/api/js?key=AIzaSyBBb2NB5T9Mf_fm116dtM9GFtrg5g5V5Uc&libraries=places" >
        </script>
                
        <script type = "text/javascript">
            var map;
            var marker;
            var markers=[];
            var myLatlng = new google.maps.LatLng(20.5937, 78.9629);
            console.log(myLatlng);
            var geocoder = new google.maps.Geocoder();
            var infowindow = new google.maps.InfoWindow();


            var noflyzones = 
            {

                <?php
                    $rootfolder = $_SERVER['DOCUMENT_ROOT'].'/rpams/';
                    require $rootfolder."common/get-pnfz.php";
                ?>
            
            };

            function initMap() {
                var mapOptions = {
                    zoom: 4,
                    center: myLatlng,
                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                    streetViewControl: false,
                    draggableCursor:'context-menu'
                };

                map = new google.maps.Map(document.getElementById("GoogelMap"), mapOptions);

                for (var area in noflyzones) 
                {
                // Add the circle for this city to the map.
                var areaCircle = new google.maps.Circle({
                    strokeColor: '#FF0000',//border color
                    strokeOpacity: 0.5,//circle border
                    strokeWeight: 1,//circle border width 
                    fillColor: '#FF0000',
                    fillOpacity: 0.3  ,
                    map: map,
                    center: noflyzones[area].center,
                    radius: noflyzones[area].rad,
                    cursor:'not-allowed'
                });
                }

                

                marker = new google.maps.Marker({
                map: map,
                //position: myLatlng,//enabel to display the marker on load
                draggable: true,
                
                });

                google.maps.event.addListener(marker, 'click', function(event) {
                    marker.setVisible(false);
                    infowindow.close();
                });

                google.maps.event.addListener(map, 'click', function(event) {
                    marker.setPosition(event.latLng);
                });

//enable to diplay the infowindow on page load
/*
                geocoder.geocode({
                    'latLng': myLatlng
                }, function(results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        if (results[0]) {
                            $('#latitude,#longitude').show();
                            $('#address').val(results[0].formatted_address);
                            $('#pincode').val(results[0].address_components[results[0].address_components.length - 1].long_name);
                            $('#state').val(results[0].address_components[results[0].address_components.length - 2].long_name);
                            $('#city').val(results[0].address_components[results[0].address_components.length - 3].long_name);
                            $('#area').val(results[0].address_components[0].long_name);
                            $('#latitude').val(marker.getPosition().lat());
                            $('#longitude').val(marker.getPosition().lng());
                            infowindow.setContent(results[0].formatted_address);
                            infowindow.open(map, marker);
                        }
                    }
                });
*/
                google.maps.event.addListener(marker, 'dragend', function()
                {infowindow.close();
                    geocoder.geocode({
                        'latLng': marker.getPosition()
                    }, function(results, status) {
                        if (status == google.maps.GeocoderStatus.OK) {
                            if (results[0]) {
                                $('#address').val(results[0].formatted_address);
                                $('#pincode').val(results[0].address_components[results[0].address_components.length - 1].long_name);
                                $('#state').val(results[0].address_components[results[0].address_components.length - 2].long_name);
                                $('#city').val(results[0].address_components[results[0].address_components.length - 3].long_name);
                                $('#area').val(results[0].address_components[0].long_name);
                                $('#latitude').val(marker.getPosition().lat());
                                $('#longitude').val(marker.getPosition().lng());
                                infowindow.setContent(results[0].formatted_address);
                                infowindow.open(map, marker);
                                marker.setVisible(true);
                            }
                        }
                    });
                });

                
                google.maps.event.addListener(map,'click', function() 
                {infowindow.close();
                    geocoder.geocode({
                        'latLng': marker.getPosition()
                    }, function(results, status) {
                        if (status == google.maps.GeocoderStatus.OK) {
                            if (results[0]) {
                                $('#address').val(results[0].formatted_address);
                                $('#pincode').val(results[0].address_components[results[0].address_components.length - 1].long_name);
                                $('#state').val(results[0].address_components[results[0].address_components.length - 2].long_name);
                                $('#city').val(results[0].address_components[results[0].address_components.length - 3].long_name);
                                $('#area').val(results[0].address_components[0].long_name);
                                $('#latitude').val(marker.getPosition().lat());
                                $('#longitude').val(marker.getPosition().lng());
                                infowindow.setContent(results[0].formatted_address);
                                infowindow.open(map, marker);
                                marker.setVisible(true);
                            }
                        }
                    });
                });

                // Autocomplete Search Box
                var input = document.getElementById('pac-input');
                var autocompleteoptions = 
                {
                    componentRestrictions: {country: 'in'}
                };

                var autocomplete = new google.maps.places.Autocomplete(input,autocompleteoptions);
                //this push the search box inside map
                map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

                
                autocomplete.addListener('place_changed', function() 
                {
                
                    var place = autocomplete.getPlace();
                    console.log(place);
                    if (!place.geometry) {
                        return;
                    }

                    if (place.geometry.viewport) {
                        map.fitBounds(place.geometry.viewport);
                    } else {
                        map.setCenter(place.geometry.location);
                        map.setZoom(17);
                    }

                    // Set the position of the marker using the place ID and location.
                    marker.setPosition(place.geometry.location);
                    //marker.setVisible(true);


                    geocoder.geocode({
                        'latLng': marker.getPosition()
                    }, function(results, status) {
                        if (status == google.maps.GeocoderStatus.OK) {
                            if (results[0]) {
                                $('#latitude,#longitude').show();
                                $('#address').val(results[0].formatted_address);
                                $('#pincode').val(results[0].address_components[results[0].address_components.length - 1].long_name);
                                $('#state').val(results[0].address_components[results[0].address_components.length - 2].long_name);
                                $('#city').val(results[0].address_components[results[0].address_components.length - 3].long_name);
                                $('#area').val(results[0].address_components[0].long_name);
                                $('#latitude').val(marker.getPosition().lat());
                                $('#longitude').val(marker.getPosition().lng());
                                infowindow.setContent(results[0].formatted_address);
                                infowindow.open(map, marker);
                                marker.setVisible(true);
                            }
                        }
                    });

                });
            }
            google.maps.event.addDomListener(window, 'load', initMap);

        </script>




    </div>



</div>
