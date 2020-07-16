<?php include 'includes/session.php'; ?>
<?php
  if(isset($_SESSION['user'])){
    header('location: mailbox.php');
  }

  // if(isset($_SESSION['captcha'])){
  //   $now = time();
  //   if($now >= $_SESSION['captcha']){
  //     unset($_SESSION['captcha']);
  //   }
  // }

?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition register-page">
<div class="register-box">
  <!-- information box (danger/smth wrong) -->
  	<?php
      if(isset($_SESSION['error'])){
        echo "
          <div class='callout callout-danger text-center'>
            <p>".$_SESSION['error']."</p> 
          </div>
        ";
        unset($_SESSION['error']);
      }

      if(isset($_SESSION['success'])){
        echo "
          <div class='callout callout-success text-center'>
            <p>".$_SESSION['success']."</p> 
          </div>
        ";
        unset($_SESSION['success']);
      }
    ?>
  	<div class="register-box-body">
    	<p class="login-box-msg">Register as a student</p>

    	<form enctype="multipart/form-data" action="register.php" method="POST" >
        <!-- first name -->
          <div class="row">
            <div class="form-group has-feedback col-xs-6 right-inner-addon">
              <label>firstname fr</label>
              <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Firstname" value="<?php echo (isset($_SESSION['firstname'])) ? $_SESSION['firstname'] : '' ?>" required>
            </div>

            <div class="form-group has-feedback col-xs-6">
              <label>firstname ar</label>
              <input type="text" class="form-control" name="firstname_ar" placeholder="Firstname arabic" value="<?php echo (isset($_SESSION['firstname_ar'])) ? $_SESSION['firstname_ar'] : '' ?>" required>
            </div>                      
          </div>

          <!-- lastname -->
          <div class="row">
            <div class="form-group has-feedback col-xs-6">
              <label>lastname fr</label>
              <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Lastname" value="<?php echo (isset($_SESSION['lastname'])) ? $_SESSION['lastname'] : '' ?>" required>
            </div>

            <div class="form-group has-feedback col-xs-6">
              <label>lastname ar</label>
              <input type="text" class="form-control" name="lastname_ar" placeholder="lastname arabic" value="<?php echo (isset($_SESSION['lastname_ar'])) ? $_SESSION['lastname_ar'] : '' ?>" required>
            </div>                      
          </div>

          <!-- ville et num telephone -->
          <div class="row">
            <div class="form-group has-feedback col-xs-6">
              <label>adress</label>
              <input type="text" class="form-control" name="adress" id="adress" placeholder="adress" value="<?php echo (isset($_SESSION['adress'])) ? $_SESSION['adress'] : '' ?>" required>
            </div>

            <div class="form-group has-feedback col-xs-6">
              <label>phone number</label>
              <input type="text" class="form-control" name="phone" placeholder="phone" value="<?php echo (isset($_SESSION['phone'])) ? $_SESSION['phone'] : '' ?>" required>
            </div>                      
          </div>

          <!-- CIN et CNE -->
          <div class="row">
            <div class="form-group has-feedback col-xs-6">
              <label>CIN</label>
              <input type="text" class="form-control" name="cin" id="cin" placeholder="CIN" value="<?php echo (isset($_SESSION['cin'])) ? $_SESSION['cin'] : '' ?>" required>
            </div>

            <div class="form-group has-feedback col-xs-6">
              <label>CNE</label>
              <input type="text" class="form-control" name="cne" placeholder="CNE" value="<?php echo (isset($_SESSION['cne'])) ? $_SESSION['cne'] : '' ?>" required>
            </div>                      
          </div>
      

          <!-- date naissance -->
        <div class="form-group has-feedback ">
            <label>birthday</label>
            <input type="text" class="form-control" name="birthday" id="birthday" placeholder="jj-mm-yyyy" value="<?php echo (isset($_SESSION['birthday'])) ? $_SESSION['birthday'] : '' ?>"  required>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>          

          <!-- sexe -->
          <label>sex</label>
          <div class="row">
              <div class="custom-control custom-radio custom-control-inline col-xs-2">
                <input type="radio" name="sex" class="custom-control-input" id="male" value="1" checked="checked" >
                <label class="custom-control-label" for="male">male</label>
              </div>

              <div class="custom-control custom-radio custom-control-inline col-xs-2">
                <input type="radio" name="sex" class="custom-control-input" id="female" value="0" >
                <label class="custom-control-label" for="female">female</label>
              </div>
          </div><br>
            
            <!-- cycle et filliere -->
         <div class="row">
            <div class="select-box col-xs-4" >
              <label for="select-box1" class="label select-box1"><span class="label-desc">choisissez votre cycle</span> </label>
                <select  class="select" name="cycle" id="cycle" value="<?php echo (isset($_SESSION['cycle'])) ? $_SESSION['cycle'] : '' ?>" required>
                    <option value="" selected disabled hidden>Cycle</option>
                    <option value="1">Cycle ingénieurs d’Etat</option>
                    <option value="2">Cycle Master</option>
                    <option value="3">Cycle Doctorat</option>
                </select>
            </div>

          <div class="select-box col-xs-6"  >
            <label for="select-box1" class="label select-box1"><span class="label-desc">choisissez votre filiere</span> </label>
            <select  class="select" name="filiere" id="filiere" style="width: 365px" value="<?php echo (isset($_SESSION['filiere'])) ? $_SESSION['filiere'] : '' ?>" required>
              <option value="" selected disabled hidden>Filiere</option>
            </select>
          </div>
        </div><br>

        <!-- année et reserve -->
        <div class="row">
            <div class="select-box col-xs-6" >
              <label for="select-box1" class="label select-box1"><span class="label-desc">choose your year</span> </label>
                <select  class="select" name="year" id="annee" style="width: 365px" value="<?php echo (isset($_SESSION['year'])) ? $_SESSION['year'] : '' ?>" required>
                    <option value="" selected disabled hidden>Year</option>
                </select>
            </div>
            
            <div class="select-box col-xs-4 pull-right"  >
              <label for="select-box1" class="label select-box1"><span class="label-desc">Reserve</span> </label>
                <select  class="select pull-right" name="reserve" style="width:159px" value="<?php echo (isset($_SESSION['reserve'])) ? $_SESSION['reserve'] : '' ?>" required>
                    <option value="" selected disabled hidden>Reserve</option>
                    <option value="1" selected="selected">Oui</option>
                    <option value="0">Non</option>

                </select>
            </div>
        </div><br>


        <!-- les photos bac cin attestations -->
        <div class="row">
          <div class="col-xs-6">
            <label for="myfile">Photo</label>
            <input type="file" id="photo" name="photo" required> 
          </div>
          <div class="col-xs-6">
            <label for="myfile">BAC</label>
            <input type="file" id="bac" name="bac" required> 
          </div>
          <div class="col-xs-6"></div>
        </div>

        <div class="row">
          <div class="col-xs-6">
            <label for="myfile">CIN</label>
            <input type="file" id="cin_copy" name="cin_copy" required> 
          </div>
          <div class="col-xs-6">
            <label for="myfile">Attestation</label>
            <input type="file" id="attestation" name="attestation" required> 
          </div>
        </div><br>


        <!-- email et passwords -->
      		<div class="form-group has-feedback">
            <label>Email</label>
        		<input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo (isset($_SESSION['email'])) ? $_SESSION['email'] : '' ?>" required>
        		<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      		</div>
          <div class="form-group has-feedback">
            <label>Password</label>
            <input type="password" class="form-control" name="password" placeholder="Password" value="chadi619" required>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <label>Re-type password</label>
            <input type="password" class="form-control" name="repassword" placeholder="Retype password" value="chadi619" required>
            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
          </div>




          <hr>
      		<div class="row">
    			<div class="col-xs-4">
          			<button type="submit" class="btn btn-primary btn-block btn-flat" name="signup"><i class="fa fa-pencil"></i> Sign Up</button>
        		</div>
      		</div>
    	</form>
      <br>

      <!-- end of form -->
      <a href="login.php">I already have a membership</a><br>
      <a href="index.php"><i class="fa fa-home"></i> Home</a>
  	</div>
</div>
	
<?php include 'includes/scripts.php' ?>
</body>
</html>