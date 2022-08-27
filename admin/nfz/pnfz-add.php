<!-- Right Column Heading -->
<div class="card bg-secondary text-white mb-4">
        <div class="card-body p-3"><h5 class="m-0">Add Permanent No Fly Zones</h5></div>
    </div>
<!-- -->



<div class="mb-2">
Select the location in the map.
</div>




    <input id="pac-input" class="" type="text" placeholder="Search" style="background-color: #fff;
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
    <div id="GoogleMap" style="height: 350px;width:100%;" class="mb-4"> </div>






<div>
    <form id="nfz-add" action="admin/process/pnfz-add.php" method="POST">
        <!-- Adreess auto selected from map -->
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Place Name</label>
            <div class="col-sm-10">
                <input id="address" name="address" class="form-control" required disabled placeholder="Address" />
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Common Name</label>
            <div class="col-sm-10">
                <input id="common_name" name="common_name" class="form-control" required placeholder="Common name for above address" />
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

        <!-- Category -->
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Category</label>
            <div class="col-sm-4">
                <select name="category" required class="form-control">
                    <option selected value="">Select</option>
                    <option>Airport</option>
                    <option>Government Office</option>
                    <option>Private Organization</optioin>
                    <option>Industry</option>
                    <option>Other</option>
                </select>
            </div>

            <label class="col-sm-2 col-form-label">Radius (metres)</label>
            <div class="col-sm-4">
                <input id="radius" name="radius" type="number" min="1" class="form-control" required value="100" />
            </div>
        </div>
        <!-- Update -->
        <div class="form-group row">
            <div class="col text-right">
                <button id="nfz-add-submit" name="nfz-submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-primary">Reset</button>
            </div>
        </div>

    </form>
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

<script>
    var map;
    var marker;
    var markers=[];
    var google;
    var defaultLatLng = new google.maps.LatLng(20.5937, 78.9629);
    var geocoder = new google.maps.Geocoder();
    var infowindow = new google.maps.InfoWindow();


    var noflyzones = 
    {
        mumbaiairport:
        {
            center:{lat: 19.0895595, lng: 72.8656144},
            rad:5000
        }
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
        {
            infowindow.close();
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
    /*
        function viewradius(id)
        {
            var radiusinput = id.value;
            console.log(radiusinput);
            var latt=document.getElementById("latitude").value;
            var longg=document.getElementById("longitude").value;
            var cent="{latt: "+latt+", lng: "+longg+"}";
            var areaCircle = new google.maps.Circle({
                strokeColor: '#FF0000',//border color
                strokeOpacity: 0.5,//circle border
                strokeWeight: 1,//circle border width 
                fillColor: '#FF0000',
                fillOpacity: 0.3  ,
                map: map,
                center: cent,
                radius: radiusinput,
                cursor:'not-allowed'
            });
        }
        */

        var permCircle;
        var radiusinput = document.getElementById("radius");
        radiusinput.addEventListener("input",function(){
            var radiusvalue = document.getElementById("radius").value;
            console.log(Number(radiusvalue));
            var latt=document.getElementById("latitude").value;
            var longg=document.getElementById("longitude").value;
            var cent={lat: Number(latt), lng: Number(longg)};
            console.log(cent);
            permCircle.setRadius(Number(radiusvalue));
        });

        // Changing the marker position on change in input of latitude and longitude
        document.getElementById("latitude").addEventListener("input",function(){
            marker.setPosition(new google.maps.LatLng(latitude.value,longitude.value));
            marker.setVisible(true);
            //Getting the contents for Infowindow
            geocoder.geocode({'latLng': new google.maps.LatLng(latitude.value, longitude.value)}, function(results, status){
                    if (status == google.maps.GeocoderStatus.OK) {
                        if (results[0]) {
                            infowindow.setContent(results[0].formatted_address);
                            infowindow.open(map,marker);
                        }
                    }
                    // if no details found then show Location Unavailable
                    else{
                        $('#address').val(results[0].formatted_address);
                        infowindow.setContent("Location Not Available!");
                        infowindow.open(map,marker);
                    }
                }
            )
        });

        document.getElementById("longitude").addEventListener("input",function(){
            marker.setPosition(new google.maps.LatLng(latitude.value,longitude.value));
            marker.setVisible(true);
            //Getting the contents for Infowindow
            geocoder.geocode({'latLng': new google.maps.LatLng(latitude.value, longitude.value)}, function(results, status){
                    if (status == google.maps.GeocoderStatus.OK) {
                        if (results[0]) {
                            $('#address').val(results[0].formatted_address);
                            infowindow.setContent(results[0].formatted_address);
                            infowindow.open(map,marker);
                        }
                    }
                    // if no details found then show Location Unavailable
                    else{
                        infowindow.setContent("Location Not Available!");
                        infowindow.open(map,marker);
                    }

                }
            )
        });


        
        permCircle = new google.maps.Circle({
            strokeColor: '#FF0000',//border color
            strokeOpacity: 0.5,//circle border
            strokeWeight: 1,//circle border width 
            fillColor: '#FF0000',
            fillOpacity: 0.3  ,
            map: map,
            //center: {lat: Number(latt), lng: Number(longg)},
            //radius: Number(radiusvalue),
            radius:100,
            cursor:'not-allowed',
            editable: true
        });
        permCircle.bindTo('center', marker, 'position');


        google.maps.event.addListener(permCircle, 'radius_changed', function() {
            console.log(permCircle.getRadius());
            document.getElementById("radius").value=Math.round(permCircle.getRadius());

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

            // Set the position of the marker using the place ID and location.
            marker.setPosition(place.geometry.location);
            //marker.setVisible(true);

            console.log(marker.getPosition());
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
    //google.maps.event.addDomListener(window, 'load', initMap);
    initMap();
</script>













