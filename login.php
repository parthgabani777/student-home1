
<?php
    require_once('./validation.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentication App</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="abc.css">
</head>
<body>

<?php require_once('navbar.php') ?>

<div style="height:20rem; margin-top:6rem" class="container">
            <form method="GET" autocomplete="off" action="<?php $_SERVER['PHP_SELF'] ?>">
                <div style="color:red;"><?php echo $output; ?></div>
                <h3 class="text-success">Sign in</h3><hr>
                <div class="form-group">
                    <input type="text" placeholder="Username:" class="form-control"
                    name="username" id="username" required>
                </div>
                <div class="form-group">
                    <input type="password" placeholder="Password:" class="form-control" name="password" id="password"  required>
                </div>
                <div class="btn">
                    <button name="submit" type="submit" value="submit" 
                    class="btn btn-outline-success ">Sign in</button>
                </div>  
                <div class="up">
                        <p>Do not have account? <a href="./new_user.php" 
                        style="color:blue;">Create new one</a></p>
                </div>
            </form>
      </div>
</body>
<!-- <form autocomplete=”off”  action="<?php $_SERVER['PHP_SELF'] ?>" method="GET">
        <div class="login-box">   
        <div class="err"><?php echo $output; ?></div>
            <h1 class="head">Login</h1>    
            <div class="text">
                 <i class="fa fa-user" aria-hidden="true"></i>
                <input type="text" name="username" placeholder="Username:" id="username">
            </div>
            <div class="text">
                <i class="fa fa-lock" aria-hidden="true"></i>
                <input type="password" name="password" placeholder="Password:" id="password">   
            </div>  
                <input type="submit" name="submit"  value="Sign in" class="button">
            <div class="up">
                        <p>Do not have account?</p>
                        <a href="./new_user.php" style="color:rgb(21, 202, 21)">Create new one</a>
            </div>
        </div>
        
    </form> -->
</html>