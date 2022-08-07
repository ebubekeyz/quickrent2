<?php 

require_once('header.php');


if(isset($_POST['register'])){


    $username = mysqli_real_escape_string($dsn, $_POST['username']);
    $email = mysqli_real_escape_string($dsn,$_POST['email']);
    $password = mysqli_real_escape_string($dsn, md5($_POST['password']));
    $confirmpassword = mysqli_real_escape_string($dsn, md5($_POST['confirmpassword']));
    $image = $_FILES['image']['name'];
    $image_size = $_FILES['image']['size'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = "img/". $image;


    $select  = mysqli_query($dsn, "SELECT * FROM users WHERE username= '$username' AND password='password'") or die("query1 failed");
    if(mysqli_num_rows($select) == 1){
        echo "<script>alert('Username Already Exist');</script>";
        echo "<script>window.location = 'register' </script>"; 

    } else{
    if($password != $confirmpassword){
        echo "<script>alert('Password did not match');</script>";
    echo "<script>window.location = 'register.php' </script>"; 

    } elseif($image_size > 2000000){
        echo "<script>alert('Image size too large');</script>";
        echo "<script>window.location = 'register' </script>"; 
    
    } else{
        $insert = mysqli_query($dsn,"INSERT INTO users(username, email, password, image) VALUES('$username','$email','$password','$image')");
        if($insert){
            move_uploaded_file($image_tmp_name, $image_folder);
            echo "<script>swal({
                title: 'Registration successful!',
                text: 'Please click the Login button below to get started!',
                icon: 'success',
                button: 'Thanks!',
              });</script>";
             
        
        
        } else{
            echo "<script>swal({
                title: 'Registration Failed! User Already exist',
                text: 'Choose a new username or password',
                icon: 'success',
                button: 'Thanks!',
              });</script>";
             
}
            
}

}   
}






?>