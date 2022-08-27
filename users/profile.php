<?php
    $webpagetitle="Profile: RPA Management System";
    session_start();

    // Check if the user is logged in, if not then redirect to signin page.
    if(is_null($_SESSION["loggedin"]))
    {
        $uri = $_SERVER['REQUEST_URI'];
        $uri_components = parse_url($uri);
        parse_str($uri_components['query'], $params);
        $error = $params['error'];
        header("location: ../login.php?loginerror=NotLoggedIn&error=$error");
        exit();
    }
    else
    {
        require "../common/common-header.php";
        require "user-header.php";

        $session_email=$_SESSION["email"];
    }

?>


<div class="container mt-4">
    <div class="mt-2">

        <form action="javascript:history.back()" method="post" class="float-left mr-2">
            <button type="submit" class="btn btn-outline-primary btn-sm mt-1 mr-2">Go back</button>
        </form>
        <h3>
        Basic Remote Pilot Profile
        </h3>
    </div>



    <div class="mt-5">
        <form  action="../rpams/process/profile-update-process.php" method="post">

        <!-- Full Name -->
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Full Name</label>
                <div class="col-sm-10">
                    <input type="text" name="full_name" required class="form-control" placeholder="Full Name">
                </div>
            </div>


        <!-- emial -->
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" name="email" readonly class="form-control-plaintext" value="<?php echo"$session_email";?>">
                </div>
            </div>

        <!-- Phone Number -->
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Phone Number</label>
                <div class="col-sm-10">
                <input type="tel" name="phone_number" required class="form-control" placeholder="Phone Number">
                </div>
            </div>

        <!-- Date of Birth -->
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Date of Birth</label>
                <div class="col-sm-10">
                <input name="date_of_birth" required class="form-control" type="date" placeholder="mm/dd/yyyy" />
                </div>
            </div>

        <!-- Gender -->
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Gender</label>
                <div class="col-sm-10">
                    <select name="gender" required class="form-control" placeholder="Choose...">
                        <option selected value="">Select Gender</option>
                        <option>Male</option>
                        <option>Female</option>
                        <option>Other</option>
                    </select>
                </div>
            </div>

        <!-- Nationality -->
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Country (Nationality)</label>
                <div class="col-sm-10">
                    <select type="text" name="nationality" required class="form-control" name="country" placeholder="Country">
                        <option selected value="">Select Country</option>
                        <?php require "../common/country-list.php"; ?>
                    </select>
                </div>
            </div>

        <!-- Address -->
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Address</label>

            <!-- Area -->
                <div class="col-sm-10">
                    <input type="text" name="area" required class="form-control" placeholder="Area">
                </div>

            <!-- City -->  
                <label class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10 float-right">
                    <input type="text" name="city" required class="form-control" placeholder="City or Town">
                </div>

            <!-- State -->
                <label class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10 float-right">
                    <input type="text" name="state" required class="form-control" placeholder="State or Region">
                </div>

            <!-- Country -->
                <label class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                    <select type="text" name="country" required class="form-control" name="country" placeholder="Country">
                    <option selected value="">Select Country</option>
                        <?php require "../common/country-list.php"; ?>
                    </select>
                </div>

            <!-- PIN Code -->
                <label class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10 float-right">
                    <input type="text" name="pin_code" class="form-control" placeholder="PIN Code">
                </div>
            </div>




        <!-- Training Status -->
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">RPA Pilot Training</label>
                <div class="col-sm-10">
                    <select name="training_status" required class="form-control" placeholder="Choose...">
                        <option selected value="">Select Status</option>
                        <option>Completed</option>                    
                        <option>Not Completed</option>
                    </select>
                </div>
            </div>

        <!-- Certificate Upload -->
            <div class="form-group row">
                <label class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10 text-warning">
                    Please upload your certificate if you have completed the training.
                </div>
            </div>


                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Certificate</label>
                    <div class="col-sm-5 mb-2">
                        <input type="text" name="training_certificate_number" value="" class="form-control" placeholder="Certificate Number">
                    </div>
                    <div class="col-sm-5 custom-file ml-3 ml-sm-0">
                        <input type="file" name="training_certificate" value="" class="custom-file-input" id="customFile" name="filename">
                        <label class="custom-file-label mr-sm-3" for="customFile">Choose file</label>
                    </div>
                </div>


            <!-- Scrip for uploading -->
            <script>
                // Add the following code if you want the name of the file appear on select
                $(".custom-file-input").on("change", function() {
                var fileName = $(this).val().split("\\").pop();
                $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
                });
            </script>

        <!-- Update -->
            <div class="form-group row">
                <div class="col text-center">
                    <button type="submit" name="profile-update-submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>

    </div>

</div>

<?php
    require "../footer.php";
?>