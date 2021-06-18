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

<form action="add.php" method="post" enctype="multipart/form-data">

<?php require_once('navbar.php'); ?>

    <h2>Available Facility</h2>

    <table class="table table-striped">
        <tbody>
          <tr>
            <th scope="row">Wifi</th>
              <td>
                <div class="form-check-inline">
                    <input type="radio" name="wifi"  class="form-check-input" value="1" required>
                    <label class="form-check-label">Yes</label>&nbsp;&nbsp;
                    <input type="radio" name="wifi"  class="form-check-input" value="0" required>
                    <label class="form-check-label">No</label>
                </div>
              </td>
          </tr>
          <tr>
            <th scope="row">TV</th>
              <td>
                <div class="form-check-inline">
                  <input type="radio" name="tv"  class="form-check-input" value="1" required>
                  <label class="form-check-label">Yes</label>&nbsp;&nbsp;
                  <input type="radio" name="tv" class="form-check-input" value="0" required/>
                  <label class="form-check-label">No</label>
                </div>
              </td>
          </tr>
          <tr>
            <th scope="row">AC</th>
              <td>
                <div class="form-check-inline">
                  <input type="radio" name="ac"  class="form-check-input" value="1" required>
                  <label class="form-check-label">Yes</label>&nbsp;&nbsp;
                  <input type="radio" name="ac" class="form-check-input" value="0" required/>
                  <label class="form-check-label">No</label>
                </div>
              </td>
          </tr>
          <tr>
            <th scope="row">Fridge</th>
              <td>
                <div class="form-check-inline">
                  <input type="radio" name="fridge" class="form-check-input" value="1" required>
                  <label class="form-check-label">Yes</label>&nbsp;&nbsp;
                  <input type="radio" name="fridge" class="form-check-input" value="0" required/>
                  <label class="form-check-label">No</label>
                </div>
              </td>
          </tr>
          <tr>
            <th scope="row">MicroWave</th>
              <td>
                <div class="form-check-inline">
                  <input type="radio" name="microwave" class="form-check-input" value="1" required>
                  <label class="form-check-label">Yes</label>&nbsp;&nbsp;
                  <input type="radio" name="microwave" class="form-check-input" value="0" required/>
                  <label class="form-check-label">No</label>
                </div>
              </td>
          </tr>
          <tr>
            <th scope="row">Lift</th>
              <td>
                <div class="form-check-inline">
                  <input type="radio" name="lift" class="form-check-input" value="1" required>
                  <label class="form-check-label">Yes</label>&nbsp;&nbsp;
                  <input type="radio" name="lift" class="form-check-input" value="0" required/>
                  <label class="form-check-label">No</label>
                </div>
              </td>
          </tr>
          <tr>
            <th scope="row">Gym</th>
              <td>
                <div class="form-check-inline">
                  <input type="radio" name="gym" class="form-check-input" value="1" required>
                  <label class="form-check-label">Yes</label>&nbsp;&nbsp;
                  <input type="radio" name="gym" class="form-check-input" value="0" required/>
                  <label class="form-check-label">No</label>
                </div>
              </td>
          </tr>
          <tr>
            <th scope="row">Sidetable</th>
              <td>
                <div class="form-check-inline">
                  <input type="radio" name="sidetable" class="form-check-input" value="1" required>
                  <label class="form-check-label">Yes</label>&nbsp;&nbsp;
                  <input type="radio" name="sidetable" class="form-check-input" value="0" required/>
                  <label class="form-check-label">No</label>
                </div>
              </td>
          </tr>
          <tr>
            <th scope="row">Washroom</th>
              <td>
                <div class="form-check-inline">
                  <input type="radio" name="washroom" class="form-check-input" value="1" required>
                  <label class="form-check-label">Yes</label>&nbsp;&nbsp;
                  <input type="radio" name="washroom" class="form-check-input" value="0" required/>
                  <label class="form-check-label">No</label>
                </div>
              </td>
          </tr>
          <tr>
            <th scope="row">Food Available:</th>
              <td>
                <div class="form-check-inline">
                  <input type="radio" name="food" class="form-check-input" value="1" required>
                  <label class="form-check-label">Yes</label>&nbsp;&nbsp;
                  <input type="radio" name="food" class="form-check-input" value="0" required/>
                  <label class="form-check-label">No</label>
                </div>
              </td>
          </tr>
          <tr>
            <th scope="row">Kitchen</th>
              <td>
                <div class="form-check-inline">
                  <input type="radio" name="kitchen" class="form-check-input" value="1" required>
                  <label class="form-check-label">Yes</label>&nbsp;&nbsp;
                  <input type="radio" name="kitchen" class="form-check-input" value="0" required/>
                  <label class="form-check-label">No</label>
                </div>
              </td>
          </tr>
          <tr>
            <th scope="row">Available For:</th>
              <td>
                <div class="form-check-inline">
                  <input type="radio" name="gender" class="form-check-input" value="1" required>
                  <label class="form-check-label">Male</label>&nbsp;&nbsp;
                  <input type="radio" name="gender" class="form-check-input" value="2" required/>
                  <label class="form-check-label">Female</label>&nbsp;&nbsp;
                  <input type="radio" name="gender" class="form-check-input" value="3" required/>
                  <label class="form-check-label">Both</label>
                </div>
              </td>
          </tr>
          <tr>
            <th scope="row">Upload Photo:</th>
              <td>
                <div class="form-check-inline">
                  <input type="file" name="pg_photo" id="file" required>
                </div>
              </td>
          </tr>
          <tr>
            <td>
              <button type="submit" value="submit"
                class="btn btn-success btn-sm btn-block"
                name="add">Add PG</button>
            </td>
          </tr>
        </tbody>
    </table>
</form>
<?php require_once('footer.php') ?>
</body>
</html>
