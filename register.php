<?php 

require_once("header.php"); 
require_once('process2.php');

?>
<body style="background:#ccc;">
<video autoplay muted loop id="vbg">
<source src="img/walking.mp4" type="video/mp4">
</video>
<div class="container" >
            <div class="row">
                <div class="col-lg-6 m-auto">
                    <div class="card mt-5">
                        <div class="card-title mt-5 text-center text-dark">
                        <h3 class="py-3 "><b>Register</b></h3>
                            <h3 class="py-3 "><img src="img/logo.png"></h3>
                             <!--<h3 class="py-3 "><b>Register</b></h3>-->
                        </div>
                        <div class="card-body">
                            <form  action="" method="post" enctype="multipart/form-data" class="was-validated">
                                <input type="text" name="username" placeholder="User Name" id="validationTextarea" class="form-control is-invalid mb-3" required>
                                <input type="text" name="email" placeholder="Email" class="form-control mb-3" required>
                                <input type="password" name="password" placeholder="Password" class="form-control mb-3" required>
                                <input type="password" name="confirmpassword" placeholder="Confirm Password" class="form-control mb-3" required>
                                <input type="file" name="image" placeholder="Upload Image"  accept= "image/jpg, image/png, image/jpeg" class="form-control is-invalid mb-3" required>
                                <input type="checkbox" name="checkbox"  class="form-check-input is-invalid mb-0" required>&nbsp;&nbsp;&nbsp;&nbsp;<a class="text-decoration-none text-dark" href="termsandconditions.php">Agree to our Terms and Conditions</a>
                                <div class="text-center mt-3"><button class="btn btn-primary mb-3 w-100" name="register">Register</button></div>
                                <div class="text-center "><button class="btn btn-dark mb-3 w-100" name="login"><a class="text-decoration-none text-white" href="login">Login if you already have an account</a></button></div>
                                
                            </form>
                            <div class="copyright-footer text-center mt-3"><a class="text-decoration-none text-dark" href="index">@ <?php echo date('Y');?> Copyright <b>Quickrent.com</b></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</body>