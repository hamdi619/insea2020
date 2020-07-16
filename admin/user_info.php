<?php include 'includes/session.php'; ?>
<?php
  if(!isset($_GET['user'])){
    header('location: users.php');
    exit();
  }
  else{
    $conn = $pdo->open();

    $stmt = $conn->prepare("SELECT * FROM users WHERE id=:id");
    $stmt->execute(['id'=>$_GET['user']]);
    $user = $stmt->fetch();

    $pdo->close();
  }

?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $user['firstname'].' '.$user['lastname'].'`s Details' ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Users</li>
        <li class="active">Details</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <?php
        if(isset($_SESSION['error'])){
          echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
            </div>
          ";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              ".$_SESSION['success']."
            </div>
          ";
          unset($_SESSION['success']);
        }

      ?>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <a href="users.php" class="btn btn-sm btn-primary btn-flat"><i class="fa fa-arrow-left"></i> Users</a>
              <a href="users.php" class="btn btn-sm btn-success btn-flat pull-right validate"><i class="fa fa-check "></i> Validate</a>
              <a href="users.php" class="btn btn-sm btn-warning btn-flat sendmail"><i class="fa fa-paper-plane"></i> Send mail</a>

            </div>
            <div class="box-body">
              


<div class="box box-solid">
                <div class="box-body">
                  <div class="col-sm-3">
                    <img src=<?php echo (!empty($user["photo"])) ? '"'."../images/photo/".$user['photo'].'"' : '"'."../images/profile.jpg".'"'; ?> width="100%">
                  </div>
                  <div class="col-sm-9">
                    <div class="row">
                        <h4><?php echo ($user['attestation_inscription']==1) ? '<i class="fa fa-check" style="color:green"> Documents validated</i>': '<i class="fa fa-close" style="color:orange"> Documents still not validated</i> '; ?></h4>
                      <div class="col-sm-3">

                        <h4><b>Name:</b></h4>
                        <h4><b>Name arabe:</b></h4>
                        <h4><b>Gender:</b></h4>
                        <h4><b>Email:</b></h4>
                        <h4><b>Contact Info:</b></h4>
                        <h4><b>Address:</b></h4>
                        <br>
                        <h4><b>Cycle:</b></h4>
                        <h4><b>Filliere:</b></h4>
                        <h4><b>Year:</b></h4>
                        <h4><b>CIN:</b></h4>
                        <h4><b>CNE:</b></h4>
                        <br>
                        <h4><b>Member Since:</b></h4>

                      </div>
                      <div class="col-sm-9">
                        
                        <h4><?php echo ucfirst($user['firstname']).' '.ucfirst($user['lastname'].' ');  ?>
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
                            echo "Cycle ingénieurs d’Etat";
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
                          $who=$user['firstname'].' '.$user['lastname'];
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
                              <img src="<?php echo (!empty($user['copy_cin'])) ? '../images/cin/'.$user['copy_cin'] : '../images/profile.jpg'; ?>" width='100%' height='130px' class='thumbnail'>
                              <h5>Copy CIN</h5>
                            </div>
                          </a>
                        </div>
                      </div>

                      <div class='col-sm-4'>
                        <div class='box '>
                      <a href="#image_bac" data-toggle="modal">                         
                            <div class='box-body prod-body' style="height:200px">
                              <img src="<?php echo (!empty($user['copy_bac'])) ? '../images/bac/'.$user['copy_bac'] : 'images/profile.jpg'; ?>" width='100%' height='130px' class='thumbnail'>
                              <h5>Copy BAC</h5>
                            </div>
                          </a>
                        </div>
                      </div>

                      <div class='col-sm-4' >
                        <div class='box ' style="height:200px">
                          <a href="#image_attestation" data-toggle="modal">
                            <div class='box-body prod-body'>
                              <img src="<?php echo (!empty($user['photo'])) ? '../images/attestation/'.$user['copy_attest'] : '../images/profile.jpg'; ?>" width='100%' height='130px' class='thumbnail'>
                              <h5>Copy Attestation</h5>
                            </div>
                          </a>
                        </div>
                      </div>  


                  </div>
                </div>
              </div>              
            </div>
          </div>
        </div>
      </div>
    </section>
     
  </div>
  	<?php include 'includes/footer.php'; ?>
    <?php include 'includes/validate_doc_modal.php'; ?>
    <?php include 'includes/mails_modal.php'; ?>
    <?php include 'includes/image_modal.php'; ?>



</div>
<!-- ./wrapper -->

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

$(function(){

  $(document).on('click', '.sendmail', function(e){
    e.preventDefault();
    $('#sendmail').modal('show');
  });
  $(document).on('click', '.validate', function(e){
    e.preventDefault();
    $('#validate').modal('show');
  });



});




</script>
</body>
</html>
