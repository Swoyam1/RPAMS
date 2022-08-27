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

<script src = "https://maps.googleapis.com/maps/api/js?key=AIzaSyBBb2NB5T9Mf_fm116dtM9GFtrg5g5V5Uc&libraries=places"></script>

<input id="pac-input" class="mapSearchBox" type="text" placeholder="Search">
<div id="GoogleMap" style="height: 86vh;width:100%;" class="mb-4"> </div>

<script>
    var map;
    var marker;
    var markers=[];
    var google;
    var defaultLatLng = new google.maps.LatLng(20.5937, 78.9629);;
    console.log(defaultLatLng);
    var geocoder = new google.maps.Geocoder();
    var infowindow = new google.maps.InfoWindow();
    var iwindow;
    var infowindows = [];
    var newRadius;


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
            center: defaultLatLng,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            streetViewControl: false,
            draggableCursor:'context-menu'
        };

        map = new google.maps.Map(document.getElementById("GoogleMap"), mapOptions);


        marker = new google.maps.Marker({
            icon: {url: "images/logo3.gif",scaledSize: new google.maps.Size(64, 64)},
            map: map,
            position: defaultLatLng,//enabel to display the marker on load
            draggable: false,
        
        });


        $(document).ready(function(){

            $(document).on('click','#radius_edit',function(){
                applicationCircle.setEditable(true);
            });

        });


        for (var area in noflyzones) 
        {

            console.log(noflyzones[area].center);
            console.log(typeof noflyzones[area].center);
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
            var iwindow = new google.maps.InfoWindow({
                                content: noflyzones[area].common_name,
                                position: noflyzones[area].center
                            });
            iwindow.open(map);
            infowindows.push(iwindow);

        }
        
        console.log(infowindows);

      


        google.maps.event.addListener(map, 'zoom_changed', function() {

            console.log(typeof map.getZoom());
            if(map.getZoom() < 10)
            {
                for (i = 0; i < infowindows.length; i++) {
                    infowindows[i].close();
                }
            }
        });



        // Autocomplete Search Box
        var input = document.getElementById('pac-input');
        var autocompleteoptions = 
        {
            componentRestrictions: {country: 'in'}
        };

        var autocomplete = new google.maps.places.Autocomplete(input,autocompleteoptions);
        
        //this pushs the search box inside map
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

        });
    }



    initMap();
</script>