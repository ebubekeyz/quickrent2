<?php require_once("header.php") ?>

<body>
<video autoplay muted loop id="vbg">
<source src="img/keyboard.mp4" type="video/mp4">
</video>
<div class="container" >
<div class="row">
<div class="col-lg-6 m-auto">
<div class="card mt-5">
<div class="card-title mt-5 text-center text-dark">
<h3 class="py-3 "><b>Reset Password</b></h3>
<h3 class="py-3 "><img src="img/logo.png"></h3>
 <!--<h3 class="py-3 "><b>Reset Password</b></h3>-->
</div>
<div class="card-body">

<?php
if($_GET['key'] && $_GET['token'])
{

$email = $_GET['key'];
$token = $_GET['token'];
$query = mysqli_query($dsn,
"SELECT * FROM `users` WHERE `reset_link_token`='".$token."' and `email`='".$email."';"
);
$curDate = date("Y-m-d H:i:s");
if (mysqli_num_rows($query) > 0) {
$row= mysqli_fetch_array($query);
if($row['exp_date'] >= $curDate){ ?>

<form action="update-forgot-password.php" method="post">
<input type="hidden" name="email" value="<?php echo $email;?>" placeholder="User Name" class="form-control mb-3"required>
<input type="hidden" name="reset_link_token" value="<?php echo $token;?>" placeholder="Reset Link Token" class="form-control mb-3"required>
<input type="password" name="password" placeholder="Password"  class="form-control mb-3"required>
<input type="password" name="cpassword" placeholder="Confirm Password"  class="form-control mb-3"required>
<div class="text-center mt-3"><button class="btn btn-primary mb-3 w-100" name="new-password">Login</button></div>
</form>

<?php } } else{
echo "<script>alert('This forget password link has been expired');</script>";
echo "<script>window.location = 'forgotpassword.php' </script>";
}
} 
?>
<div class="copyright-footer text-center mt-3"><a class="text-decoration-none text-dark" href="index">@ <?php echo date('Y');?> Copyright <b>Quickrent.com</b></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>

