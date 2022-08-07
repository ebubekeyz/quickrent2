<?php 
if(isset($_POST['subject'])){
    $dsn = mysqli_connect('localhost', 'root', '', 'quickrent2');
    $username = mysqli_real_escape_string($dsn, $_POST['username']);
    $email = mysqli_real_escape_string($dsn, $_POST['email']);
    $to = mysqli_real_escape_string($dsn, $_POST['to']);
    $subject = mysqli_real_escape_string($dsn, $_POST['subject']);
    $comment = mysqli_real_escape_string($dsn, $_POST['comment']);
    
    foreach($_FILES['image']['name'] as $key => $images){
        $filename = time(). ",".$images;
        if(!is_dir("image"))
        mkdir("image");
        $image_folder = "img/". $images;
        $move = move_uploaded_file($_FILES['image']['tmp_name'][$key], $image_folder);
        if($move){
            $insert = mysqli_query($dsn,"INSERT INTO messages(comment_username, comment_email, comment_to, comment_subject, comment_text, image) VALUES('$username','$email','$to','$subject','$comment',' $image_folder')");
           
        }

    }
   
}

?>