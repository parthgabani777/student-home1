      <?php
      
          if(!empty($_SESSION['username']))
            $msg="yes";
          else
            $msg="no";
      ?>
    <script src="https://kit.fontawesome.com/4b28f70eeb.js" crossorigin="anonymous"></script>
    <nav class="navbar navbar-expand-lg  bg-light">
        <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
            </button> -->

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <h1><a id="logo" href="home.php" style="text-decoration:none;">
            <span class="text-primary">
            <i class="fas fa-home"></i>
                Student Home
        </a></h1>
        <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
                <?php
                  if($msg=="yes")
                    echo '<a class="btn btn-outline-secondary" href="user_main_page.php" style="margin-top:0.6rem;margin-right:2rem">Log out</a>';
                  else
                    echo '<a class="btn btn-outline-secondary"  href="login.php" style="margin-top:0.6rem;margin-right:2rem">Log in</a>';

                ?>
          </li>
          
          <li class="nav-item">
            <a class="btn btn-outline-secondary" href="home.php" style="margin-top:0.6rem;margin-right:2rem">Home</a>
          </li>
          
          <?php
                  if($msg=="yes")
                  {
                    echo '<a class="btn btn-outline-secondary" href="added_pg.php" style="margin-top:0.6rem;margin-right:2rem">Added PG</a>';
                  }
                  else
                  {
                    echo '<a class="" href="#" >
                    <button  disabled class="btn btn-outline-secondary" style="margin-top:0.6rem;margin-right:2rem"
                    title="Sign Up To Enable this Facility">Added PG</button>
                      </a>';
                  }
                ?>
          <li class="nav-item">
          <?php
                  if($msg=="yes")
                  {
                    echo '<a class="btn btn-outline-secondary" href="pg_info.php" style="margin-top:0.6rem;margin-right:2rem">Add PG</a>';
                  }
                  else
                  {
                    echo '<a class="" href="#" >
                    <button  disabled class="btn btn-outline-secondary" style="margin-top:0.6rem;margin-right:2rem"
                    title="Sign Up To Enable this Facility">Add PG</button>
                      </a>';
                  }
                ?>
          </li>
          <li class="nav-item">
            <a class="btn btn-outline-secondary" href="aboutus.php" style="margin-top:0.6rem;margin-right:2rem">About Us</a>
          </li>
        </ul>
      </div>
    </nav>