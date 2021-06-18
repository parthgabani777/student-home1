<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="facility.css">
</head>
<body>

<?php require_once('navbar.php'); ?>

<?php
      require("./database/db_connect.php");
      $id=$_GET['editdata'];
      $sql="select *from pg_list where id='".$id."'";
      $result=$conn->query($sql);
      $data=$result->fetch_assoc();
 ?>
<form action="edit_details.php?editdata=<?php echo $id; ?>" style="margin-bottom:3rem;" method="post" enctype="multipart/form-data">

    <h2>Available Facility</h2>

    <table class="table table-striped">
        <tbody>
          <tr>
            <th scope="row">Wifi</th>
              <td>
                <div class="form-check-inline">
                    <input type="radio" name="wifi"
                    <?php echo $data['wifi']==1?'checked':'' ?>
                    class="form-check-input" value="1">
                    <label class="form-check-label">Yes</label>&nbsp;&nbsp;
                    <input type="radio" name="wifi"
                    <?php echo $data['wifi']==0?'checked':'' ?>
                    class="form-check-input" value="0">
                    <label class="form-check-label">No</label>
                </div>
              </td>
          </tr>
          <tr>
            <th scope="row">TV</th>
              <td>
                <div class="form-check-inline">
                  <input type="radio" name="tv"
                  <?php echo $data['tv']==1?'checked':'' ?>
                  class="form-check-input" value="1">
                  <label class="form-check-label">Yes</label>&nbsp;&nbsp;
                  <input type="radio" name="tv"
                  <?php echo $data['tv']==0?'checked':'' ?>
                  class="form-check-input" value="0"/>
                  <label class="form-check-label">No</label>
                </div>
              </td>
          </tr>
          <tr>
            <th scope="row">AC</th>
              <td>
                <div class="form-check-inline">
                  <input type="radio" name="ac"
                  <?php echo $data['ac']==1?'checked':'' ?>
                  class="form-check-input" value="1">
                  <label class="form-check-label">Yes</label>&nbsp;&nbsp;
                  <input type="radio" name="ac"
                  <?php echo $data['ac']==0?'checked':'' ?>
                  class="form-check-input" value="0"/>
                  <label class="form-check-label">No</label>
                </div>
              </td>
          </tr>
          <tr>
            <th scope="row">Fridge</th>
              <td>
                <div class="form-check-inline">
                  <input type="radio" name="fridge"
                  <?php echo $data['fridge']==1?'checked':'' ?>
                  class="form-check-input" value="1">
                  <label class="form-check-label">Yes</label>&nbsp;&nbsp;
                  <input type="radio" name="fridge"
                  <?php echo $data['fridge']==0?'checked':'' ?>
                  class="form-check-input" value="0"/>
                  <label class="form-check-label">No</label>
                </div>
              </td>
          </tr>
          <tr>
            <th scope="row">MicroWave</th>
              <td>
                <div class="form-check-inline">
                  <input type="radio" name="microwave"
                  <?php echo $data['microwave']==1?'checked':'' ?>
                  class="form-check-input" value="1">
                  <label class="form-check-label">Yes</label>&nbsp;&nbsp;
                  <input type="radio" name="microwave"
                  <?php echo $data['microwave']==0?'checked':'' ?>
                  class="form-check-input" value="0"/>
                  <label class="form-check-label">No</label>
                </div>
              </td>
          </tr>
          <tr>
            <th scope="row">Lift</th>
              <td>
                <div class="form-check-inline">
                  <input type="radio" name="lift"
                  <?php echo $data['lift']==1?'checked':'' ?>
                  class="form-check-input" value="1">
                  <label class="form-check-label">Yes</label>&nbsp;&nbsp;
                  <input type="radio" name="lift"
                  <?php echo $data['lift']==0?'checked':'' ?>
                  class="form-check-input" value="0"/>
                  <label class="form-check-label">No</label>
                </div>
              </td>
          </tr>
          <tr>
            <th scope="row">Gym</th>
              <td>
                <div class="form-check-inline">
                  <input type="radio" name="gym"
                  <?php echo $data['gym']==1?'checked':'' ?>
                  class="form-check-input" value="1">
                  <label class="form-check-label">Yes</label>&nbsp;&nbsp;
                  <input type="radio" name="gym"
                  <?php echo $data['gym']==0?'checked':'' ?>
                  class="form-check-input" value="0"/>
                  <label class="form-check-label">No</label>
                </div>
              </td>
          </tr>
          <tr>
            <th scope="row">Sidetable</th>
              <td>
                <div class="form-check-inline">
                  <input type="radio" name="sidetable"
                  <?php echo $data['side_table']==1?'checked':'' ?>
                  class="form-check-input" value="1">
                  <label class="form-check-label">Yes</label>&nbsp;&nbsp;
                  <input type="radio" name="sidetable"
                  <?php echo $data['side_table']==0?'checked':'' ?>
                  class="form-check-input" value="0"/>
                  <label class="form-check-label">No</label>
                </div>
              </td>
          </tr>
          <tr>
            <th scope="row">Washroom</th>
              <td>
                <div class="form-check-inline">
                  <input type="radio" name="washroom"
                  <?php echo $data['washrooms']==1?'checked':'' ?>
                  class="form-check-input" value="1">
                  <label class="form-check-label">Yes</label>&nbsp;&nbsp;
                  <input type="radio" name="washroom"
                  <?php echo $data['washrooms']==0?'checked':'' ?>
                  class="form-check-input" value="0"/>
                  <label class="form-check-label">No</label>
                </div>
              </td>
          </tr>
          <tr>
            <th scope="row">Food Available:</th>
              <td>
                <div class="form-check-inline">
                  <input type="radio" name="food"
                  <?php echo $data['food']==1?'checked':'' ?>
                  class="form-check-input" value="1">
                  <label class="form-check-label">Yes</label>&nbsp;&nbsp;
                  <input type="radio" name="food"
                  <?php echo $data['food']==0?'checked':'' ?>
                  class="form-check-input" value="0"/>
                  <label class="form-check-label">No</label>
                </div>
              </td>
          </tr>
          <tr>
            <th scope="row">Kitchen</th>
              <td>
                <div class="form-check-inline">
                  <input type="radio" name="kitchen"
                  <?php echo $data['kitchen']==1?'checked':'' ?>
                  class="form-check-input" value="1">
                  <label class="form-check-label">Yes</label>&nbsp;&nbsp;
                  <input type="radio" name="kitchen"
                  <?php echo $data['kitchen']==0?'checked':'' ?>
                  class="form-check-input" value="0"/>
                  <label class="form-check-label">No</label>
                </div>
              </td>
          </tr>
          <tr>
            <th scope="row">Available For:</th>
              <td>
                <div class="form-check-inline">
                  <input type="radio" name="gender"
                  <?php echo $data['preferred_gender']==1?'checked':'' ?>
                  class="form-check-input" value="1">
                  <label class="form-check-label">Male</label>&nbsp;&nbsp;
                  <input type="radio" name="gender"
                  <?php echo $data['preferred_gender']==2?'checked':'' ?>
                  class="form-check-input" value="2"/>
                  <label class="form-check-label">Female</label>&nbsp;&nbsp;
                  <input type="radio" name="gender"
                  <?php echo $data['preferred_gender']==3?'checked':'' ?>
                  class="form-check-input" value="3"/>
                  <label class="form-check-label">Other</label>
                </div>
              </td>
          </tr>
          <tr>
            <th scope="row">Upload Photo:</th>
              <td>
                <div class="form-check-inline">
                  <input type="file" name="pg_photo"  id="file">
                </div>
              </td>
          </tr>
          <tr>
            <td>
              <button type="submit" value="submit"
                class="btn btn-success btn-sm btn-block"
                name="update">Add PG</button>
            </td>
          </tr>
        </tbody>
    </table>
</form>

<?php require_once('footer.php') ?>
</body>
</html>
