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
                          <h3 class="py-3 ">Account Settings</h3>

                           <div >
                           <?php 
                           if($fetch['image'] == ''){
                            echo '<img class="rounded-pill border border-5 w-25" src="img/avatar.png">';
                            } else {
                             echo '<img class="w-25 border border-5 rounded-pill" src="img/'.$fetch['image'].'">';
                            } 
                            ?> 
                            </div>


                     
                        </div>
                        <div class="card-body">
                        <form  action="update.php" method="post" enctype="multipart/form-data">
                            <div class="row">
                            <div class="col-md-6">
                        <input type="text" name="update_username" value="<?php echo $fetch['username'];?>" class="form-control mb-3" required></div>
                        <div class="col-md-6"><input type="text" name="update_email" value="<?php echo $fetch['email'];?>" class="form-control mb-3" required></div></div>
                        <input type="hidden" name="old_pass" value="<?php echo $fetch['password'];?>" placeholder="Old Password" class="form-control mb-3" >
                        <div class="row">
                        <div class="col-md-6"><input type="password" name="update_pass"  placeholder="Old Password" class="form-control mb-3" required></div>
                        <div class="col-md-6"> <input type="password" name="new_pass" placeholder="New Passsword" class="form-control mb-3" required></div></div>
                        
                        <div class="row">
                        <div class="col-md-6"><input type="password" name="confirm_pass" placeholder="Confirm New Password" class="form-control mb-3"required></div>
                        <div class="col-md-6"> 
                        <input type="file" name="update_image" value="Upload Image"  accept= "image/jpg, image/png, image/jpeg" class="form-control mb-3" required></div></div>
             


                                <div class="text-center mt-3"><button class="btn btn-primary mb-3 w-100" name="update_profile">Update</button></div>
                                <div class="text-center mt-2"><button class="btn btn-danger mb-3 w-100" name="logout"><a class="text-decoration-none text-white" href="logout?logout">Logout</a></button></div>
                            </form>
                            <div class="copyright-footer text-center mt-3"><a class="text-decoration-none text-dark" href="index">@ <?php echo date('Y');?> Copyright <b>Quickrent.com</b></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>