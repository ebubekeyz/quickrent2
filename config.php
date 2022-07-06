<?php 
defined('BASEPATH') OR exit('No directory script access allowed');
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'quickrent2' ;
$dsn = '';

try{
$dsn=mysqli_connect($servername,$username,$password,"$dbname");
  if(!$dsn){
      die('Could not Connect MySql Server:' .mysqli_error());
    }
}
 
catch (PDOException $e){
    echo "Connection failed: " . $e->getMessage();
}

    
    
?>