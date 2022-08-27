        <title>
                <?php echo $webpagetitle;?>

        </title>
        
        <script src="admin/js/admin.js"></script>

    </head>


    <body class="bg-light text-dark">
        <header>
            <nav class="navbar navbar-expand-md bg-dark navbar-dark">

                <div style="float:left;">

                    <!-- Brand Logo -->
                    <a class="navbar-brand" href="">
                        <img src="images/logo2.gif" alt="RPAMS" style="width:70px;">
                    </a>

                    <!-- Brand Title -->
                    <a class="navbar-brand" href="">RPAMS</a>

                </div>


                <!-- Button for Collapsing The Navigation Bar-->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>


                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                    <!-- Links -->
                    <ul class="navbar-nav mr-auto">
                        <li><a href="admin/adminpanel.php" class="nav-link">Home</a></li>
                        <li><a href="admin/adminpanel.php" class="nav-link">Profile</a></li>
                        <li><a href="admin/manage-nfz.php" class="nav-link">No Fly Zones</a></li>
                        <li><a href="admin/admin_notice.php" class="nav-link">Notice</a></li>
                        <li><a href="admin/tracker.php" class="nav-link">Tracker</a></li> 
                        <li><a href="admin/applications.php" class="nav-link">Applications</a></li>
                    </ul>


                    <div>

                        <form action="process/logout-process.php" method="post" class="form-inline my-2 my-lg-1">
                            <button type="submit" name="logout-submit"  class="btn btn-danger mb-2 mr-sm-2">Logout</button>
                        </form>

                    </div>
                </div>
            </nav>
        </header>