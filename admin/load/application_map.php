<?php


    if(!isset($_SESSION)){
        session_start();
    }

    if(isset($_GET['application_no']))
    {
        $application_no=$_GET['application_no'];

        $rootfolder = $_SERVER['DOCUMENT_ROOT'].'/rpams';
        $user_id=$_SESSION['user_id'];

        require $rootfolder."/process/dbconnect.php";

        $sql="SELECT * FROM flight_request WHERE Application_No=$application_no";

        $result=mysqli_query($conn,$sql);

        $row = mysqli_fetch_array($result);

        $latitude=$row['Latitude'];
        $longitude=$row['Longitude'];
        if(!isset($row['Radius']))
        {
            $radius=20;
        }
        else{
            $radius=$row['Radius'];
        }

        $purpose=$row['Purpose'];
    }
    else{
        exit();
    }

?>

    <input id="pac-input" class="mapSearchBox" type="text" placeholder="Search">
    <div id="GoogleMap" style="height: 350px;width:100%;" class="mb-4"> </div>

    <form id="radius_update_form"  method="POST">

        <!-- Radius -->
        <div id="radius_div" style="display:none" class="form-group row">
            <label class="col-sm-3 col-form-label">Radius (metres)</label>
            <div class="col-sm-3">
                <input id="radius" name="radius" type="number" min="1" max="<?php echo $radius; ?>" class="form-control" required value="<?php echo $radius; ?>" />
            </div>
        </div>
        <script>
            $(document).ready(function(){

                $(document).on('click','#radius_edit',function(){
                    $("#radius_div").css({"display": "flex"});
                });

            });
            </script>
    </form>

    <script>
        var map;
        var marker;
        var markers=[];
        var google;
        var defaultLatLng = new google.maps.LatLng(<?php echo $latitude.','.$longitude ?>);
        console.log(defaultLatLng);
        var geocoder = new google.maps.Geocoder();
        var infowindow = new google.maps.InfoWindow();
        var iwindow;
        var infowindows = [];
        var newRadius;


        var application = 
        {
            user_area:
            {
                center:{<?php echo 'lat:'.$latitude.',lng:'.$longitude ?>},
                rad:<?php echo $radius ?>
            }
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
            draggable: false,
            
            });

            var applicationCircle;
            var applicationCircle = new google.maps.Circle({
                strokeColor: '#FF0000',//border color
                strokeOpacity: 0.5,//circle border
                strokeWeight: 1,//circle border width 
                fillColor: '#FF0000',
                fillOpacity: 0.3  ,
                map: map,
                center: <?php echo '{lat:'.$latitude.',lng:'.$longitude.'}' ?>,
                
                radius: <?php echo $radius ?>,
                cursor:'not-allowed',
                editable: false
            });

            applicationCircle.bindTo('center', marker, 'position');

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

            geocoder.geocode({
                'latLng': defaultLatLng
            }, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    if (results[0]) {
                        infowindow.setContent(results[0].formatted_address);
                        infowindow.open(map, marker);
                        console.log(marker);
                    }
                }
            });

            


            var radiusinput = document.getElementById("radius");

            radiusinput.addEventListener("input",function(){
                var radiusvalue = document.getElementById("radius").value;
                newRadius = radiusvalue;

                applicationCircle.setRadius(Number(radiusvalue));
            });


            google.maps.event.addListener(applicationCircle, 'radius_changed', function() {

                document.getElementById("radius").value=Math.round(applicationCircle.getRadius());
                newRadius = applicationCircle.getRadius();
            });

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

    <script>//initMap();</script>


<div>

    <div id="ack"></div>
</div>

<script>
$(document).ready(function(){
    $("#nfz-add-submit").click(function(){
        $.post($("#nfz-add").attr("action"),
                $("#nfz-add :input").serializeArray(),
                function(data){
                    //$("#2c").html(data);
                    alert(data);
                });
        $("#nfz-add").submit(function(){
            return false;
        });
    });
});
</script>
