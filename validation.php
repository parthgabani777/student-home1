<?php

    $output="";
    if(isset($_GET["submit"])){
        if(!(isset($_GET["username"]) && isset($_GET["password"]))){
            $output="Enter username and password";
        }
        else{        
            $username=$_GET["username"];
            $password=$_GET["password"];
            require_once("./database/db_user_auth.php"); 
        }
    }
?>  