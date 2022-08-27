        <?php
            $webpagetitle="RPA Management System";
            require "common/common-header.php";
            require "header.php";
        ?>

        <div id="slider" class="carousel slide carousel-fade" style="min-height:40px;" data-ride="carousel">

            <!-- Indicators -->
            <ul class="carousel-indicators">
            <li data-target="#slider" data-slide-to="0" class="active"></li>
            <li data-target="#slider" data-slide-to="1"></li>
            <li data-target="#slider" data-slide-to="2"></li>
            </ul>

            <!-- The slideshow -->
            <div class="carousel-inner" style="max-height: 400px;">
                <div class="carousel-item active" style="max-height: 400px;">
                    <img src="https://unsplash.com/photos/fvPfMJL2wKw/download?force=true&w=640" class="sliderBluredImg" width="100%">
                    <img src="https://unsplash.com/photos/fvPfMJL2wKw/download?force=true&w=640" width="1100">
                    <div class="carousel-caption">
                        <h3>Digitalizing the way you Fly!</h3>
                        <a href="#" class="btn btn-warning btn-sm">Learn more</a>
                    </div>
                </div>
                <div class="carousel-item" style="max-height: 400px;">
                    <img src="https://unsplash.com/photos/G4Ie2mrGTjA/download?force=true&w=640" class="sliderBluredImg" width="100%">
                    <img src="https://unsplash.com/photos/G4Ie2mrGTjA/download?force=true&w=640" width="1100">
                    <div class="carousel-caption">
                        <h3>No Permission – No Take-off</h3>
                        <a href="#" class="btn btn-warning btn-sm">Learn more</a>
                    </div>
                </div>
                <div class="carousel-item" style="max-height: 400px;">
                    <img src="https://unsplash.com/photos/AwH-d-FUgwo/download?force=true&w=640" class="sliderBluredImg" width="100%">
                    <img src="https://unsplash.com/photos/AwH-d-FUgwo/download?force=true&w=640" width="1100">
                    <div class="carousel-caption">
                        <h3>Get <i>"On-The-Spot"</i> Flight Permission</h3>
                        <a href="#" class="btn btn-warning btn-sm">Learn more</a>
                    </div>
                </div>
            </div>
            
            <!-- Left and right controls -->
            <a class="carousel-control-prev" href="#slider" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#slider" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>


        <div class="container">

            <div class="mt-3 text-center">
                <h3>Remotely Piloted Aircraft Management System</h3><br/>
            </div>

            <div class="card bg-light text-dark mt-2">
                <div class="card-body">
                    
                    <h4>About</h4>
                    <p class="text-justify">
                    Remotely Piloted Aircraft (RPA) Management System is a real-time system that maintains the information of all the registered RPAs (commonly termed as Drones), like real-time GPS location of the device along with their owner details and also tracks the devices to ensure that the devices are not flying in the no-fly zones. This system allows the user to register their RPAs and get permission to fly their RPAs legally even in limited-fly zones using an interactive web interface. This system allows the registered user to view all the restricted areas near them and sends a message to the user if their device takes off inside or flies into an unauthorized area.

                    </p>
                </div>
            </div>
        </div>



        <main>
            <section>
                <a href="admin/adminpanel.php">admin</a>
            </section>

        </main>

        <?php
            require "footer.php";
        ?>