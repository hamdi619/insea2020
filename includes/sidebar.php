
<?php 
	if(isset($_POST['newsletter'])){
		$email = $_POST['newsletter-mail'];
		
		$conn = $pdo->open();
		try {
			$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM newsletter WHERE email=:email");
			$stmt->execute(['email'=>$email]);
			$row = $stmt->fetch();
			if($row['numrows'] >0){
				$_SESSION['success']="You are already registered!";
			}
			else{
				try{
				$stmt = $conn->prepare("INSERT INTO newsletter (email) VALUES (:email)");
				$stmt->execute(['email'=>$email]);
				$_SESSION['success']="You have been successfully registered!";
				}
				catch(PDOException $e){
					$_SESSION['error'] = $e->getMessage();
				}	
			}
		} catch (Exception $e) {
				$_SESSION['error'] = $e->getMessage();
		}

		$pdo->close();
	}
 ?>

<div class="row">
	<div class="box box-solid">
	  	<div class="box-header with-border">
	    	<h3 class="box-title"><b>Newsletter</b></h3>
	  	</div>
	  	<div class="box-body">
	    	<p>Get updates on the latest new straight to your inbox.</p>
	    	<form method="POST" action="">
		    	<div class="input-group">
	                <input type="text" class="form-control" name="newsletter-mail">
	                <span class="input-group-btn">
	                    <button type="submit" class="btn btn-success btn-flat" name="newsletter"><i class="fa fa-envelope"></i> </button>
	                </span>
	            </div>
		    </form>
	  	</div>
	</div>
</div>

<div class="row">
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
		      $who="everyone"
		    ?>
	<div class="box box-solid">
	  	<div class="box-header with-border">
	    	<h3 class="box-title"><b>Contact Us as visitor</b></h3>
	  	</div>
	  	<div class="box-body">
	    	<form method="POST" action="send_email.php">
		    	<div class="input-group">
		    		<label>Subject:</label>
	                <input type="text" name="subject" class="form-control">
	            </div>
		    	<div class="input-group col-sm-12">
		    		<label>Your message:</label>
		    		<textarea style="width: 100%;height: 150px" name="mail_text" type="text" class="form-control"></textarea>	               
	            </div>	<br> 
	            <div>
	            <button type ="submit" name="sendmail" class="btn btn-success pull-right btn-sm" style="border-radius: 0">SEND <i class="fa fa-paper-plane"></i></button>           
	            	
	            </div>
		    </form>
	  	</div>
	</div>
</div>

<div class="row">
	<div class='box box-solid'>
	  	<div class='box-header with-border'>
	    	<h3 class='box-title'><b>INSEA on Social Media</b></h3>
	  	</div>
	  	<div class='box-body'>
	    	<a class="btn btn-social-icon btn-facebook"><i class="fa fa-facebook"></i></a>
	    	<a class="btn btn-social-icon btn-twitter"><i class="fa fa-twitter"></i></a>
	    	<a class="btn btn-social-icon btn-instagram"><i class="fa fa-instagram"></i></a>
	    	<a class="btn btn-social-icon btn-linkedin"><i class="fa fa-linkedin"></i></a>
	  	</div>
	</div>
</div>
