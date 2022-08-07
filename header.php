<?php 
session_start();

define('BASEPATH', true);
require_once("config.php");
?>
<!DOCTYPE html5>
<html lang="en">
    <head>
    <title>Quickrent | Fastest way to find an apartment nearby for rent</title>
<link rel="icon" type="image/png" href="img/fav2.png">
        <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <script src="js/jquery-3.6.0.js"></script>
        <script src="js/sweetalert.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>

        <style>
            /*width*/
            ::-webkit-scrollbar{
                width:20px;
            }

            /*Track*/
            ::-webkit-scrollbar-track{
                background: #f1f1f1;
            }

            /*Handle hover*::after*/
            ::-webkit-scrollbar-thumb:hover{
                background: #555;
            }
        </style>
    </head>
    
</html>