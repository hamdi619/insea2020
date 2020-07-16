<header class="main-header" >
  <nav class="navbar navbar-static-top">
    <div class="container">
      <div class="navbar-header">
        <a href="index.php" class="navbar-brand"><b>INSEA </b>Inscription</a>
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
          <i class="fa fa-bars"></i>
        </button>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
        <ul class="nav navbar-nav">
          <!-- <li><a href="index.php">HOME</a></li> -->
          <li><a href="index.php">L'INSEA</a></li>
          
          <li><a href="newsfeed.php">NEWSFEED</a></li>
          <li><a href="contact.php">CONTACT US</a></li>
          <li><a href="">THIS WEBSITE</a></li>

        </ul>

      </div>
      <!-- /.navbar-collapse -->
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu" >
        <ul class="nav navbar-nav">

          <?php
            if(isset($_SESSION['user'])){
              $image = (!empty($user['photo'])) ? 'images/photo/'.$user['photo'] : 'images/profile.jpg';
              echo '
                <li class="dropdown messages-menu">
                  <!-- Menu toggle button -->
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-bell"></i>
                    <span class="label label-success cart_count"></span>
                  </a>
                  <ul class="dropdown-menu">
                    <li class="header">You have <span class="cart_count"></span> unread notifications</li>
                    <li>
                      <ul class="menu" id="cart_menu">
                      </ul>
                    </li>
                    <li class="footer"><a href="mailbox.php">Go to mail box</a></li>
                  </ul>
                </li>


                <li class="dropdown user user-menu">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="'.$image.'" class="user-image" alt="User Image">
                    <span class="hidden-xs">'.$user['firstname'].' '.$user['lastname'].'</span>
                  </a>
                  <ul class="dropdown-menu">
                    <!-- User image -->
                    <li class="user-header">
                      <img src="'.$image.'" class="img-circle" alt="User Image">

                      <p>
                        '.$user['firstname'].' '.$user['lastname'].'
                      </p>
                    </li>
                    <li class="user-footer">
                    <div class="row">
                      <div class=" col-sm-4">
                        <a href="profile.php" class="btn btn-default btn-flat"><i class="fa fa-user "></i> Profile</a>
                      </div>
                      <div class=" col-sm-4">
                        <a href="mailbox.php" class="btn btn-default btn-flat"><i class="fa fa-envelope"></i> Mailbox</a>
                      </div>
                      <div class=" col-sm-4">
                        <a href="logout.php" class="btn btn-default btn-flat"></i>Sign out</a>
                      </div>
                    </div>
                    </li>
                  </ul>
                </li>
              ';
            }
            else{
              echo "
                <li><a href='login.php'>LOGIN</a></li>
                <li><a href='signup.php'>SIGNUP</a></li>
              ";
            }
          ?>
        </ul>
      </div>
    </div>
  </nav>
</header>