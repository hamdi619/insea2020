<header class="main-header">
  <!-- Logo -->
  <a href="#" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><img src="../images/icon.png" style="width: 50px;height: 50px;"></span>

    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>INSEA</b> inscription</span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- User Account: style can be found in dropdown.less -->
        
            <?php

              $output = array('list'=>'','count'=>0);

              if(isset($_SESSION['admin'])){
                try{
                      $stmt = $conn->prepare("SELECT * FROM mailbox WHERE reciever=:reciever  and seen=0 ORDER BY sent_date DESC");
                      $stmt->execute(['reciever'=>1]);
                  foreach($stmt as $row){
                    $output['count']++;
                    $subject = (strlen($row['mail_subject']) > 30) ? substr_replace($row['mail_subject'], '...', 27) : $row['mail_subject'];
                    $output['list'] .= "
                      <li>
                        <a href='mailbox.php'>
                                    <small style='color:green'>".$row['sent_date']."</small>
                                    <h4>
                                    <b style='color:black'>".$subject."</b>
                                    </h4>

                        </a>
                      </li>
                    ";
                  }
                }
                catch(PDOException $e){
                  $output['message'] = $e->getMessage();
                }
              }


              $pdo->close();

            ?>


        <li class="dropdown messages-menu">
          <!-- Menu toggle button -->
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-bell"></i>
            <span class="label label-success cart_count"><?php echo $output['count']; ?></span>
          </a>
          <ul class="dropdown-menu">
            <li class="header">You have <span class="cart_count"><?php echo $output['count']; ?></span> unread notifications</li>
            <li>
              <ul class="menu" id="cart_menu">
                <?php echo $output['list']; ?>
              </ul>
            </li>
            <li class="footer"><a href="mailbox.php">Go to mail box</a></li>
          </ul>
        </li>

        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="<?php echo (!empty($admin['photo'])) ? '../images/'.$admin['photo'] : '../images/profile.jpg'; ?>" class="user-image" alt="User Image">
            <span class="hidden-xs"><?php echo $admin['firstname'].' '.$admin['lastname']; ?></span>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              <img src="<?php echo (!empty($admin['photo'])) ? '../images/'.$admin['photo'] : '../images/profile.jpg'; ?>" class="img-circle" alt="User Image">

              <p>
                <?php echo $admin['firstname'].' '.$admin['lastname']; ?>
                <small>Member since <?php echo date('M. Y', strtotime($admin['created_on'])); ?></small>
              </p>
            </li>
            <li class="user-footer">
              <div class="pull-right">
                <a href="../logout.php" class="btn btn-default btn-flat">Sign out</a>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>
<?php include 'includes/profile_modal.php'; ?>