<?php
    session_start();
?>
        <title><?php echo "$webpagetitle";?></title>
    </head> 



    <body class="bg-light text-dark">
        <header>
            <nav class="navbar navbar-expand-md bg-dark navbar-dark">
                <div style="float:left;">
                    <!-- Brand Logo -->
                    <a class="navbar-brand" href=".">
                        <img src="images/logo2.gif" alt="RPAMS" style="width:70px;">
                    </a>

                    <!-- Brand Title -->
                    <a class="navbar-brand" href=".">RPAMS</a>
                </div>

                <!-- Button after Collapsing The Navigation Bar-->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>


                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                    <!-- Links -->
                    <ul class="navbar-nav mr-auto">
                        <li><a href="/rpams" class="nav-link">Home</a></li>
                        <li><a href="#" class="nav-link">Protfolio</a></li>
                        <li><a href="#" class="nav-link">About us</a></li> 
                        <li><a href="#" class="nav-link">Contact</a></li>
                    </ul>


                    <div>
                        <?php
                            if(isset($_SESSION['user_id']))
                            {
                                echo'
                                <div class="btn-group mt-1">
                                    <form action="users/dashboard.php" method="get" class="">
                                        <button class="btn btn-primary mr-2">Dashboard</button>
                                    </form>
                                </div>
                                <div class="btn-group mt-1 mr-2">
                                    <form action="process/logout-process.php" method="post" class="">
                                        <button type="submit" name="logout-submit"  class="btn btn-danger">Logout</button>
                                    </form>
                                </div>';
                            }
                            else
                            {
                                echo
                                '<div class="container float-left mt-1">

                                    <a href="login.php" class="btn btn-primary mr-2" id="loginbtn" role="button">Log In</a>
                                    <a href="signup.php" class="btn btn-light" id="signupbtn" role="button">Sign Up</a>

                                </div>';                                
                            }
                        ?>

                    </div>
                </div>
            </nav>
        </header>
