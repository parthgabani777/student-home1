<?php
    require_once("./database/db_connect.php");

    $sql = "select password from user_data where uname='".$username."'";
    $query = mysqli_query($conn,$sql);

    if(mysqli_num_rows($query)>0){
        $result=mysqli_fetch_assoc($query);
        if($result["password"]==$password){
            session_start();
            $_SESSION["username"]=$username;
            header("Location: home.php");
        }
        else{
            $output = "*Password does not match";
        }
    }
    else{
        $output="*Invalid Username";
    }

    mysqli_close($conn);
?>
