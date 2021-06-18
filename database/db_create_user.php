<?php
    $output= "";
    if(isset($_GET["submit"])){
        if(isset($_GET["username"]) && isset($_GET["name"]) && isset($_GET["email"])
        && isset($_GET["dob"]) && isset($_GET["password"])){
            $username=$_GET["username"];
            $name=$_GET["name"];
            $email=$_GET["email"];
            $dob=$_GET["dob"];
            $password=$_GET["password"];
            $cpassword=$_GET["cpassword"];
            if($password!=$cpassword){
                $output="*Password does not match";
            }
            else{
                require_once("./database/db_connect.php");

                $sql = "select uname from user_data where uname='".$username."'";
                $result = mysqli_query($conn,$sql);
                if(mysqli_num_rows($result)>0)
                {
                    $output = "*Username already taken";
                    //echo $output;
                }
                else
                {
                    $sql = "insert into user_data values('".$username."','".$name."','".$email."','".$dob."','".$password."');";
                    $result = mysqli_query($conn,$sql);
                    if($result){
                        //$output= "User created";
                        header("Location: login.php");
                    }
                    else{
                        $output = "db error";
                    }
                }
            }
        }
    }
?>
