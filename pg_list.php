
<?php
  $target_dir = "images/";
  require("./database/db_connect.php");
  $sql = "select *from rating pr inner join pg_list p on pr.id=p.id ";

  if(isset($_REQUEST["filterby"])){
    $conditions = [];
    if(!empty($_REQUEST['pricemax'])){
      $conditions[]="price<".$_REQUEST["pricemax"];
    }
    if(!empty($_REQUEST['preferred_gender'])){
      if($_REQUEST['preferred_gender'] == "male"){
        $temp = "IN(1,3)";
      }
      else{
        $temp = "IN(2,3)";
      }
      $conditions[]="preferred_gender ".$temp;
    }
    if(!empty($_REQUEST['occupancy'])){
      if($_REQUEST['occupancy']=='1'){
        $conditions[]="occupancy=1";
      }
      else if($_REQUEST['occupancy']=='2'){
        $conditions[]="occupancy=2";
      }
      else if($_REQUEST['occupancy']=='3'){
        $conditions[]="occupancy=3";
      }
      else if($_REQUEST['occupancy']=='3+'){
        $conditions[]="occupancy>3";
      }
    }

    if ($conditions)
    {
        $sql .= " where ".implode(" and ", $conditions);
    }
  }

  try{
    $sql .= " group by p.id order by ";
    $sortby = "rating desc";
    if(isset($_REQUEST['sortby'])){
      $sortby = $_REQUEST['sortby'];
      if($sortby == "rating"){
        $sortby = "rating desc ";
      }
      else {
        $sortby ="price";
      }
    }
    $sql = $sql.$sortby;
    $result = $conn->query($sql);
    //echo $sql;
  }
  catch(Exception $e){
    echo $e->getMessage();
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PG list</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js" integrity="sha384-LtrjvnR4Twt/qOuYxE721u19sVFLVSA4hf/rRt6PrZTmiPltdZcI7q7PXQBYTKyf" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/4b28f70eeb.js" crossorigin="anonymous"></script>
    <link rel="stylesheet"  type="text/css" href="main.css">
    <script src="main.js"></script>
</head>
<body>

<?php
  require_once('navbar.php');
?>

  <div class="container-fluid bconten" style="flex-basis:20%;">
    <div class="row" >
    <form action="pg_list.php" method="get" class="ml-2" id="filter-by" style="border-right: 2px solid #ddd;">
      <h3 class="mt-3">Filter Search:</h3>
      <div class="col-md-6 mt-3">
      <label>Price:</label>
      <div style="width:200px" class="slider-price form-check-inline">
        <span class="mr-2">0</span>
        <input type="range" class="multi-range" style="width:200px;" id="customRange11" name="pricemax" min="0" max="100000" value="<?php echo isset($_REQUEST['pricemax'])?$_REQUEST['pricemax']:20000 ?>">
        <span class=" ml-2 valueSpan2"></span>
      </div>

      <div class="mt-3">
        <span>Gender:</span>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="preferred_gender" value="male" id="preferred_gender1" <?php echo isset($_REQUEST['preferred_gender'])?($_REQUEST['preferred_gender']=='male'?'checked':''):'' ?>>
          <label class="form-check-label" for="preferred_gender1">Male</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="preferred_gender" value="female" id="preferred_gender2" <?php echo isset($_REQUEST['preferred_gender'])?($_REQUEST['preferred_gender']=='female'?'checked':''):'' ?>>
          <label class="form-check-label" for="preferred_gender2">Female</label>
        </div>
      </div>

      <div class="mt-3">
        <span>Occupancy:</span>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="occupancy" value="1" id="occupancy1" <?php echo isset($_REQUEST['occupancy'])?($_REQUEST['occupancy']=='1'?'checked':''):'' ?>>
          <label class="form-check-label" for="occupancy1">1</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="occupancy" value="2" id="occupancy2" <?php echo isset($_REQUEST['occupancy'])?($_REQUEST['occupancy']=='2'?'checked':''):'' ?>>
          <label class="form-check-label" for="occupancy2">2</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="occupancy" value="3" id="occupancy3" <?php echo isset($_REQUEST['occupancy'])?($_REQUEST['occupancy']=='3'?'checked':''):'' ?>>
          <label class="form-check-label" for="occupancy3">3</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="occupancy" value="3+" id="occupancy3+" <?php echo isset($_REQUEST['occupancy'])?($_REQUEST['occupancy']=='3+'?'checked':''):'' ?>>
          <label class="form-check-label" for="occupancy3+">3+</label>
        </div>
      </div>

      <div class="mt-4">
        <input type="submit" style="margin-right:5px;" value="Filter" name="filterby">
        <input type="reset" Value="Reset" id="reset">
      </div>

    </div>
    </form>


<section  class="row mt-2" style="flex-basis:75%;padding-left:12px;">

<?php

  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {

      if($row['preferred_gender']=='1'){
        $gender = "Male";
      }
      else if($row['preferred_gender']=='1'){
        $gender="Female";
      }
      else{
        $gender="Male/Female";
      }

      // $rating = $row["avgrat"];
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
          $facilities = $facilities.'<i class=" mb-2 fas fa-wifi"></i>';
      if($row["tv"]==1)
          $facilities = $facilities.'<i class="ml-2 fas fa-tv"></i>';
      if($row['ac']==1)
        $facilities = $facilities.'<i class="ml-2 fas fa-wind"></i>';
      if($row['microwave']==1)
        $facilities = $facilities.'<i class="ml-2 fas fa-square"></i>';
      if($row['lift']==1)
        $facilities = $facilities.'<i class="ml-2 fas fa-sort-up"></i>';
      if($row['gym']==1)
        $facilities = $facilities.'<i class="ml-2 fas fa-dumbbell"></i>';
      if($row['side_table']==1)
        $facilities = $facilities.'<i class="ml-2 fas fa-chair"></i>';
      if($row['washrooms']==1)
          $facilities = $facilities.'<i class="ml-2 fas fa-toilet"></i>';
      if($row['kitchen']==1)
        $facilities = $facilities.'<i class="ml-2 fas fa-utensils"></i>';
      if($row['food']==1)
        $facilities = $facilities.'<i class="ml-2 fas fa-hamburger"></i>';

      if($facilities==""){
        $facilities = "<p class='text-muted'>No Facility</p>";
      }


      echo "<div class='col mb-4' style='flex-basis:33%;flex-grow:0;align-self:strech;'>
          <div class='card' >
          <img src='$target_file' class='card-img-top' height='300'>
          <div class='card-body'>
            <p class='card-text'> ".$row["name"]."</p>
            <p class='card-text' style='border-top:2px solid #ddd;'><i class='fas fa-map-marker-alt mr-2'></i> ".$row["location"]."</p>
            <p class='card-text'><i class='fas fa-rupee-sign mr-2'></i> ".$row["price"]."</p>
            <p class='card-text'>Available for: ".$gender."</p>
            <p class='card-text'><i class='fas fa-bed mr-2'></i>Total beds: ".$row["beds"]."</p>
            <p class='card-text' ><i class='fas fa-bed mr-2'></i>Occupation: ".$row["occupancy"]."</p>
            <p class='card-text' style='border-top:2px solid #ddd;'>key facilities:</p>
            <p>".$facilities."</p>
            <p class='card-text'>Rating: ".floor($rating)."<i class='ml-2 fa fa-star'
             data-rating='2' style='font-size:16px;color:yellow;'></i></p>
            <p class='card-text'>Contact No: ".$row["owner_number"]."</p>
        </div>
        
        </div>
        </div>";

        
    }
  }
  // <div class='card-footer text-center'>
        //     <a href='added_pg.php'><button>Read More</button></a>
        // </div>
  else {
    echo "No results";
  }

?>
</section>

<div class="ml-5 mt-5" style="display:none;">
  <form action="./pg_list.php" method="get">
    <div class="row">
      <div class="sort">
        <div class="collection-sort">
          <label>Sort by:</label>
          <select class="custom-select" name="sortby" id="sortby" required>
            <option  value="rating">Rating</option>
            <option value="price">Price</option>
          </select>
        </div>
      </div>
      <input type="submit" id="sort" class="btn btn-secondary ml-4"  value="sort"/>
    </div>
  </form>
</div>

  </div>
</div>

<?php require_once('footer.php') ?>
</body>
</html>

<?php
  $conn->close();
?>
