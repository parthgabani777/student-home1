<?php

$target_dir = "images/";
require("./database/db_connect.php");

if(!isset(session["username"])){
    header("home.php");
}

if(isset($_REQUEST["id"])){
    $id=  $_REQUEST["id"];

    $sql1 = "delete from pg_list where id=$id";
    $sql2 = "delete from rating where id=$id";
    $sql3 = "delete from pg_photo where id=$id";
    
    $conn->query($sql1);
    $conn->query($sql2);
    $conn->query($sql3);
    header("Location:home.php");
}


?>