<?php 
require_once('header.php');

$users_id = $_SESSION['users_id'];

if(isset($_POST['update_profile'])){
    
    $update_username = mysqli_real_escape_string($dsn, $_POST['update_username']);
    $update_email = mysqli_real_escape_string($dsn,$_POST['update_email']);
    $old_pass = $_POST['old_pass'];
    $update_pass = mysqli_real_escape_string($dsn, md5($_POST['update_pass']));
    $new_pass = mysqli_real_escape_string($dsn, md5($_POST['new_pass']));
    $confirm_pass = mysqli_real_escape_string($dsn, md5($_POST['confirm_pass']));
    $update_image = $_FILES['update_image']['name'];
    $update_image_size = $_FILES['update_image']['size'];
    $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
    $update_image_folder = "img/". $update_image;


    mysqli_query($dsn, "UPDATE users SET username='$update_username', email=
    '$update_email' WHERE id='$users_id'") or die('query1 failed');
    
    if(!empty($update_pass) || !empty($new_pass) || !empty($confirm_pass)){
        if($update_pass!= $old_pass){
            echo "<script>alert('Old password not matched');</script>";
            echo "<script>window.location = 'update_profile.php';</script>";

        }elseif($new_pass != $confirm_pass){
            echo "<script>alert('Confirm password not matched');</script>";
            echo "<script>window.location = 'update_profile.php';</script>";

        } else{
            mysqli_query($dsn, "UPDATE users SET password='$confirm_pass' WHERE id='$users_id'") or die('query2 failed');
            echo "<script>alert('You have successfully updated your account');</script>";
            echo "<script>window.location = 'update_profile.php';</script>";
        }
    }

    if(!empty($update_image)){
        if($update_image_size > 2000000){
            echo "<script>alert('Image is too large');</script>";
            echo "<script>window.location = 'update_profile.php';</script>";
        } else{
            $image_update_query = mysqli_query($dsn, "UPDATE users SET image='$update_image' WHERE id='$users_id'") or die('query2 failed');
             if($image_update_query){
                move_uploaded_file($update_image_tmp_name, $update_image_folder);
             }
            
             echo "<script>alert('Image Updated Successfully');</script>";
             echo "<script>window.location = 'update_profile.php';</script>";
        }
    }
}

?>