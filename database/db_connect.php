<?php
    $servername = "localhost:3306";
    $dbusername = "root";
    $dbpassword = "";
    $database="main2";

    $conn = mysqli_connect($servername,$dbusername,$dbpassword,$database) or die(mysqli_error());

    $db = mysqli_select_db($conn,$database) or die(mysqli_error($conn));

?>
