<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once('header.php');
if(isset($_POST['password-reset-token']) && $_POST['email'])
{



  include "config.php";
     
    $emailId = mysqli_real_escape_string($dsn,$_POST['email']);
    //$password = mysqli_real_escape_string($dsn, md5($_POST['password']));
 
    $result = mysqli_query($dsn,"SELECT * FROM users WHERE email='" . $emailId . "'");
 
    $row= mysqli_fetch_array($result);

 
  if($row)
  {
     
     $token = md5($emailId).rand(10,9999);
 
     $expFormat = mktime(
     date("H"), date("i"), date("s"), date("m") ,date("d")+1, date("Y")
     );
 
    $expDate = date("Y-m-d H:i:s",$expFormat);
 
    $update = mysqli_query($dsn,"UPDATE users set  password='" . $password . "', reset_link_token='" . $token . "' ,exp_date='" . $expDate . "' WHERE email='" . $emailId . "'");
 
    $link = "<a href='localhost/quickrent2/reset-password?key=".$emailId."&token=".$token."'>Click To Reset password</a>";
 
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
    // sets GMAIL as the SMTP server
    $mail->Host = "smtp.gmail.com";
    // set the SMTP port for the GMAIL server
    $mail->Port = "587";
    $mail->From='ebubeofforjoe@gmail.com';
    $mail->FromName='Quickrent2';
    $mail->AddAddress($emailId);
    $mail->Subject  =  'Reset Password';
    $mail->IsHTML(true);
    $mail->Body    = 'Click On This Link to Reset Password '.$link.'';
    if($mail->Send())
    {
      echo "<script>alert('Check Your Email and Click on the link sent to your email');</script>";
      echo "<script>window.location = 'forgotpassword.php' </script>";
    }
    else
    {
      echo "Mail Error - >".$mail->ErrorInfo;
    }
}else{
  
  echo "<script>alert('Invalid Email Address. Go back');</script>";
  echo "<script>window.location = 'forgotpassword.php' </script>";

}
}
?>