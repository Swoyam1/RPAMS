<form  action="#" method="post">

<!-- Address -->
    <div class="form-group row">
    <label class="col-sm-3 col-form-label">Home Address</label>

<!-- Area -->
    <div class="col-sm-9 mb-1">
        <input type="text" name="area" value="<?php echo"$session_area";?>" required class="form-control" placeholder="Area">
    </div>

<!-- City -->  
    <label class="col-sm-3 col-form-label"></label>
    <div class="col-sm-9  mb-1">
        <input type="text" name="city" value="<?php echo"$session_city";?>" required class="form-control" placeholder="City or Town">
    </div>

<!-- State -->
    <label class="col-sm-3 col-form-label"></label>
    <div class="col-sm-9  mb-1">
        <input type="text" name="state" value="<?php echo"$session_state";?>" required class="form-control" placeholder="State or Region">
    </div>

<!-- Country -->
    <label class="col-sm-3 col-form-label"></label>
    <div class="col-sm-9 mb-1">
        <select type="text" name="country" value="<?php echo"$session_country";?>" required class="form-control" name="country" placeholder="Country">
        <option selected value="">Select Country</option>
            <option selected value="<?php echo"$session_country";?>"> <?php echo"$session_country";?> </option>
            <?php require "../common/country-list.php"; ?>
        </select>
    </div>

<!-- PIN Code -->
    <label class="col-sm-3 col-form-label"></label>
    <div class="col-sm-9 mb-1">
        <input type="text" name="pin_code" value="<?php echo"$session_pin_code";?>" class="form-control" placeholder="PIN Code">
    </div>
</div>

</form>