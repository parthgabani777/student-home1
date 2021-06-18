<?php
    
    // if(!isset($_SESSION["user"])){
    //     header("Location:./home.php");
    // }
    // if(isset($_GET['logout'])){
        
    // }
    session_start();
    session_destroy();
    header("Location:./home.php");
?>

