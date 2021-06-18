<?php

$target_dir = "images/";
session_start();
if(isset($_REQUEST['add']))
{
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

          require_once('database/db_connect.php');
          $sql = "insert into pg_list(name,address,pincode,location,owner_number,price,
          occupancy,beds,wifi,tv,ac,fridge,microwave,lift,gym,side_table,washrooms,
          kitchen,food,preferred_gender,owner)
          values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
          $stmt = $conn->prepare($sql);
          $stmt->bind_param("sssssssssssssssssssss",$_SESSION['name'],
          $_SESSION['address'],$_SESSION['pincode'],$_SESSION['location'],
          $_SESSION['owner_number'],$_SESSION['price'],$_SESSION['occupation'],
          $_SESSION['beds'],$_REQUEST['wifi'],$_REQUEST['tv'],$_REQUEST['ac'],
          $_REQUEST['fridge'],$_REQUEST['microwave'],$_REQUEST['lift'],
          $_REQUEST['gym'],$_REQUEST['sidetable'],$_REQUEST['washroom'],
          $_REQUEST['kitchen'],$_REQUEST['food'],$_REQUEST['gender'],$_SESSION["username"]);
          if($stmt->execute()){
            echo "added";
            $id = $stmt->insert_id;
            $sql = "insert into rating values(?,?)";
            $stmt = $conn->prepare($sql);           
            //echo $id;
            $temp=0;
            $stmt->bind_param("ss",$id,$temp);
            $stmt->execute();
    }
    else{
        echo "error";
    }

    if(empty($_FILES["pg_photo"])){
        print_r($_FILES);
    }
    else{
            //$id = $stmt->insert_id;
            echo $id;
            $name = $_FILES['pg_photo']['name'];
            $temp = explode(".", $_FILES["pg_photo"]["name"]);
            $newfilename = round(microtime(true)) . '.' . end($temp);
            $target_file = $target_dir . basename($_FILES["pg_photo"]["name"]);

            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

            $extensions_arr = array("jpg","jpeg","png","gif");

            if(in_array($imageFileType,$extensions_arr) ){

                $sql = "insert into pg_photo values($id,'".$newfilename."')";
                $conn->query($sql);
                move_uploaded_file($_FILES['pg_photo']['tmp_name'],$target_dir.$newfilename);
                header("Location:home.php");
        }
    }
    }

}
else{
    echo "error";
}


?>
