<?php
    $webpagetitle="Sign Up: RPA Management System";
    include "common/common-header.php";
    require "header.php";
    
    if(isset($_SESSION['user_id']))
    {
        header("Location: index.php");
        exit();
    }

    if(isset($_GET['email']))
    {
        $email=$_GET['email'];
    }
    else
    {
        $email="";
    }
?>

<main>
    <!-- Hiding log in button on this page -->
    <script>signupbtn.style.display="none";</script>

    <div class="container col-md-6 col-lg-4">

        <h2 class="mt-3">Sign Up</h2>
        <p>Please fill this form to create an account.<?p>

        <form action="process/signup-process.php" method="post">

            <div class="form-group">

                <input type="text" name="email" autofocus placeholder="E-mail" value="<?php echo $email; ?>" required class="form-control">

            </div>

            <div class="form-group">

                <input type="password" name="password1" placeholder="Password" required class="form-control">

            </div>
            
            <div class="form-group">

                <input type="password" name="password2" placeholder="Re-enter password" required class="form-control">

            </div>
            

            <div class="custom-control custom-checkbox mb-3">
    
                <input type="checkbox" class="custom-control-input" id="customCheck" required>
                <label class="custom-control-label" for="customCheck">I accept the <a href="#">Terms of Use</a> &amp; <a href="#">Privacy Policy</a></label>
    
            </div>
            
            <button type="submit" name="signup-submit" class="btn btn-primary">Sign Up</button>
        </form>
        <?php
        require "process/signup-error-success.php";
        ?>
    </div>

</mian>

<?php
    require "footer.php";
?>