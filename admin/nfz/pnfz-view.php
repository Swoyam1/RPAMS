<!-- Right Column Heading -->
<div class="card bg-secondary text-white mb-4">
        <div class="card-body p-3"><h5 class="m-0">View Permanent No Fly Zones</h5></div>
    </div>
<!-- -->

    <input id="pac-input" class="" type="text" placeholder="Search"
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
                                border: 0;
                                z-index:2;">
    <div id = "GoogelMap" style = "height: 350px;width:100%;" class="mb-4"> </div>

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

    var tempzones=
    {
        <?php
            $rootfolder = $_SERVER['DOCUMENT_ROOT'].'/rpams/';
            require $rootfolder."common/get-tnfz.php";
        ?>
    }

    
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
        for (var area in tempzones) 
        {
            // Add the circle for this city to the map.
            var areaCircle = new google.maps.Circle({
                strokeColor: '#FFA500',//border color
                strokeOpacity: 0.5,//circle border
                strokeWeight: 1,//circle border width 
                fillColor: '#FFA500',
                fillOpacity: 0.3  ,
                map: map,
                center: tempzones[area].center,
                radius: tempzones[area].rad,
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
    
    //google.maps.event.addDomListener(window, 'load', initMap);

</script>