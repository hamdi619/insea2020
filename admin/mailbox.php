<?php include 'includes/session.php'; ?>
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
        Mail Box
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Mailbox</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
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
      <div class="row">
        <div class="col-xs-12">

       
          <div class="box">
            <div class="box-body">
           <span><h4 class="box-title"><b>Emails</b></h4> 
             <button class="btn btn-success pull-right btn-sm sendmail" style="border-radius: 0">Send a mail to everyone!</button> </span>     
             <br><br>                   
             <table class="table table-bordered" id="example2">
                  <thead>
                    <th width="10%">Date</th>
                    <th width="10%">sender</th>
                    <th width="20%">Subject</th>
                    <th width="60%">Body</th>
                    <th width="10%">Action</th>
                  </thead>
                  <tbody id="tbody">


                      <?php
                        $conn = $pdo->open();

                          try{
                            $stmt = $conn->prepare("SELECT * FROM mailbox WHERE reciever=:reciever  ORDER BY sent_date DESC");
                            $stmt->execute(['reciever'=>1]);
                            foreach($stmt as $row){
                              $sent_date=$row['sent_date'];
                              $subject=$row['mail_subject'];
                              $body=$row['mail_text'];
                              $sender=$row['sender'];
                              $mail_id=$row['mail_id'];
                            if ($row['seen']==0) {
                              echo  '<tr style="background-color:#d2f8d2">';
                            }
                            else{echo '<tr>';}
                            $stmt = $conn->prepare("SELECT * FROM users WHERE id=:sender ");
                            $stmt->execute(['sender'=>$sender]);
                            $row = $stmt->fetch();

                            // echo  '<tr>';

                            echo    '<td>'.substr($sent_date, 0,16).'</td>';
                            if ($sender==0) {
                                 echo    '<td>Visitor</td>';    
                            }
                            else{
                                 echo    '<td><a href="user_info.php?user='.$row['id'].'">'.$row['firstname'].' '.$row['lastname'].'</a></td>';
                            }
                            echo    '<td>'.$subject.'</td>';
                            echo    '<td class="mail_body">';
                            echo (strlen($body)>140)?substr($body, 0, 140).'... </td> ':$body.'</td> ';
                            echo     '<td><button class="mail_body btn btn-xs btn-warning btn-flat" data-id='.$mail_id.' onclick="myFunction()" id="myBtn">Read more</button></td>';
                            echo  '</tr>' ;               

                            }   
                    }
                          catch(PDOException $e){
                            echo $e->getMessage();
                          }?>
                     </tbody>
                  </table>
            </div>
          </div>
        </div>
      </div>
    </section>
     
  </div>
  	<?php include 'includes/footer.php'; ?>
    <?php include 'includes/mails_modal.php'; ?>
    <?php include '../includes/profile_modal.php'; ?>

</div>
<!-- ./wrapper -->

<?php include 'includes/scripts.php'; ?>

<script>

$(function(){

  $(document).on('click', '.mail_body', function(e){
    e.preventDefault();
    $('#mail_body').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'mails_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
    $('#sent_date').html(response.sent_date);
    $('#mail_subject').html(response.mail_subject);
    $('#mail_text').html(response.mail_text);
    $('#sender').html(response.lastname +" "+ response.firstname);
    }
  });
}

  $(document).on('click', '.sendmail', function(e){
    e.preventDefault();
    $('#sendmail').modal('show');
  });



});
</script>
</body>
</html>
