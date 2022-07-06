<?php 

require_once('header.php');


if(isset($_POST["login"])){


    $username = mysqli_real_escape_string($dsn,$_POST['username']);
    $password = mysqli_real_escape_string($dsn, md5($_POST['password']));

    if(empty($username) || empty($password)){
        echo "<script>alert('Please fill in the blank spaces');</script>";
        echo "<script>window.location = 'login' </script>"; 

    }   else{
        $select = mysqli_query($dsn, "SELECT * FROM users WHERE username= '".$username."' and password= '".$password."'") or die("query failed");
  
        if(mysqli_num_rows($select) > 0){
            $row= mysqli_fetch_assoc($select);
            $_SESSION['users_id'] = $row['id'];
            header('location:index.php');
        }

        else{
            echo "<script>alert('Incorrect Email or Password');</script>";
            echo "<script>window.location = 'login' </script>"; 
        }
    }
} 



?>
