<form  action="#" method="post">

<!-- Full Name -->
    <div class="form-group row">
        <label class="col-sm-3 col-form-label">Full Name</label>
        <div class="col-sm-9">
            <input type="text" name="full_name" value="<?php echo"$session_full_name";?>" required class="form-control" placeholder="Full Name">
        </div>
    </div>


<!-- emial -->
    <div class="form-group row">
        <label class="col-sm-3 col-form-label">Email</label>
        <div class="col-sm-9">
            <input type="email" name="email" readonly class="form-control-plaintext" value="<?php echo"$session_email";?>">
        </div>
    </div>

<!-- Phone Number -->
    <div class="form-group row">
        <label class="col-sm-3 col-form-label">Phone Number</label>
        <div class="col-sm-9">
        <input type="tel" name="phone_number" value="<?php echo"$session_phone_number";?>" required class="form-control" placeholder="Phone Number">
        </div>
    </div>

<!-- Date of Birth -->
    <div class="form-group row">
        <label class="col-sm-3 col-form-label">Date of Birth</label>
        <div class="col-sm-9">
        <input name="date_of_birth" value="<?php echo"$session_date_of_birth";?>" required class="form-control" type="date" placeholder="mm/dd/yyyy" />
        </div>
    </div>

<!-- Gender -->
    <div class="form-group row">
        <label class="col-sm-3 col-form-label">Gender</label>
        <div class="col-sm-9">
            <select name="gender" value="" required class="form-control" placeholder="Choose...">
                <option selected value="<?php echo"$session_gender";?>"> <?php echo"$session_gender";?> </option>
                <option>Male</option>
                <option>Female</option>
                <option>Other</option>
            </select>
        </div>
    </div>

<!-- Nationality -->
    <div class="form-group row">
        <label class="col-sm-3 col-form-label">Country (Nationality)</label>
        <div class="col-sm-9">
            <select type="text" name="nationality" value="<?php echo"$session_nationality";?>" required class="form-control" name="country" placeholder="Country">
                <option selected value="<?php echo"$session_nationality";?>"> <?php echo"$session_nationality";?> </option>
                <?php require "../common/country-list.php"; ?>
            </select>
        </div>
    </div>


</form>