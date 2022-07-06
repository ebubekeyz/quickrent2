<?php
if(isset($_POST['password']) && $_POST['reset_link_token'] && $_POST['email'])
{
require_once("header.php");



$emailId = mysqli_real_escape_string($dsn, $_POST['email']);
$token = $_POST['reset_link_token'];
$password = mysqli_real_escape_string($dsn, md5($_POST['password']));
//$password = password_hash($registerpassword, PASSWORD_BCRYPT, array("cost" => 12));


$query = mysqli_query($dsn,"SELECT * FROM `users` WHERE `reset_link_token`='".$token."' and `email`='".$emailId."'");
$row = mysqli_num_rows($query);
if($row){
mysqli_query($dsn,"UPDATE users set  password='" . $password . "', reset_link_token='" . NULL . "' ,exp_date='" . NULL . "' WHERE email='" . $emailId . "'");
echo "<script>alert('Congratulations! Your password has been updated successfully.');</script>";
echo "<script>window.location = 'login.php' </script>";
}else{
echo "<script>alert('Something goes wrong. Please try again');</script>";

}
}
?>


