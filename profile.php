<?php include 'includes/session.php'; ?>
<?php
	if(!isset($_SESSION['user'])){
		header('location: index.php');
	}
?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

	<?php include 'includes/navbar.php'; ?>
	 
	  <div class="content-wrapper">
	    <div class="container">

	      <!-- Main content -->
	      <section class="content">
	        <div class="row">
	        	<div class="col-sm-9">
	        		<?php
	        			if(isset($_SESSION['error'])){
	        				echo "
	        					<div class='callout callout-danger'>
	        						".$_SESSION['error']."
	        					</div>
	        				";
	        				unset($_SESSION['error']);
	        			}

	        			if(isset($_SESSION['success'])){
	        				echo "
	        					<div class='callout callout-success'>
	        						".$_SESSION['success']."
	        					</div>
	        				";
	        				unset($_SESSION['success']);
	        			}
	        		?>
	        		<div class="box box-solid">
	        			<div class="box-body">

 	        				<div class="col-sm-3">
 	        					<div class="box box-solid">
 	        						<div class="box-body">
	        							<img src="<?php echo (!empty($user['photo'])) ? 'images/photo/'.$user['photo'] : 'images/profile.jpg'; ?>" width="100%">
	        						</div>
	        					</div>
	        				</div> 
	        				<div class="col-sm-9">
	        					<div class="row">
	        						<div class="col-sm-3">
	        							<h4>Name:</h4>
	        							<h4>Name arabe:</h4>
	        							<h4>Gender:</h4>
	        							<h4>Email:</h4>
	        							<h4>Contact Info:</h4>
	        							<h4>Address:</h4>
	        							<br>
	        							<h4>Cycle:</h4>
	        							<h4>Filliere:</h4>
	        							<h4>Year:</h4>
	        							<h4>CIN:</h4>
	        							<h4>CNE:</h4>
	        							<br>
	        							<h4>Member Since:</h4>

	        						</div>
	        						<div class="col-sm-9">
	        							<h4><?php echo ucfirst($user['firstname']).' '.ucfirst($user['lastname']); ?>
	        								<span class="pull-right">
	        									<a <?php echo 'href="attestation.php?id='.$_SESSION['user'].'"'; ?> class="btn btn-warning btn-flat btn-sm" <?php echo (empty($user['attestation_inscription'])) ? 'disabled="disabled" title="Wait for admin validation"' : ''; ?>><i class="fa fa-download"></i> Attestation PDF</a>
	        									<a href="#edit" class="btn btn-success btn-flat btn-sm " data-toggle="modal"><i class="fa fa-edit"></i> Edit</a>
	        								</span>
	        							</h4>
	        							<h4><?php echo $user['firstname_ar'].' '.$user['lastname_ar']; ?></h4>	
	        							<h4><?php 
	        								$sex=$user['sex'];
	        								if ($sex==1) {
	        									echo "Male";
	        								};
	        								if ($sex==0) {
	        									echo "Female";
	        								};
	        								?>
	        							</h4>	      						      
	        							<h4><?php echo $user['email']; ?></h4>
	        							<h4><?php echo (!empty($user['phone'])) ? $user['phone'] : 'N/a'; ?></h4>
	        							<h4><?php echo (!empty($user['adress'])) ? $user['adress'] : 'N/a'; ?></h4>
	        							<br>
	        							<h4><?php 
	        								$cycle=$user['cycle'];
	        								if ($cycle==1) {
	        									echo "Cycle ingénieurs d'Etat";
	        								};
	        								if ($cycle==2) {
	        									echo "Cycle Master";
	        								};
	        								if ($cycle==3) {
	        									echo "Cycle Doctorat";
	        								};?>
	        							</h4>
	        							
	        							<h4><?php 
	        								$filiere=$user['filiere'];
	        								if ($filiere==1) {
	        									echo "Actuariat-Finance";
	        								};
	        								if ($filiere==2) {
	        									echo "Statistique-Economie Appliqué";
	        								};
	        								if ($filiere==3) {
	        									echo "Statistique-Démographie";
	        								};
	        								if ($filiere==4) {
	        									echo "Recherche Opérationnelle et Aide à la Décision";
	        								};
	        								if ($filiere==5) {
	        									echo "Ingénierie des Données et des Logiciels";
	        								};
	        								if ($filiere==6) {
	        									echo "Science des Données";
	        								};
	        								if ($filiere==7) {
	        									echo "Actuariat-Finance";
	        								};?>

	        							</h4>	 
	        							<h4><?php 
	        								$year=$user['year'];
	        								if ($year==1) {
	        									echo "1ére année";
	        								};
	        								if ($year==2) {
	        									echo "2ème année";
	        								};
	        								if ($year==3) {
	        									echo "3ème année";
	        								};
	        								if ($year==4) {
	        									echo "4ème année";
	        								};
	        								$reserve=$user['reserve'];
	        								if ($reserve==1) {
	        									echo " - Reserve";
	        								};
	        								?>

	        							</h4>	        							
	        							<h4><?php echo strtoupper($user['cin']); ?></h4>
	        							<h4><?php echo strtoupper($user['cne']); ?></h4>
	        							<br>
	        							<h4><?php echo date('M d, Y', strtotime($user['created_on'])); ?></h4>
	        						 	  <br><br>


	        						</div>
	        					</div>


	       							<div class='col-sm-4' >
	       								<div class='box ' >
											<a href="#image_cin" data-toggle="modal">	       									
			       								<div class='box-body prod-body' style="height:200px" >
			       									<img src="<?php echo (!empty($user['copy_cin'])) ? 'images/cin/'.$user['copy_cin'] : 'images/profile.jpg'; ?>" width='100%' height='130px' class='thumbnail'>
			       									<h5>Copy CIN</h5>
			       								</div>
			       							</a>
	       								</div>
	       							</div>


	       							<div class='col-sm-4'>
	       								<div class='box '>
											<a href="#image_bac" data-toggle="modal">	       									
			       								<div class='box-body prod-body' style="height:200px">
			       									<img src="<?php echo (!empty($user['copy_bac'])) ? 'images/bac/'.$user['copy_bac'] : 'images/profile.jpg'; ?>" width='100%' height='130px' class='thumbnail'>
			       									<h5><a href="<?php echo (!empty($user['copy_bac'])) ? 'images/bac/'.$user['copy_bac'] : 'images/profile.jpg'; ?>">Copy BAC</a></h5>
			       								</div>
		       								</a>
	       								</div>
	       							</div>

	       							<div class='col-sm-4' >
	       								<div class='box ' style="height:200px">
	       									<a href="#image_attestation" data-toggle="modal">
			       								<div class='box-body prod-body'>
			       									<img src="<?php echo (!empty($user['copy_attest'])) ? 'images/attestation/'.$user['copy_attest'] : 'images/profile.jpg'; ?>" width='100%' height='130px' class='thumbnail'>
			       									<h5><a href="<?php echo (!empty($user['copy_attest'])) ? 'images/attestation/'.$user['copy_attest'] : 'images/profile.jpg'; ?>">Copy Attestation</a></h5>
			       								</div>
		       								</a>
	       								</div>
	       							</div>	       							
        					        					        					
	        				</div>
	        			</div>
	        		</div>

	        	</div>
	        	<div class="col-sm-3">
	        		<?php include 'includes/sidebar.php'; ?>
	        	</div>
	        </div>
	      </section>
	     
	    </div>
	  </div>
  
  	<?php include 'includes/footer.php'; ?>
  	<?php include 'includes/profile_modal.php'; ?>
  	<?php include 'includes/image_modal.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>
<script>

var angle = 0;
$('#rotate_image').on('click', function() {
    angle += 90;
    $('#image_rotate').css('transform','rotate(' + angle + 'deg)');
});

var angle2 = 0;
$('#rotate_image2').on('click', function() {
    angle2 += 90;
    $('#image_rotate2').css('transform','rotate(' + angle2 + 'deg)');
 });

var angle3 = 0;
$('#rotate_image3').on('click', function() {
    angle3 += 90;
    $('#image_rotate3').css('transform','rotate(' + angle3 + 'deg)');
});

</script>
</body>
</html>