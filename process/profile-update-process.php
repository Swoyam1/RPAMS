<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
}

if(isset($_POST['testing'])){
    $user_id=17;
    $email='test@test.com';
}else{
    $user_id=$_SESSION["user_id"];
    $email=$_SESSION['email'];
}


if(isset($_POST['profile-update-submit']))
{
    require "dbconnect.php";

    $full_name=$_POST['full_name'];
    $phone_number=$_POST['phone_number'];
    $gender=$_POST['gender'];
    $nationality=$_POST['nationality'];
    $training_status=$_POST['training_status'];
    $training_certificate_number=$_POST['training_certificate_number'];
    $training_certificate=$_POST['training_certificate'];
    $area=$_POST['area'];
    $city=$_POST['city'];
    $state=$_POST['state'];
    $country=$_POST['country'];
    $pin_code=$_POST['pin_code'];

    //Converting Date of Birth from mm/dd/yyyy to yyyy-mm-dd
    
    $date_of_birth = $_POST["date_of_birth"];

    //validation
    $phone_number = filter_var($phone_number, FILTER_SANITIZE_NUMBER_INT);
    $phone_number = str_replace("-", "", $phone_number);
    $phone_number = str_replace("+", "", $phone_number);
    $phone_number = str_replace(".", "", $phone_number);
    if (strlen($phone_number) < 10 || strlen($phone_number) > 14) {
        header("Location: ../users/profile.php?error=InvalidPhoneNumber");
        exit();
    }
    
    if((strcmp($gender, "Male") !== 0)){
        if((strcmp($gender, "Female") !== 0)){
            if((strcmp($gender, "Other") !== 0)){
                header("Location: ../users/profile.php?error=InvalidGender");
                exit();
            }
        }
    }
    
    if((strcmp($training_status, "Completed") !== 0)){
        if((strcmp($training_status, "Not Completed") !== 0)){
            header("Location: ../users/profile.php?error=InvalidTrainingStatus");
            exit();
        }
    }

    if(!preg_match('/^[1-9]{1}[0-9]{5}$/',$pin_code)){
        header("Location: ../users/profile.php?error=InvalidPinCode");
        exit();
    }

    $sql="SELECT * FROM rpa_user_details WHERE user_id=?";
    $stmt=mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt,$sql))
    {
        header("Location: ../users/profile.php?error=SQLError");
        exit();
    }
    else
    {
        mysqli_stmt_bind_param($stmt, "i", $user_id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $resultCheck=mysqli_stmt_num_rows($stmt);
        if($resultCheck==1)
        {
            $sql="UPDATE rpa_user_details SET Full_Name=?, Email=?, Phone_Number=?, Date_of_Birth=?, Gender=?, Nationality=?, Training_Status=?, Training_Certificate_Number=?, Training_Certificate=? where user_id=?";
            $stmt=mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt,$sql))
            {
                header("Location: ../signup.php?error=SQLError");
                exit();
            }
            else
            {
                mysqli_stmt_bind_param($stmt, "ssissssssi", $full_name,$email,$phone_number,$date_of_birth,$gender,$nationality,$training_status,$training_certificate_number,$training_certificate,$user_id);
                mysqli_stmt_execute($stmt);

                header("Location: ../users/profile.php?profile-update=success1&error=updated");
                exit();
            }
        }
        elseif($resultCheck==0)
        {  
            $sql="INSERT INTO rpa_user_details (User_ID,Full_Name,Email,Phone_Number,Date_of_Birth,Gender,Nationality,Training_Status,Training_Certificate_Number,Training_Certificate) VALUES (?,?,?,?,?,?,?,?,?,?)";
            $stmt=mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt,$sql))
            {
                header("Location: ../signup.php?error=SQLError");
                exit();
            }
            else
            {
                mysqli_stmt_bind_param($stmt, "ississssss", $user_id,$full_name,$email,$phone_number,$date_of_birth,$gender,$nationality,$training_status,$training_certificate_number,$training_certificate);
                mysqli_stmt_execute($stmt);
                

                //adding into address table
                $sql="INSERT INTO rpa_user_address(user_id,area,city,state,country,pin_code) VALUES (?,?,?,?,?,?)";
                $stmt=mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt,$sql))
                {
                    header("Location: ../signup.php?error=SQLError");
                    exit();
                }
                else
                {
                    mysqli_stmt_bind_param($stmt, "isssss", $user_id,$area,$city,$state,$country,$pin_code);
                    mysqli_stmt_execute($stmt);
                    

                    mysqli_stmt_close($stmt);
                    mysqli_close($conn);
                    require "session-profile-details.php";
                    header("location: ../users/dashboard.php?profileupdate=success&error=updated");
                    exit();
                }
            }
        }

    }

}
else
{
    $uri = $_SERVER['REQUEST_URI'];
    $uri_components = parse_url($uri);
    parse_str($uri_components['query'], $params);
    if(isset($params['error'])){
        $error = $params['error'];
        header("Location: ../index.php?error=$error");
    }
    exit();
}

?>