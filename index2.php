<?php 
require_once('header.php');

if(isset($_SESSION['users_id'])){

    echo "<a class='text-decoration-none' href='logout.php?logout'>Logout</a>";
    echo "<p><a class='text-decoration-none' href='profile'>update profile</a></p>";

}else {
    header('location:login');
}


?>
<body>


</body>
