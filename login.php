<?php 
require_once("header.php");

?>
<head>
<title>Login</title>
<link rel="favicon" type="image/png" href="img/fav.png">
</head>
<body style="background:#ccc;" id="vbg">
<video autoplay muted loop id="vbg">
<source src="img/walking.mp4" type="video/mp4">
</video>

<div class="container">
            <div class="row">
                <div class="col-lg-6 m-auto">
                    <div class="card mt-5">
                        <div class="card-title mt-5 text-center text-dark">
                           <h3 class="py-3 "><img src="img/logo.png"></h3>
                    <!--<h3 class="py-3 "><b>Login</b></h3>-->
                        </div>
                        <div class="card-body">
                            <form  action="process.php" method="post">
                                <input type="text" name="username" placeholder="User Name" class="form-control mb-3"required>
                                <input type="password" name="password" placeholder="Password" class="form-control mb-3"required>
                                <div class="text-center mt-3"><button class="btn btn-primary mb-3 w-100" name="login">Login</button></div>
                                <div class="text-center "><button class="btn btn-dark mb-3 w-100" name="createaccount"><a class="text-decoration-none text-white" href="register">Create an account</a></button></div>
                                <div class="text-center "><button class="btn btn-danger mb-3 w-100" name="forgotpassword"><a class="text-decoration-none text-white" href="forgotpassword">Forgot Password</a></button></div>
                            </form>
                            <div class="copyright-footer text-center mt-3"><a class="text-decoration-none text-dark" href="index">@ <?php echo date('Y');?> Copyright <b>Quickrent.com</b></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>