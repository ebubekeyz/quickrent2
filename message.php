<?php 
require_once("header.php");
require_once('insertmessages.php');
require_once('messagemail.php');


require_once("update.php");
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




<body style="background:#ccc;" >





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
            <div class="row ">
                <div class="col-lg-6 m-auto">
                    <div class="card mt-5 mb-1">
                        <div class="card-title mt-5 text-center text-dark">
                          <h3 class="">Send Message</h3>

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
                        <form  action="" method="post" enctype="multipart/form-data">
                            
                        <input type="text" name="username" value="<?php echo $fetch['username'];?>" class="form-control mb-3"required >
                        <input type="text" name="email" value="<?php echo $fetch['email'];?>" class="form-control mb-3"required>
                        <input type="text" name="to" placeholder="Email Address To:" class="form-control mb-3"required>
                        <input type="text" name="subject" placeholder="Enter Subject" class="form-control mb-3"required>
                        <textarea name="comment" placeholder="Enter Comment" id="comment" class="form-control mb-3" rows="5"required></textarea>
                        <input type="file" placeholder="choose file" name="image[]" id="my-file" value="Upload Image" multiple accept=".docx, .pdf, .doc, .png, .jpg, .jpeg, .gif" class="border border-0 form-control mb-3" required>
                        <!--<button type="button" class="btn btn-primary" onclick="document.getElementById('my-file').click()">Choose file</button>-->
                        <div class="text-center mt-3"><button class="btn btn-primary mb-3 w-100" name="post">Send Message</button></div>
                                
                             
                      </form>
                            <div class="copyright-footer text-center mt-3"><a class="text-decoration-none text-dark" href="index">@ <?php echo date('Y');?> Copyright <b>Quickrent.com</b></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</body>