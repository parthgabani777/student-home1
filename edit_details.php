<?php

$target_dir = "images/";
require("./database/db_connect.php");

if(!isset(session["username"])){
    header("home.php");
}

if(isset($_REQUEST["update"]))
{
    $id=$_GET['editdata'];
    if(isset($_SESSION['name']) && isset($_SESSION['address']) &&
    isset($_SESSION['pincode']) && isset($_SESSION['location']) &&
    isset($_SESSION['owner_number']) && isset($_SESSION['price']) &&
    isset($_SESSION['occupation']) && isset($_SESSION['beds']) &&
    isset($_REQUEST['wifi']) && isset($_REQUEST['tv']) &&
    isset($_REQUEST['ac']) && isset($_REQUEST['fridge']) &&
    isset($_REQUEST['microwave']) && isset($_REQUEST['lift']) &&
    isset($_REQUEST['gym']) && isset($_REQUEST['sidetable']) &&
    isset($_REQUEST['washroom']) && isset($_REQUEST['food']) &&
    isset($_REQUEST['kitchen']) && isset($_REQUEST['gender']))
    {

        $sql = "update pg_list set name=?,price=?,address=?,pincode=?,location=?,
        owner_number=?,occupancy=?,beds=?,wifi=?,tv=?,ac=?,fridge=?,microwave=?,lift=?,
        gym=?,side_table=?,washrooms=?,food=?,kitchen=?,preferred_gender=? where id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssssssssssssssssss",$_SESSION['name'],$_SESSION['price'],
        $_SESSION['address'],$_SESSION['pincode'],$_SESSION['location'],
        $_SESSION['owner_number'],$_SESSION['occupation'],$_SESSION['beds'],
        $_REQUEST['wifi'],$_REQUEST['tv'],$_REQUEST['ac'],$_REQUEST['fridge'],
        $_REQUEST['microwave'],$_REQUEST['lift'],$_REQUEST['gym'],
        $_REQUEST['sidetable'],$_REQUEST['washroom'],$_REQUEST['food'],
        $_REQUEST['kitchen'],$_REQUEST['gender'],$id);
        if($stmt->execute()){
            echo "Updated Successfully";
        }
        else{
            echo "Error occured";
        }

        if(empty($_FILES["pg_photo"])){
        }
        else{
                $name = $_FILES['pg_photo']['name'];
                $temp = explode(".", $_FILES["pg_photo"]["name"]);
                $newfilename = round(microtime(true)) . '.' . end($temp);
                $target_file = $target_dir . basename($_FILES["pg_photo"]["name"]);
    
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
                $extensions_arr = array("jpg","jpeg","png","gif");
    
                if(in_array($imageFileType,$extensions_arr) ){
                    $sql = "delete from pg_photo where id=$id";
                    $conn->query($sql);
                    $sql = "insert into pg_photo values($id,'".$newfilename."')";
                    $conn->query($sql);
                    move_uploaded_file($_FILES['pg_photo']['tmp_name'],$target_dir.$newfilename);
                    header("Location:home.php");
            }
        }
    }
    else
      echo "error";
}
