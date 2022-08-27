<form  action="#" method="post">

<!-- Training Status -->
    <div class="form-group row">
        <label class="col-sm-3 col-form-label">RPA Pilot Training</label>
        <div class="col-sm-9">
            <select name="training_status" required class="form-control" placeholder="Choose...">
                <option selected value="<?php echo"$session_training_status";?>"> <?php echo"$session_training_status";?> </option>
                <option>Completed</option>                    
                <option>Not Completed</option>
            </select>
        </div>
    </div>

<!-- Certificate Upload -->
    <div class="form-group row">
        <label class="col-sm-3 col-form-label"></label>
        <div class="col-sm-9 text-warning">
            Please upload your certificate if you have completed the training.
        </div>
    </div>


        <div class="form-group row">
            <label class="col-sm-3 col-form-label">Certificate</label>

            <div class="col-sm-9">
                <div class="form-group row">
                    <div class="col-sm-6 mb-2">
                        <input type="text" name="training_certificate_number" value="<?php echo"$session_training_certificate_number";?>" class="form-control" placeholder="Certificate Number">
                    </div>
                    <div class="col-sm-6 ml-3 ml-sm-0 custom-file">
                        <input type="file" name="training_certificate" value="" class="custom-file-input" id="customFile" name="filename">
                        <label class="custom-file-label mr-3 ml-xs-3" for="customFile">Choose file</label>
                    </div>
                </div>
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


</form>