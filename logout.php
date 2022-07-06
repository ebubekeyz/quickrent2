<?php 

require_once("header.php");

if(isset($_GET['logout'])){
    session_destroy();
    header('location:index.php');
}

?>