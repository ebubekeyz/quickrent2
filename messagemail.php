<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once('header.php');
if(isset($_POST['post']) && $_POST['subject'] && $_POST['comment'])
{



  include "config.php";

  $username = mysqli_real_escape_string($dsn, $_POST['username']);
  $email = mysqli_real_escape_string($dsn, $_POST['email']);
  $to = $_POST['to'];
  $subject = mysqli_real_escape_string($dsn, $_POST['subject']);
  $comment = mysqli_real_escape_string($dsn, $_POST['comment']);

  

  
  
  

    $result = mysqli_query($dsn,"SELECT * FROM messages WHERE comment_username='" . $username . "' and comment_email='" . $email . "' and comment_to='" . $to . "' and comment_subject='" . $subject . "' and comment_text='" . $comment . "'");
 
    $row= mysqli_fetch_array($result);
   

 
  if($row)
  {
     
    require_once('vendor/autoload.php');
    $mail = new PHPMailer();
 
    $mail->CharSet =  "utf-8";
    $mail->IsSMTP();
    // enable SMTP authentication
    $mail->SMTPAuth = true;                  
    // GMAIL username
    $mail->Username = "ebubeofforjoe@gmail.com";
    // GMAIL password
    $mail->Password = "ufmqnzflclazmulw";
    $mail->SMTPSecure = "tls";  

    
 
  //Attachments
  for($i=0; $i < count($_FILES['image']['name']); $i++){
    $image_tmp_name = $_FILES['image']['tmp_name'][$i];
    $image_name = $_FILES["image"]["name"][$i];
    move_uploaded_file($image_tmp_name, "img/". $image_name);
    $mail->addAttachment("img/". $image_name);

  }

 
   

    // sets GMAIL as the SMTP server
    $mail->Host = "smtp.gmail.com";
    // set the SMTP port for the GMAIL server
    $mail->Port = "587";
    $mail->From=$email;
    $mail->FromName=$username;
    $mail->AddAddress($to);
    $mail->Subject  =  $subject;
    $mail->IsHTML(true);
    $mail->Body    = $comment;
    if($mail->Send())
    {
      echo "<script>swal({
        title: 'Message Sent',
        text: '',
        icon: 'success',
        button: 'Thanks!',
      });</script>";
      //unlink($image_folder);
       }
    else
    {
      echo "Mail Error - >".$mail->ErrorInfo;
    }
}else{
  
  echo "<script>alert('Invalid Email Address. Go back');</script>";
  echo "<script>window.location = 'message.php' </script>";

}
}




?>



