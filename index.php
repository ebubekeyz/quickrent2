<?php 
require_once("header.php");
$users_id = $_SESSION['users_id'];

if(!isset($users_id)){
    header('location:login');
}


if(isset($_GET['logout'])){
    unset($users_id);
    session_destroy();
    header('location:login.php');
}
?>

<body style="background:#ccc;" id="vbg">
<video autoplay muted loop id="vbg">
<source src="img/walking.mp4" type="video/mp4">
</video>




<?php 
$select = mysqli_query($dsn, "SELECT * FROM users WHERE id='$users_id'") or die("query failed");
if(mysqli_num_rows($select) > 0){
    $fetch = mysqli_fetch_assoc($select);

    
}



?>


<div class="container">
            <div class="row">
                <div class="col-lg-6 m-auto">
                    <div class="card mt-5">
                        <div class="card-title mt-5 text-center text-dark">
                          <!-- <h3 class="py-3 "><img src="img/logo.png"></h3>-->

                           <div >
                           <?php 
                           if($fetch['image'] == ''){
                            echo '<img class="rounded-pill border border-5 w-25" src="img/avatar.png">';
                            } else {
                             echo '<img class="w-25 border border-5 rounded-pill" src="img/'.$fetch['image'].'">';
                            } 
                            ?> 
                            </div>


                     <h3 class="py-3 "><b><?php echo $fetch['username']; ?> </b> </h3>
                        </div>
                        <div class="card-body">
                            <form  action="" method="post">
                                
                                <div class="text-center "><button class="btn btn-primary mb-3 w-100" name="updateprofile"><a class="text-decoration-none text-white" href="update_profile">Update profile</a></button></div>
                                <div class="text-center mt-2"><button class="btn btn-danger mb-3 w-100" name="logout"><a class="text-decoration-none text-white" href="logout?logout">Logout</a></button></div>
                                <div class="text-center "><button class="btn btn-dark mb-3 w-100" name="login"><a class="text-decoration-none text-white" href="login">Login</a></button></div>
                            </form>
                            <div class="copyright-footer text-center mt-3"><a class="text-decoration-none text-dark" href="index">@ <?php echo date('Y');?> Copyright <b>Quickrent.com</b></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>