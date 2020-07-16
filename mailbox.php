<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

	<?php include 'includes/navbar.php'; ?>
	 
	  <div class="content-wrapper">
	    <div class="container">

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
					    ?>
				        <div class="row">
				        	<div class="col-sm-9">

				        		<h1 class="page-header">Mail Box </h1>


				        		<div class="box box-solid">
				        			<div class="box-body">

				        			<table>
				        				<thead>
				        					<th></th>
				        					<th>Notification</th>
			       				      <button class="btn btn-success pull-right btn-sm sendmail" style="border-radius: 0">Send a mail!</button>   

				        				</thead>
				        			</table>

					        		<table id="example2" class="table table-bordered">
					        			<thead>
					        				<th width="10%">Date</th>
					        				<th width="30%">Subject</th>
					        				<th width="60%">Body</th>
					        			</thead>
					        			<tbody id="tbody">

			                 			<?php
			                 				$conn = $pdo->open();

						                    try{
						                      $stmt = $conn->prepare("SELECT * FROM mailbox WHERE reciever=:reciever Or reciever=:everyone_id or reciever=:article ORDER BY sent_date DESC");
						                      $stmt->execute(['reciever'=>$_SESSION['user'],'everyone_id'=>2,'article'=>0]);

						                      foreach($stmt as $row){
						                      	$sent_date=$row['sent_date'];
						                      	$subject=$row['mail_subject'];
						                      	$body=$row['mail_text'];
						                      	if ($row['seen']==0) {
						                      		echo	'<tr style="background-color:#d2f8d2">';
						                      	}
						                      	else{echo	'<tr>';}
						                      	
						                      	
								        		echo		'<td >'.$sent_date.'</td>';
								        		echo		'<td>'.$subject.'</td>';
								        		echo		'<td>'.substr($body, 0, 140).'<button class="mail_body btn btn-xs" data-id='.$row['mail_id'].' onclick="myFunction()" id="myBtn">Read more</button> </td> ';
								        		echo	'</tr>' ;             	

						                      }		
							        		}
						                    catch(PDOException $e){
						                      echo $e->getMessage();
						                    }?>
						           		</tbody>
								    </table>
						           		 <br>

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
  	<?php $pdo->close(); ?>
  	<?php include 'includes/footer.php'; ?>
  	<?php include 'includes/profile_modal.php'; ?>
    <?php include 'includes/mails_modal.php'; ?>

</div>

<?php include 'includes/scripts.php'; ?>
<script>



$(function(){
	$(document).ready(function() {
	    $('#mailbox').DataTable();
	} );
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
		$('#type').html(response.type);
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