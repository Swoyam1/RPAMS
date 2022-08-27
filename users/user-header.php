        <title>
            <?php echo"$webpagetitle";?>;
        </title>

        <script src="users/js/user.js"></script>
    </head>


    <body class="bg-light text-dark">
        <header>
            <nav class="navbar navbar-expand-md bg-dark navbar-dark">

                <div style="float:left;">

                    <!-- Brand Logo -->
                    <a class="navbar-brand" href="#">
                        <img src="images/logo2.gif" alt="RPAMS" style="width:70px;">
                    </a>

                    <!-- Brand Title -->
                    <a class="navbar-brand" href="#">RPAMS</a>

                </div>



                <!-- Button for Collapsing The Navigation Bar-->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>


                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                    <!-- Links -->
                    <ul class="navbar-nav mr-auto">
                        <li><a href="users/dashboard.php" class="nav-link">Home</a></li>
                        <li><a href="users/profile-view.php" class="nav-link">Profile</a></li>
                        <li><a href="users/drone.php" class="nav-link">Drone</a></li>
                        <li><a href="users/apply.php" class="nav-link">Apply</a></li>
                        <li><a href="takeoff.php" class="nav-link">Takeoff</a></li> 
                        <li><a href="users/application.php" class="nav-link">Applications</a></li>
                        <li class="dropdown">
                            <a href="#" id="notify" class="dropdown-toggle nav-link" data-toggle="dropdown">
                                
                                <span id="notifications_count" class="lable lable-pill lable-danger count"></span>
                                <i class="far fa-bell"></i>
                            </a>
                            <ul id="notifications" class="dropdown-menu p-2 position-absolute" style="min-width:250px;z-index:99;"></ul>
                        </li>
                    </ul>
                    <script>notify();</script>

                    <div>
                        <form action="process/logout-process.php" method="post" class="form-inline my-2 my-lg-1">
                            <button type="submit" name="logout-submit"  class="btn btn-danger mb-2 mr-sm-2">Logout</button>
                        </form>
                    </div>
                </div>





            </nav>
        </header>