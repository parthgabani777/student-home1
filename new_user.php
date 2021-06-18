<?php
    $username="";$email="";$name="";$dob="";$output="";$password="";
    require_once("./database/db_create_user.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="abc.css">
</head>
<body>

<?php require_once('navbar.php') ?>

      <div class="container">
            <form method="GET" action="<?php $_SERVER['PHP_SELF'] ?>">
                <div style="color:red"><?php echo $output; ?></div>
                <h3 class="text-success">Register</h3><hr>
                <div class="form-group">
                    <input type="text" placeholder="Name:" class="form-control" name="name" id="name" value="<?php echo $name ?>" required>
                </div>
                <div class="form-group">
                  <input type="email" placeholder="Email:" class="form-control" name="email" id="email" value="<?php echo $email ?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required>
                </div>
                <div class="form-group">
                    <input type="date" placeholder="DOB:"  class="form-control" name="dob" id="dob" value="<?php echo $dob ?>" required>
                </div>
                <div class="form-group">
                    <input type="text" placeholder="Username:" class="form-control"
                    name="username" id="username" required>
                </div>
                <div class="form-group">
                    <input type="password" placeholder="Password:" class="form-control" name="password" id="password" pattern="(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$" title="8 Character.1 number and character"  required>
                </div>
                <div class="form-group">
                    <input type="password" placeholder="Conform Password:" class="form-control" name="cpassword" id="cpassword" required>
                </div>
                <div class="btn">
                    <button name="submit" type="submit" value="submit" class="btn btn-outline-success ">Register</button>
                </div>
            </form>
      </div>
        <!-- <table>
            <tr><td><label>Enter Name:</label></td>
            <td></td></tr>
            <tr><td><label for="email">Email Address:</label></td>
            <td></td></tr>
            <tr><td><label for="dob">Date of Birth:</label></td>
            <td></td></tr>
            <tr><td><label for="username">Username:</label></td>
            <td></td></tr>
            <tr><td><label for="password">Password:</label></td>
            <td></td></tr>
            <tr><td><label for="cpassword">Confirm Password:</label></td>
            <td></td></tr>

            <tr class="table-center"><td colspan="2" style="text-align:center;"><input type="submit" name= "Register" value="Register"><input type="reset" value="reset"></td></tr>

            <tr class="table-center"><td colspan="2" class="err"></td></tr>
        </table> -->

</body>
</html>
