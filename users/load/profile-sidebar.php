        <!--<div class="float-sm-left col-sm-3 border border-primary mt-2 p-2">-->
        <div class="float-sm-left col-sm-3 mt-2 p-2">
            <div class="card" style="width:auto">
                <img class="card-img-top" src="images/<?php echo "$session_gender";?>.png" alt="Card image" style="width:100%">
                <div class="card-body">
                    <h4 class="card-title"><?php echo "$session_full_name";?></h4>
                    <p><?php echo "$session_email";?></p>
                    <span class="glyphicon glyphicon-calendar"></span>
                    <p class="card-text"><?php echo "$session_He";?> has <strong><?php echo "$session_training_status";?></strong> <?php echo "$session_his";?> drone pilot training.</p>
                    <p> <?php echo "$session_He";?> is from <?php echo"$session_nationality"; ?>.</p>
                    <a id="profile_view_btn" href="users/profile-view.php" class="btn btn-primary btn-sm">View Details</a>
                </div>
            </div>
        </div>