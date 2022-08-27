<!DOCTYPE html>
<html>
<head>
<title>Drone Flight Simulator!</title>
</head>
<body onload='getLocation()'>
    <p>Click the button to get your coordinates.</p>
    <p id="demo" class="small"></p>

<script>
    var x = document.getElementById("demo");

    function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.watchPosition(showPosition);
        navigator.geolocation.watchPosition(sendPosition);
    } else { 
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
    }

    function showPosition(position) {
    x.innerHTML = "Latitude: " + position.coords.latitude + 
    "<br>Longitude: " + position.coords.longitude;
    var latitude= position.coords.latitude;
    }


    function sendPosition(position)
    {
        document.getElementById("lat").placeholder = position.coords.latitude;
        document.getElementById("long").placeholder = position.coords.longitude;
        document.getElementById("lat").value = position.coords.latitude;
        document.getElementById("long").value = position.coords.longitude;
    }

</script>

<form action="fly-process.php" method="post" id="form" name="form_name">
    <input id="lat" name="lat" value="" placeholder="">
    <input id="long" name="long" value="" placeholder="">
    <input type="submit" value="submit"> Upload
</form>







<p id="msg">
<?php
session_start();
if(is_null($_SESSION['log']))
{
 $_SESSION['log']= "";
}
echo $_SESSION['log'];
echo 'asf';

?>
</p>



<script type="text/javascript">
var seconds = 10;    
    var isPulse=true;
    
    function heartbeat(){
        if(isPulse){
            var hb = setTimeout(heartbeat, seconds*1000); 
            document.querySelector("input[type='submit']").click();
        }
    }

    //function call is here
    var hb = setTimeout(heartbeat, seconds*1000); //beat every n minutes
</script>



</body>
</html>