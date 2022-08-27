<?php
    $rootfolder = $_SERVER['DOCUMENT_ROOT'].'/rpams';
    $webpagetitle="Takeoff: RPA Management System";
    if(!isset($_SESSION)){
        session_start();
    }

    // Check if the user is logged in, if not then redirect to signin page.
    if(is_null($_SESSION["loggedin"]))
    {
      header("location: ../login.php?loginerror=NotLoggedIn");
      exit();
    }
    else
    {
      require "users/session-details.php";
    }

?>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="Web Portal of Remotely Piloted Aircraft Mangement System.">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <base href="/rpams/" >
        <!--<link rel="shortcut icon" href="<?php //if(isset($roots))echo $roots; ?>images/favicon.ico">-->
        <link rel="shortcut icon" href="images/favicon.ico">
        <?php /* here $roots helps to jump back a folder like ../../ */ ?>
        
        <!--JQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <!-- End of Bootstrap -->

        <script src="https://kit.fontawesome.com/f1126962c3.js" crossorigin="anonymous"></script>
        
        <link rel="stylesheet" href="css/custom.css">
        <script src="js/common.js"></script>


      <title>
         <?php echo"$webpagetitle";?>;
      </title>

      <script src="users/js/user.js"></script>

      <style>
         body{
            background: rgb(238,174,202);
            background: radial-gradient(circle, rgba(238,174,202,1) 0%, rgba(148,187,233,1) 100%);
            font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
            font-size: 1rem;
            font-weight: 400;
         }

         .hide{
            display:none;
         }
         .loader {
            border: 5px solid #fff;
            border-top-color: transparent;
            border-bottom-color: transparent;
            border-radius: 50%;
            width: 100px;
            height: 100px;
            animation: spin 1s linear infinite;
            color:#fff;
            position:absolute;
            transition:all ease-out 1s;
         }

         @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
         }


         #takeoff{
            height: 97vh;
            background-color: #1fc8db!important;
            background-image: linear-gradient(200deg, rgba(137,41,168,1) 0%, rgba(0,11,37,1) 100%)!important;
            opacity: 0.95;

            width: 350px;
            box-shadow: 0 0 25px 0px rgba(137,41,168,1);

            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;

            box-sizing: border-box;
            margin:8 50%;
            position:relative;
            transform: translate(-50%, 0);
         }

         .notice{
            border: 2px solid #fff;
            border-right:0;
            border-left:0;
            color: #fff;
            border-radius: 5px;
            width:95%;
            padding:20px;
            padding-top:0;

            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: center;

            box-sizing: border-box;
            transition: all ease 1s;
            animation: scaleup 1s;

         }

         @keyframes scaleup{
            0%{transform: scale(0)}
            100%{transform: scale(1)}
         }

         .topnotice{
            border: 2px solid #fff;
            border-right:0;
            border-left:0;
            color: #fff;
            width: 85%;
            border-radius: 5px;
            margin:0;
            padding:15px;
            position:absolute;
            top: 15px;

            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;

            transition: all ease-in-out 1s;
            animation: scaleup 1s;
         }

         #bottom_btn{
            position:absolute;
            bottom: 15px;
         }

         .choice{
            border: 2px solid #fff;
            color: #fff;
            border-radius: 5px;
            width:100%;
            text-align:center;
            position: relative;
            padding:5px;
            margin: 5px 0;

            display:flex;
            flex-direction: column;
            justify-content: center;

            box-sizing: border-box;

         }

         .noticetext{
            font-style: italic;
            color:#fff;
            font-size: 12px;
            position:absolute;
         }
         .progress{
            font-style: italic;
            color:#fff;
            font-size: 12px;
            text-align:center;
            position:relative;
            animation: width 1.9s infinite;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
         }
         .progress1{
            font-style: italic;
            color:#fff;
            font-size: 12px;
            text-align:center;
            position:relative;
            animation: width 1.9s;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
         }

         @keyframes width{
            0%{width:0%;}
            100%{width:70%}
         }
         .hide{
            display:none!important;
         }
         .show{
            display:inline!important;
         }


         .btn{
            display: inline-block;
            width: 200px;
            height: 50px;
            border: 2px solid #fff;
            color: #fff;
            background-color: transparent;
            text-transform:uppercase;
            font-size: 16px;
            font-weight: lighter;
            text-align: center;
            border-radius: 40px;
            outline: none!important;
            transition: all ease-in-out 1s;
            box-sizing: border-box;
            animation: opencenter 1s;

         }
         @keyframes opencenter{
            0%{font-size:0;width: 50px;}
            100%{font-size:16px;width: 200px;}
         }

         .btn.loading{
            animation: rotate 1.4s ease 0.5s infinite;
         }

         .btn.active{
            font-size: 0;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            border-left-color: transparent;
            animation: rotate 1.4s ease 0.5s infinite;
         }

         @keyframes rotate{
            0%{
               transform: rotate(360deg);
            }
         }
         
      </style>
   </head>

   <body>
      <div>
         <div id="takeoff">
            <div id="top" class=""></div>

            <div id="loader" class="loader"></div>
            <div id="middle" class="noticetext">Loading Contents</div>
            <button id="mid_btn" class="hide" name=""></button><br/>
            <div id="progress" class="progress hide"></div>
            <div id="progress1" class="progress hide"></div>

            <div id="bottom" class=""></div>
            <button id="bottom_btn" class="hide"></button>

         </div>
      </div>
      <script>
         var drone_id;
         var latitude;
         var longitude;

         $("#middle").delay(500);

         $(document).ready(function(){

            $("#middle").queue(function(){
               takeoff('query');
               $("#middle").dequeue();
            });
            

            $(document).on('click','.choice',function(){

               $("#top").html($(this).clone());
               drone_id=$(this).attr("id");
               $("#top").addClass("topnotice show").prop("disabled",true);
               $("#middle").addClass("hide");
               $("#mid_btn").attr("class","show btn").prop("disabled",false).text("Get Approval");
               $("#bottom_btn").attr({"class":"show btn",'name':'back'}).prop("disabled",false).text("Go Back");

            });

            //mdi btn click
            $(document).on('click','#mid_btn',function(){
               $("#mid_btn").addClass("active");
               //Get Approval
               if($("#mid_btn").text()=="Get Approval")
               {
                  $("#mid_btn").prop('disabled', true);
                  $("#bottom_btn").prop('disabled', true).text("Please Wait");
                  $(".choice").prop('disabled', true);
                  
                  $('#progress').text('Getting your location...').attr('class','progress');
                  setTimeout(function(){getLocation();},2000);

               }
               //Takeoff
               if($("#mid_btn").attr('name')=="takeoff")
               {
                  $("#mid_btn").prop('disabled', true);
                  $("#bottom_btn").prop('disabled', false).attr({'name':'land'}).text("Land");
                  $(".choice").prop('disabled', true);
                  $('#progress').text('Monitoring your flight...').attr('class','progress');

                  watchPosition();

               }
            });

            //butotm btn click
            $(document).on('click','#bottom_btn',function(){
               if($("#bottom_btn").attr('name')=='back')
               {
                  $("#mid_btn").attr("class","hide").text('');
                  $("#middle").removeClass("hide");
                  $("#top").attr("class","hide").text('');
                  $("#bottom_btn").attr("class","hide").text('');
                  $('#progress').attr("class","hide").text('');
                  $(".choice").prop('disabled', false);
               }

               if($('#bottom_btn').attr('name')=='land')
               {
                  $('#progress').text('');
                  $("#mid_btn").prop('disabled', false).attr({"class":"btn show",'name':'takeoff'}).html('<img src="images/free/rocket.svg" width="25px" style="vertical-align:middle"> &nbsp; Takeoff');
                  $("#bottom_btn").prop('disabled', false).attr({'name':'back'}).text("Go Back");
                  $('#progress1').attr("class","hide").text('');
               }

            });


         });



         function query(data)
         {
            $('#loader').addClass('hide');                     
            $("#middle").html(data.notice_content);
            $("#middle").attr("class",'notice');
         }

         var flight_no;
         function getapproval(data)
         {
            if(data.status==1)
            {
               $('#progress').text('Premission Granted');
               $("#mid_btn").prop('disabled', false).attr({"class":"btn show",'name':'takeoff'}).html('<img src="images/free/rocket.svg" width="25px" style="vertical-align:middle"> &nbsp; Takeoff');
               $("#bottom_btn").prop('disabled', false).text("Go Back");
               flight_no = data.flight_no;
               console.log(data.flight_no);
            }
            else
            {
               $('#progress').text("You Don't have permision to takeoff!");
               $("#mid_btn").attr("class","hide").text('');
               $("#bottom_btn").prop('disabled', false).text("Go Back");
            }
         }


         function getLocation() {
            if (navigator.geolocation) {
               navigator.geolocation.getCurrentPosition(approveLocation,getLocationError);
            } else { 
               console.log("Geolocation is not supported by this browser.");
               $('#progress').text('Geolocation is not supported by this browser.')
               $("#bottom_btn").prop('disabled', false).text("Go Back");
               $(".choice").prop('disabled', false);
            }
         }
         


         function approveLocation(position){
            
            latitude = position.coords.latitude.toFixed(7);
            longitude = position.coords.longitude.toFixed(7);

            if(latitude !='' && longitude != '')
            {
               $('#progress').text('Location recieved with success').delay(2000).queue(function(){
                  $('#progress').text('Sending your location...');
                  takeoff('getapproval');
                  $('#progress').dequeue();
               });
            }
         }

         function watchPosition(){
            if (navigator.geolocation) {
               navigator.geolocation.getCurrentPosition(activeLocation,getLocationError);
            } else { 
               console.log("Geolocation is not supported by this browser.");
            }
         }

         setInterval(function() {
           if($('#bottom_btn').attr('name')=='land')
           {
              watchPosition();console.log('sent');
           }
         }, 15000);

         function activeLocation(position){
            
            latitude = position.coords.latitude.toFixed(7);
            longitude = position.coords.longitude.toFixed(7);

            if(latitude !='' && longitude != '')
            {
               $('#progress1').attr('class','progress1').text('Current Location: '+latitude+', '+longitude);
               takeoff('tookoff');
            }
         }


         //gps errors
         function getLocationError(error){
            switch(error.code) {
               case error.PERMISSION_DENIED:
                  $('#progress').text('You denied the request for Geolocation.')
                  $("#bottom_btn").prop('disabled', false).text("Go Back");
                  $(".choice").prop('disabled', false)
                  $("#mid_btn").attr("class","hide").text('');
                  break;
               case error.POSITION_UNAVAILABLE:
                 
                  $('#progress').text('Location information is unavailable.')
                  $("#bottom_btn").prop('disabled', false).text("Go Back");
                  $(".choice").prop('disabled', false)
                  $("#mid_btn").attr("class","hide").text('');
                  break;
               case error.TIMEOUT:
                  $('#progress').text('The request to get your location timed out.')
                  $("#bottom_btn").prop('disabled', false).text("Go Back");
                  $(".choice").prop('disabled', false)
                  $("#mid_btn").attr("class","hide").text('');
                  break;
               case error.UNKNOWN_ERROR:
                  $('#progress').text('An unknown error occurred.')
                  $("#bottom_btn").prop('disabled', false).text("Go Back");
                  $(".choice").prop('disabled', false)
                  $("#mid_btn").attr("class","hide").text('');
                  break;
            }
         }

         function takeoff(input){
            $.ajax({
               url: "process/takeoff_process.php",
               method: "POST",
               data:{action:input,id:drone_id,latitude:latitude,longitude:longitude,flight_no:flight_no},
               dataType:"json",
               success:function(data)
               {
                  if(input=='query')
                  {
                     query(data);
                  }
                  if(input=='getapproval')
                  {
                     getapproval(data);
                  }
               }
            });
         };
      </script>
   </body>
</html>