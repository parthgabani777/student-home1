<?php

$target_dir = "images/";
require("./database/db_connect.php");

//$_SESSION["username"] = "gabaniparth";
if(!isset($_SESSION["username"])){
  header("Location:home.php");
}
$username = $_SESSION["username"];

$sql = "select *from pg_list where owner='".$username."'";
//echo $sql;
$result = $conn->query($sql);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js" integrity="sha384-LtrjvnR4Twt/qOuYxE721u19sVFLVSA4hf/rRt6PrZTmiPltdZcI7q7PXQBYTKyf" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/4b28f70eeb.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./main.css">
</head>
<style media="screen">
    section{
        padding-top: 2rem;
        padding-left:2rem;
        padding-right:2rem;
    }
</style>
<body>

<?php require_once('navbar.php') ?>

<h1 class="mx-5 mt-3">Added PG</h1>

<section class="row " style="flex-basis:60%">

<?php

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {

      //$rating = $row["avgrat"];
      $id=$row['id'];
      $sql = "select avg(rating) from rating where id='".$row["id"]."'";
      $result2 = $conn->query($sql);
      if($result2->num_rows > 0){
        $rating = mysqli_fetch_row($result2)[0];
      }
      else{
        $rating = "0";
      }


      $sql = "select photo from pg_photo where id=".$row["id"];
      $result1 = $conn->query($sql);
      if($result1->num_rows > 0){
        $photoname = mysqli_fetch_row($result1)[0];
      }
      else{
        $photoname = "abc.jpg";
      }
      $target_file = $target_dir.$photoname;
      $facilities="";

      if($row["wifi"]==1)
          $facilities = $facilities.'<i class="ml-2 fas fa-wifi"></i>';
      if($row["tv"]==1)
          $facilities = $facilities.'<i class="ml-2 fas fa-tv"></i>';
      if($row['ac']==1)
        $facilities = $facilities.'<i class="ml-2 fas fa-wifi"></i>';
      if($row['microwave']==1)
        $facilities = $facilities.'<i class="ml-2 fas fa-wifi"></i>';
      if($row['lift']==1)
        $facilities = $facilities.'<i class="ml-2 fas fa-wifi"></i>';
      if($row['gym']==1)
        $facilities = $facilities.'<i class="ml-2 fas fa-dumbbell"></i>';
      if($row['side_table']==1)
        $facilities = $facilities.'<i class="ml-2 fas fa-wifi"></i>';
      if($row['washrooms']==1)
          $facilities = $facilities.'<i class="ml-2 fas fa-toilet"></i>';
      if($row['kitchen']==1)
        $facilities = $facilities.'<i class="ml-2 fas fa-wifi"></i>';
      if($row['food']==1)
        $facilities = $facilities.'<i class="ml-2 fas fa-utensils"></i>';
      if($facilities==""){
        $facilities = "<p class='text-muted'>No Facility</p>";
      }


      echo "<div class='col mb-4 ' style='flex-basis:25%;flex-grow:0;'>
          <div class='card' >
          <img src='$target_file' class='card-img-top' height='300'>
          <div class='card-body'>
            <p class='card-text'> ".$row["name"]."</p>
            <p class='card-text'><i class='fas fa-map-marker-alt mr-2'></i> ".$row["location"]."</p>
            <p class='card-text'><i class='fas fa-rupee-sign mr-2'></i> ".$row["price"]."</p>
            <p class='card-text'><i class='fas fa-bed mr-2'></i> ".$row["beds"]."</p>
            <p class='card-text'>key facilities:</p>
            <p>".$facilities."</p>
            <p class='card-text'>Rating: ".floor($rating)."<i class='ml-2 fa fa-star' data-rating='2' style='font-size:16px;color:yellow;'></i></p>

        </div>
        <div class='card-footer text-center'>
          <a class='btn btn-outline-success'
          href='update1.php?editdata=$id'>Edit</a>
          <a class='btn btn-outline-success'
          href='deletepg.php?id=$id'>Delete</a>
        </div>
        </div>
        </div>";
    }
}
else {
    echo "No PG added.
    
    
    ";
    ?>


<style>
#footer{
    position: fixed;left: 0;bottom: 0;width:100%;
}
</style>

<?php
}
?>

</section>
<?php require_once('footer.php') ?>
</body>
</html>
