<?php
    $webpagetitle = 'Sign In: RPA Management System';
    require "common/common-header.php";
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
    <script>loginbtn.style.display="none";</script>
    
    <div class="container col-md-6 col-lg-4">

        <h2 class="mt-3">Sign In</h2>
        <p>Enter your credentials to log in.<?p>

        <form action="process/login-process.php" method="post">

            <div class="form-group">

                <input type="text" name="email" placeholder="E-mail" value="user@rpams.com"  required class="form-control">

            </div>

            <div class="form-group">

                <input type="password" id="pwd" name="password" placeholder="Password" value="123" required class="form-control">
                <p id="capson" class="text-danger" style="display:none"><i>Caps Lock is ON!</i></p>
                <script>
                    var input = document.getElementById("pwd");
                    var text = document.getElementById("capson");
                    input.addEventListener("keyup", function(event)
                    {
                        if (event.getModifierState("CapsLock")) {
                            capson.style.display = "block";
                        } else {
                            capson.style.display = "none"
                        }
                    });
                </script>

            </div>
                        

            <div class="custom-control custom-checkbox mb-3">
    
                <input type="checkbox" class="custom-control-input" id="customCheck" required>
                <label class="custom-control-label text-danger" for="customCheck"><i>I promise to logout before I close my browser!</i></label>
    
            </div>
            
            <button type="submit" name="login-submit" class="btn btn-primary">Log In</button>
        </form>
        <?php
        require "process/login-error.php";
        ?>
    </div>




</mian>

<?php
    require "footer.php";
?>