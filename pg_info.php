<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="pgstyle.css">
  </head>
  <?php
      if(isset($_POST['add']))
      {
          if(!empty($_POST['name']) && !empty($_POST['price'])
          && !empty($_POST['address']) && !empty($_POST['pincode'])
          && !empty($_POST['location']) && !empty($_POST['owner_number'])
          && !empty($_POST['occupation']) && !empty($_POST['beds']))
          {
              session_start();
              $name=$_POST['name'];
              $_SESSION['name']=$name;

              $address=$_POST['address'];
              $_SESSION['address']=$address;

              $pincode=$_POST['pincode'];
              $_SESSION['pincode']=$pincode;

              $location=$_POST['location'];
              $_SESSION['location']=$location;

              $owner_number=$_POST['owner_number'];
              $_SESSION['owner_number']=$owner_number;

              $price=$_POST['price'];
              $_SESSION['price']=$price;

              $occupation=$_POST['occupation'];
              $_SESSION['occupation']=$occupation;

              $beds=$_POST['beds'];
              $_SESSION['beds']=$beds;
              header("Location: add_pg.php");
          }
      }
   ?>
  <body>

<?php require_once('navbar.php') ?>
      <h2 class="text-success">Enter PG information</h2>
      <form  method="post" style="margin-bottom:3rem;">
        <div class="container">
          <div class="form-group">
              <input type="text" name="name" id="name" class="form-control" placeholder="PG name:" required> 
          </div>
          <div class="form-group">
              <input type="number" name="price" class="form-control" id="price" placeholder="PG Price:" required>
          </div>
          <div class="form-group">
              <textarea name="address" rows="3" class="form-control" required
              placeholder="Address"></textarea>
          </div>
          <div class="form-group">
                <input type="number" name="pincode"  placeholder="pincode" required
                id="pincode" class="form-control">
          </div>
          <div class="form-group">
                <input type="text" name="location"  placeholder="Location" required
                id="location" class="form-control">
          </div>
          <div class="form-group">
                <input type="number" name="owner_number" class="form-control" required
                placeholder="Contact no." id="owner_number">
          </div>
          <label >Occupancy:</label><br>
          <div class="form-check-inline ">
            <input type="checkbox" name="occupation"  class="form-check-input" 
            id="occupation1" value="1">
            <label class="form-check-label">
              1
            </label>
          </div>
          <div class="form-check-inline">
            <input type="checkbox" name="occupation"  class="form-check-input"
            id="occupation1" value="2">
            <label class="form-check-label">
              2
            </label>
          </div>
          <div class="form-check-inline">
            <input type="checkbox" name="occupation"  class="form-check-input" 
            id="occupation1" value="3">
            <label class="form-check-label">
              3
            </label>
          </div>
          <div class="form-check-inline">
            <input type="checkbox" name="occupation"  class="form-check-input"
            id="occupation1" value="3+">
            <label class="form-check-label">
              3+
            </label>
          </div><br><br>
          <div class="form-group">
              <input type="number" name="beds" placeholder="Total Beds" required
              class="form-control"
              id="beds" min="1" max="999">
          </div>
          <button class="btn btn-success btn-sm btn-block mb-6"
          type="submit" value="submit" name="add">Next</button>
        </div>
      </form>
      
      <?php require_once('footer.php') ?>
  </body>
</html>
