<!-- <html>
    <head>
        <title>
            Home page
        </title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <link rel="stylesheet" href="home.css">

    </head> -->
       <!-- <?php
          // session_start();
          // if(!empty($_SESSION['username']))
          //   $msg="yes";
          // else
          //   $msg="no";
      ?>  -->
    <!-- <body>
    <nav class="navbar navbar-expand-lg  bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
            </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
                <a href="added_pg.php" class="btn btn-outline-secondary"
                style="margin-top:0.6rem;margin-right:2rem">PG Detail</a>
          </li>
          <li class="nav-item active">
                <?php
                  if($msg=="yes")
                    echo '<a class="nav-link text-dark" href="user_main_page.php">Log out</a>';
                  else
                    echo '<a class="nav-link text-dark"  href="login.php">Log in</a>';

                ?>
          </li>
          <li class="nav-item"> -->
          <?php
                  // if($msg=="yes")
                  // {
                  //   echo '<a class="btn btn-info mt-2 mr-3" href="pg_info.php">Add PG</a>';
                  // }
                  // else
                  // {
                  //   echo '<a class="nav-link text-dark" href="#">
                  //   <button  disabled class="btn btn-info"
                  //   title="Sign Up To Enable this Facility">Add PG</button>
                  //     </a>';
                  // }
                ?>
          <!-- </li>
          <li class="nav-item">
            <a class="nav-link text-dark" href="#">About Us</a>
          </li>
        </ul>
      </div>
    </nav> -->
    <?php include 'pg_list.php'; ?>
    <!-- </body>
</html> -->
