<?php
 
   if(!isset($_SESSION)){
      session_start();
   }

/*  $user_id=$_SESSION['user_id'];
 $drone_id='189CEB9BA20873';
    //database connection
    $root = $_SERVER['DOCUMENT_ROOT'].'/rpams';
    include_once $root."/process/dbconnect.php";


    //fetching value from the form
    $lat=$_POST['lat'];
    $long=$_POST['long'];


       $sql = "INSERT INTO drone_activity(User_ID,Drone_ID,Latitude,Longitude) VALUES ($user_id,'$drone_id',".$_POST["lat"].",".$_POST["long"].")";

       if (mysqli_query($conn, $sql)) {
          echo "<br/><br/>Location sent successfully with ";
       } else {
          //echo "Error: " . $sql . "" . mysqli_error($conn);
          echo "<h6><br/><br/>Did Not receive the coordinates! </h6>";
       }
       mysqli_close($conn);

       //header("Location: temp.php?ActivityRecorded");

       echo 'Latitude:'.$lat;
       echo ' and Longitude'.$long; */


    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']))
    {
        $root = $_SERVER['DOCUMENT_ROOT'].'/rpams';
        include_once $root."/process/dbconnect.php";
        $user_id=$_SESSION['user_id'];

        //fuction to ckect if the user location is inside the application approved radius
        function isInside($x, $y, $rad, $lat, $lng)
        { 
            $earthRadius = 6371;
            
            $x_D = deg2rad($x);
            $lat_D = deg2rad($lat);

            $diffLat = deg2rad($lat-$x);
            $diffLng = deg2rad($lng-$y);

            $a = sin($diffLat/2) * sin($diffLat/2) + cos($x_D) * cos($lat_D) * sin($diffLng/2) * sin($diffLng/2);

            $b = 2 * asin(sqrt($a));

            $dist = $earthRadius * $b * 1000; //in meters

            if($dist<=$rad)
                return true;
            else
                return false;
        };



        if($_POST['action']=='query')
        {

            $sql = "SELECT DISTINCT Drone_ID FROM flight_request WHERE Status='Approved' AND User_ID=$user_id";
            $result = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($result);
            $drone_list='';
            $notice_content='';


            $notice_content.='
                <p>Select your RPA from below to takeoff</p>
            ';
            while($row = mysqli_fetch_array($result))
            {
                $drone_id=$row['Drone_ID'];
                $sql="SELECT Name,Nickname FROM drone_details WHERE User_ID=$user_id AND Drone_ID='$drone_id'";
                $result1=mysqli_fetch_array(mysqli_query($conn,$sql));
                
                $notice_content .='<div id="'.$drone_id.'" class="choice">'.$result1['Name'].' ('.$result1['Nickname'].')</div>';
            }
            while($row = mysqli_fetch_array($result))
            {
                $drone_list .='<span>'.$row['Drone_ID'].'</span>';
            }
            $button = 'takeoff '.$count;
            $options = '';
            $data = array(
                'notice_content'=> $notice_content,
                'button'   => $button,
                'options'   => $drone_list,
                'takeoff'   => 1
            );

            echo json_encode($data);
        }


        //getapproval for flight takeoff
        elseif($_POST['action']=='getapproval')
        {
            if($_POST['latitude']!='' && $_POST['longitude'] != '')
            {
                $drone_id=$_POST['id'];
                $latitude=$_POST['latitude'];
                $longitude=$_POST['longitude'];

                $sql="SELECT Application_No,Latitude,Longitude,Radius FROM flight_request WHERE User_ID=$user_id AND Drone_ID='$drone_id' AND Status='Approved' ";
                $result=mysqli_query($conn,$sql);
                $data = array(
                    'status'=>0
                );
                while($row = mysqli_fetch_array($result))
                {
                    
                    
                    if(isInside($row['Latitude'],$row['Longitude'],$row['Radius'],$latitude,$longitude))
                    {
                        $application_no = $row['Application_No'];
                        $sql = "INSERT INTO drone_activity(User_ID, Drone_ID, Latitude, Longitude, Flight_ID) VALUES ($user_id,'$drone_id',$latitude,$longitude,$application_no)";
                        mysqli_query($conn,$sql);
                        $data = array(
                            'status'=>1,
                            'flight_no'=>$application_no
                        );
                        break;
                    }
                }
                echo json_encode($data);
            }
            else
            {
                $data = array(
                    'status'=> 0,
                    'notice_content'=> "WARNING! Location sending failed!",
                );

                echo json_encode($data);
            }
        }
        elseif($_POST['action']=='dronelist')
        {

        }
        elseif($_POST['action']=='tookoff')
        {
            if($_POST['latitude']!='' && $_POST['longitude'] != '' && $_POST['flight_no'])
            {
                $drone_id=$_POST['id'];
                $latitude=$_POST['latitude'];
                $longitude=$_POST['longitude'];
                $flight_no=$_POST['flight_no'];
                $sql = "INSERT INTO drone_activity(User_ID, Drone_ID, Latitude, Longitude, Flight_ID) VALUES ($user_id,'$drone_id',$latitude,$longitude,$flight_no)";
                mysqli_query($conn,$sql);

                $data = array(
                    'status'=> 1,
                    'notice_content'=> "Recorded",
                );

                echo json_encode($data);
            }
            else
            {
/*                 $data = array(
                    'status'=> 0,
                    'notice_content'=> "WARNING! Location sending failed!",
                );

                echo json_encode($data); */
            }
        }
        elseif($_POST['action']=='land')
        {

        }
        else
        {

        }
    }
    else
    {
    }


?>