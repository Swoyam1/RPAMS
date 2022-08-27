<?php


    if(!isset($_SESSION)){
        session_start();
    }

    if(isset($_GET['flight_id']))
    {
        $flight_id=$_GET['flight_id'];

        $rootfolder = $_SERVER['DOCUMENT_ROOT'].'/rpams';
        $user_id=$_SESSION['user_id'];

        require $rootfolder."/process/dbconnect.php";

        $sql="SELECT Drone_ID,Latitude,Longitude,Radius FROM flight_request WHERE Application_No=$flight_id Limit 1";

        $result=mysqli_query($conn,$sql);

        $row = mysqli_fetch_array($result);

        $drone_id=$row['Drone_ID'];
        $latitude=$row['Latitude']; 
        $longitude=$row['Longitude'];
        $radius=$row['Radius'];


    }
    else{
        exit();
    }

?>
    <input id="pac-input" class="mapSearchBox" type="text" placeholder="Search">
    <div id="GoogleMap" style="height: 350px;width:100%;" class="mb-4"> </div>

    <script>
        var map;
        var marker;
        var markers=[];
        var google;
        var defaultLatLng = new google.maps.LatLng(<?php echo $latitude.','.$longitude; ?>);
        console.log(defaultLatLng);
        var geocoder = new google.maps.Geocoder();
        var infowindow = new google.maps.InfoWindow();
        var iwindow;
        var infowindows = [];
        var activity_infowindow=[];
        var newRadius;


        var flight_activity = 
        {

            <?php

                $sql1 = "SELECT Latitude,Longitude,`Timestamp` FROM drone_activity Where Flight_ID=$flight_id";

                if(mysqli_query($conn,$sql1))
                {
                    $result1 = mysqli_query($conn,$sql1);
                    if (mysqli_num_rows($result1) > 0)
                    {
                        $i = 0;
                        while($row1 = mysqli_fetch_array($result1))
                        {
                            
                            echo $i.':{Timestamp:\''.$row1['Timestamp'].'\',center:{lat:'.$row1['Latitude'].', lng:'.$row1['Longitude'].'}},'."\r\n\r\t\r\t";                
                            $i++;
                        }
                    }
                    else
                    {
                        echo '';
                    }

                }
                else
                {
                    echo '';
                    
                }
                mysqli_close($conn);



                ?>
            
        };




        var noflyzones = 
        {

            <?php
                $rootfolder = $_SERVER['DOCUMENT_ROOT'].'/rpams/';
                require $rootfolder."common/get-pnfz.php";
            ?>
        
        };

        function initMap() {
            var mapOptions = {
                zoom: 17,
                center: defaultLatLng,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                streetViewControl: false,
                draggableCursor:'context-menu'
            };

            map = new google.maps.Map(document.getElementById("GoogleMap"), mapOptions);


            marker = new google.maps.Marker({
                map: map,
                position: defaultLatLng,//enabel to display the marker on load
                draggable: false
            
            });

            geocoder.geocode({
                'latLng': defaultLatLng
            }, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    if (results[0]) {
                        infowindow.setContent(results[0].formatted_address);
                        infowindow.open(map,marker);
                    }
                }
            });

            var applicationCircle;

            var applicationCircle = new google.maps.Circle({
                strokeColor: '#FF0000',//border color
                strokeOpacity: 0.5,//circle border
                strokeWeight: 1,//circle border width 
                fillColor: '#FF0000',
                fillOpacity: 0.2  ,
                map: map,
                center: <?php echo '{lat:'.$latitude.',lng:'.$longitude.'}' ?>,
                radius: <?php echo $radius ?>,
                cursor:'not-allowed',
                editable: false
            });

            //applicationCircle.bindTo('center', marker, 'position');
            
            var i = 0;
            for (var area in flight_activity) 
            {

                var iwindow = new google.maps.InfoWindow({
                                    content: flight_activity[area].Timestamp,
                                    position: flight_activity[area].center
                                });
                
                var markerr = new google.maps.Marker({
                    icon: {url: "https://chart.apis.google.com/chart?chst=d_map_pin_letter&chld="+i+"|FE6256|000000",scaledSize: new google.maps.Size(64, 64)},
                    map: map,
                    position: flight_activity[area].center,//enabel to display the marker on load
                    draggable: false,
                
                });

                iwindow.open(map,markerr);
                activity_infowindow.push(iwindow);
                markers.push(markerr);

                i++;
            }

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
/*                 var iwindow = new google.maps.InfoWindow({
                                    content: noflyzones[area].common_name,
                                    position: noflyzones[area].center
                                });
                iwindow.open(map);
                infowindows.push(iwindow); */

            }
            
            console.log(infowindows);



            


/*             google.maps.event.addListener(map, 'zoom_changed', function() {

                console.log(typeof map.getZoom());
                if(map.getZoom() < 10)
                {
                    for (i = 0; i < infowindows.length; i++) {
                        infowindows[i].close();
                    }
                }
            }); */

            $(document).ready(function()
            {

                $(document).on('click','#close_infowindow',function(){
                    for (i = 0; i < activity_infowindow.length; i++) {
                        activity_infowindow[i].close();
                    }
                    $('#close_infowindow').attr('id','view_infowindow').text('View Infowindow');
                });

                $(document).on('click','#view_infowindow',function(){
                    for (i = 0; i < activity_infowindow.length; i++) {
                        activity_infowindow[i].open(map,markers[i]);
                    }
                    $('#view_infowindow').attr('id','close_infowindow').text('Hide Infowindow');

                });



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

    <script>//initMap();</script>


<div>

    <div id="ack"></div>
</div>
