<?php require_once("header.php");


?>
<body>
<video autoplay muted loop id="vbg">
<source src="img/walking.mp4" type="video/mp4">
</video>
<div class="container">
<video autoplay muted loop id="vbg">
<source src="img/keyboard.mp4" type="video/mp4">
</video>
            <div class="row">
                <div class="col-lg-6 m-auto">
                    <div class="card mt-5">
                        <div class="card-title mt-5 text-center text-dark">
                        <h3 class="py-3 "><b>Forgot Password</b></h3>
                            <h3 class="py-3 "><img src="img/logo.png"></h3>
                             <!--<h3 class="py-3 "><b>Forgot Password</b></h3>-->
                            
                        </div>
                        <div class="card-body">
                            <form  action="password-reset-token.php" method="post">
                                <input type="text" name="email" placeholder="Enter your Email" class="form-control mb-3"required>
                                <div class="text-center mt-3"><button class="btn btn-primary mb-3 w-100" name="password-reset-token">submit</button></div>
                                </form>
                                <div class="copyright-footer text-center mt-3"><a class="text-decoration-none text-dark" href="index">@ <?php echo date('Y');?> Copyright <b>Quickrent.com</b></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>